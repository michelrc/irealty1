<?php

class SeoUrlManager extends CUrlManager
{
    protected static $_initialized;
    public $rulesModel = 'SeoUrlRule';
    public $appendParams = false;
    public $loadDefaultRules = true;
    /**
     * @var CActiveRecord
     */
    protected $_model;
    protected $_urlFormat = self::GET_FORMAT;
    protected $_rules = array();
    protected $_baseUrl;
    protected $_translatable = false;

    /**
     * Initializes the application component.
     */
    public function init()
    {
        $this->_translatable = Yii::app()->getModule('seo')->translatable;

        $this->initRules();
        parent::init();
    }

    public function initRules($reload = false)
    {
        if (!self::$_initialized || $reload) {
            $defaultRules = array();

            if ($this->loadDefaultRules) {
                $defaultRules = require(Yii::getPathOfAlias('seo.config') . DS . 'routes.' . ($this->_translatable ? 'multi' : 'simple') . '.php');
            }

            $this->showScriptName = false;
            $this->urlFormat = 'path';
            $this->rules = CMap::mergeArray($defaultRules, require(Yii::getPathOfAlias('application.config') . DS . 'routes.php'));
            $this->loadModel();
            $this->processRules();
            self::$_initialized = true;
        }
    }

    public function loadModel()
    {
        $model = Yii::import($this->rulesModel);
        /** @var $model CActiveRecord */
        $this->_model = new $model;
    }

    /**
     * Processes the URL rules.
     */
    protected function processRules()
    {
        if (!$this->getRulesCount() || $this->getUrlFormat() === self::GET_FORMAT)
            return;
        /*if ($this->cacheID !== false && ($cache = Yii::app()->getComponent($this->cacheID)) !== null) {
            $type = $this->_translatable?'multi':'simple';
            $hash = md5(Yii::app()->language.$type.serialize($this->rules));
            if (($data = $cache->get(self::CACHE_KEY)) !== false && isset($data[1]) && $data[1] === $hash) {
                $this->_rules = $data[0];
                return;
            }
        }*/

        $this->_rules = array();

        foreach ($this->getDbRules() as $rule)
            $this->_rules[] = $this->createUrlRule($rule->toArray(), null);


        foreach ($this->rules as $pattern => $route)
            $this->_rules[] = $this->createUrlRule($route, $pattern);


        if (isset($cache))
            $cache->set(self::CACHE_KEY, array($this->_rules, $hash));

    }

    public function getRulesCount()
    {
        return count($this->rules) + $this->_model->count();
    }

    /**
     * Returns the URL format.
     * @return string the URL format. Defaults to 'path'. Valid values include 'path' and 'get'.
     * Please refer to the guide for more details about the difference between these two formats.
     */
    public function getUrlFormat()
    {
        return $this->_urlFormat;
    }

    /**
     * Sets the URL format.
     * @param string $value the URL format. It must be either 'path' or 'get'.
     */
    public function setUrlFormat($value)
    {
        if ($value === self::PATH_FORMAT || $value === self::GET_FORMAT)
            $this->_urlFormat = $value;
        else
            throw new CException(Yii::t('yii', 'CUrlManager.UrlFormat must be either "path" or "get".'));
    }

    public function getDbRules()
    {
        return $this->_model->findAll();
    }

    /**
     * Creates a URL rule instance.
     * The default implementation returns a CUrlRule object.
     * @param mixed $route the route part of the rule. This could be a string or an array
     * @param string $pattern the pattern part of the rule
     * @return CUrlRule the URL rule instance
     * @since 1.1.0
     */
    protected function createUrlRule($route, $pattern)
    {
        if (is_array($route) && isset($route['class']))
            return $route;
        else
            return new $this->urlRuleClass($route, $pattern);
    }

    /**
     * Adds new URL rules.
     * In order to make the new rules effective, this method must be called BEFORE
     * {@link CWebApplication::processRequest}.
     * @param array $rules new URL rules (pattern=>route).
     * @param boolean $append whether the new URL rules should be appended to the existing ones. If false,
     * they will be inserted at the beginning.
     * @since 1.1.4
     */
    public function addRules($rules, $append = true)
    {
        if ($append) {
            foreach ($rules as $pattern => $route)
                $this->_rules[] = $this->createUrlRule($route, $pattern);
        } else {
            $rules = array_reverse($rules);
            foreach ($rules as $pattern => $route)
                array_unshift($this->_rules, $this->createUrlRule($route, $pattern));
        }
        $t = $this->_rules;
    }

    /**
     * Constructs a URL.
     * @param string $route the controller and the action (e.g. article/read)
     * @param array $params list of GET parameters (name=>value). Both the name and value will be URL-encoded.
     * If the name is '#', the corresponding value will be treated as an anchor
     * and will be appended at the end of the URL.
     * @param string $ampersand the token separating name-value pairs in the URL. Defaults to '&'.
     * @return string the constructed URL
     */
    public function createUrl($route, $params = array(), $ampersand = '&')
    {
        unset($params[$this->routeVar]);
        foreach ($params as $i => $param)
            if ($param === null)
                $params[$i] = '';

        if (isset($params['#'])) {
            $anchor = '#' . $params['#'];
            unset($params['#']);
        } else
            $anchor = '';
        $route = trim($route, '/');
        foreach ($this->_rules as $i => $rule) {
            if (is_array($rule))
                $this->_rules[$i] = $rule = Yii::createComponent($rule);
            if (($url = $rule->createUrl($this, $route, $params, $ampersand)) !== false) {
                if ($rule->hasHostInfo)
                    return $url === '' ? '/' . $anchor : $url . $anchor;
                else
                    return $this->getBaseUrl() . '/' . $url . $anchor;
            }
        }
        return $this->createUrlDefault($route, $params, $ampersand) . $anchor;
    }

    /**
     * Returns the base URL of the application.
     * @return string the base URL of the application (the part after host name and before query string).
     * If {@link showScriptName} is true, it will include the script name part.
     * Otherwise, it will not, and the ending slashes are stripped off.
     */
    public function getBaseUrl()
    {
        if ($this->_baseUrl !== null)
            return $this->_baseUrl;
        else {
            if ($this->showScriptName)
                $this->_baseUrl = Yii::app()->getRequest()->getScriptUrl();
            else
                $this->_baseUrl = Yii::app()->getRequest()->getBaseUrl();
            return $this->_baseUrl;
        }
    }

    /**
     * Sets the base URL of the application (the part after host name and before query string).
     * This method is provided in case the {@link baseUrl} cannot be determined automatically.
     * The ending slashes should be stripped off. And you are also responsible to remove the script name
     * if you set {@link showScriptName} to be false.
     * @param string $value the base URL of the application
     * @since 1.1.1
     */
    public function setBaseUrl($value)
    {
        $this->_baseUrl = $value;
    }

    /**
     * Creates a URL based on default settings.
     * @param string $route the controller and the action (e.g. article/read)
     * @param array $params list of GET parameters
     * @param string $ampersand the token separating name-value pairs in the URL.
     * @return string the constructed URL
     */
    protected function createUrlDefault($route, $params, $ampersand)
    {
        if ($this->getUrlFormat() === self::PATH_FORMAT) {
            $langSection = '';
            if ($this->_translatable) {
                $langSection = '/' . (isset($params['language']) ? $params['language'] : Yii::app()->language);
            }

            $url = rtrim($this->getBaseUrl() . $langSection . '/' . $route, '/');
            if ($this->appendParams) {
                $url = rtrim($url . '/' . $this->createPathInfo($params, '/', '/'), '/');
                return $route === '' ? $url : $url . $this->urlSuffix;
            } else {
                if ($route !== '')
                    $url .= $this->urlSuffix;
                $query = $this->createPathInfo($params, '=', $ampersand);
                return $query === '' ? $url : $url . '?' . $query;
            }
        } else {
            $langParams = array();
            if ($this->_translatable) {
                $langParams = array('language' => isset($params['language']) ? $params['language'] : Yii::app()->language);
            }

            $url = $this->getBaseUrl();
            if (!$this->showScriptName)
                $url .= '/';
            if ($route !== '') {
                $url .= '?' . $this->routeVar . '=' . $route;
                if (($query = $this->createPathInfo(CMap::mergeArray($params, $langParams), '=', $ampersand)) !== '')
                    $url .= $ampersand . $query;
            } else if (($query = $this->createPathInfo(CMap::mergeArray($params, $langParams), '=', $ampersand)) !== '')
                $url .= '?' . $query;
            return $url;
        }
    }

    /**
     * Creates a path info based on the given parameters.
     * @param array $params list of GET parameters
     * @param string $equal the separator between name and value
     * @param string $ampersand the separator between name-value pairs
     * @param string $key this is used internally.
     * @return string the created path info
     */
    public function createPathInfo($params, $equal, $ampersand, $key = null)
    {
        $pairs = array();
        foreach ($params as $k => $v) {
            if ($key !== null)
                $k = $key . '[' . $k . ']';

            if (is_array($v))
                $pairs[] = $this->createPathInfo($v, $equal, $ampersand, $k);
            else
                $pairs[] = urlencode($k) . $equal . urlencode($v);
        }
        return implode($ampersand, $pairs);
    }

    /**
     * Parses the user request.
     * @param CHttpRequest $request the request application component
     * @return string the route (controllerID/actionID) and perhaps GET parameters in path format.
     */
    public function parseUrl($request)
    {
        if ($this->getUrlFormat() === self::PATH_FORMAT) {
            $rawPathInfo = $request->getPathInfo();
            $pathInfo = $this->removeUrlSuffix($rawPathInfo, $this->urlSuffix);
//            this code run if not defined a rule base on the model

            foreach ($this->_rules as $i => $rule) {
                if (is_array($rule)) {
                    $this->_rules[$i] = $rule = Yii::createComponent($rule);
                }
                if (($r = $rule->parseUrl($this, $request, $pathInfo, $rawPathInfo)) !== false) {
                    return isset($_GET[$this->routeVar]) ? $_GET[$this->routeVar] : $r;
                }

            }
            if ($this->useStrictParsing)
                throw new CHttpException(404, Yii::t('yii', 'Unable to resolve the request "{route}".',
                    array('{route}' => $pathInfo)));
            else
                return $pathInfo;
        } else if (isset($_GET[$this->routeVar]))
            return $_GET[$this->routeVar];
        else if (isset($_POST[$this->routeVar]))
            return $_POST[$this->routeVar];
        else
            return '';
    }

    /**
     * Removes the URL suffix from path info.
     * @param string $pathInfo path info part in the URL
     * @param string $urlSuffix the URL suffix to be removed
     * @return string path info with URL suffix removed.
     */
    public function removeUrlSuffix($pathInfo, $urlSuffix)
    {
        if ($urlSuffix !== '' && substr($pathInfo, -strlen($urlSuffix)) === $urlSuffix)
            return substr($pathInfo, 0, -strlen($urlSuffix));
        else
            return $pathInfo;
    }

    public function getMatchedRule($request, $pathInfo = null)
    {
        if ($this->getUrlFormat() === self::PATH_FORMAT) {
            $rawPathInfo = $pathInfo;

            if (!$pathInfo) {
                $rawPathInfo = $request->getPathInfo();
            }

            $pathInfo = $this->removeUrlSuffix($rawPathInfo, $this->urlSuffix);

            foreach ($this->_rules as $i => $rule) {
                if (is_array($rule)) {
                    $this->_rules[$i] = $rule = Yii::createComponent($rule);
                }
                if (($r = $rule->parseUrl($this, $request, $pathInfo, $rawPathInfo)) !== false) {
                    return $rule;
                }

            }
        }
    }

    /**
     * Parses a path info into URL segments and saves them to $_GET and $_REQUEST.
     * @param string $pathInfo path info
     */
    public function parsePathInfo($pathInfo)
    {
        if ($pathInfo === '')
            return;
        $segs = explode('/', $pathInfo . '/');
        $n = count($segs);
        for ($i = 0; $i < $n - 1; $i += 2) {
            $key = $segs[$i];
            if ($key === '') continue;
            $value = $segs[$i + 1];
            if (($pos = strpos($key, '[')) !== false && ($m = preg_match_all('/\[(.*?)\]/', $key, $matches)) > 0) {
                $name = substr($key, 0, $pos);
                for ($j = $m - 1; $j >= 0; --$j) {
                    if ($matches[1][$j] === '')
                        $value = array($value);
                    else
                        $value = array($matches[1][$j] => $value);
                }
                if (isset($_GET[$name]) && is_array($_GET[$name]))
                    $value = CMap::mergeArray($_GET[$name], $value);
                $_REQUEST[$name] = $_GET[$name] = $value;
            } else
                $_REQUEST[$key] = $_GET[$key] = $value;
        }
    }
}
