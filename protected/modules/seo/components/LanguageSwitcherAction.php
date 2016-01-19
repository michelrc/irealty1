<?php

class LanguageSwitcherAction extends CAction
{
    protected $_pathInfo;
    protected $_requestUri;

    public function run($lang)
    {
        $pathInfo = $this->getPathInfo();

        $rule = false;
        if ($pathInfo) {
            /** @var CUrlRule $rule */
            $rule = app()->urlManager->getMatchedRule(app()->request, $pathInfo);
            $queryString = (($parts = explode('?', $this->_requestUri)) && count($parts) == 2) ? '?' . $parts[1] : '';
        }

        if ($rule && get_class($rule) == 'CUrlRule') {
            $_SESSION['language'] = $lang;
            Yii::app()->setLanguage($lang);
            app()->getUrlManager()->initRules(true);
            $url = app()->createAbsoluteUrl($rule->route) . $queryString;
        } elseif ($rule && get_class($rule) == 'ModelSEOUrlRule') {
            $route = $rule->parseUrl(app()->urlManager, app()->request, $pathInfo, $pathInfo);
            unset($_GET['lang']);
            $_SESSION['language'] = $lang;
            Yii::app()->setLanguage($lang);
            app()->getUrlManager()->initRules(true);
            $url = app()->getBaseUrl(true) . '/' . $rule->createUrl(app()->urlManager, $route, $_GET, '&');
        } else {
            $_SESSION['language'] = $lang;
            Yii::app()->setLanguage($lang);
            app()->getUrlManager()->initRules(true);
            $url = $this->controller->createAbsoluteUrl('/frontend/default/index');
        }

        $this->controller->redirect($url);
    }

    /**
     * @return string
     */
    public function getPathInfo()
    {
        $referURL = trim(strtr(app()->request->getUrlReferrer(), array(app()->getBaseUrl(true) => '')), '/');
        if ($this->_pathInfo === null) {
            $pathInfo = $this->getRequestUri($referURL);

            if (($pos = strpos($pathInfo, '?')) !== false)
                $pathInfo = substr($pathInfo, 0, $pos);

            $pathInfo = $this->decodePathInfo($pathInfo);

            $scriptUrl = app()->request->scriptUrl;
            $baseUrl = app()->baseUrl;
            if (strpos($pathInfo, $scriptUrl) === 0)
                $pathInfo = substr($pathInfo, strlen($scriptUrl));
            elseif ($baseUrl === '' || strpos($pathInfo, $baseUrl) === 0)
                $pathInfo = substr($pathInfo, strlen($baseUrl));
            elseif (strpos($_SERVER['PHP_SELF'], $scriptUrl) === 0)
                $pathInfo = substr($_SERVER['PHP_SELF'], strlen($scriptUrl));
            else
                throw new CException(Yii::t('yii', 'CHttpRequest is unable to determine the path info of the request.'));

            $this->_pathInfo = trim($pathInfo, '/');
        }
        return $this->_pathInfo;
    }

    /**
     * Returns the request URI portion for the currently requested URL.
     * This refers to the portion that is after the {@link hostInfo host info} part.
     * It includes the {@link queryString query string} part if any.
     * The implementation of this method referenced Zend_Controller_Request_Http in Zend Framework.
     * @param $url
     * @throws CException
     * @return string the request URI portion for the currently requested URL.
     */
    public function getRequestUri($url)
    {
        $qs= explode('?', $url);
	$queryString = end($qs);
        if ($this->_requestUri === null) {
            if (isset($_SERVER['HTTP_X_REWRITE_URL'])) // IIS
                $this->_requestUri = $_SERVER['HTTP_X_REWRITE_URL'];
            elseif (isset($url)) {
                $this->_requestUri = $url;
                if (!empty($_SERVER['HTTP_HOST'])) {
                    if (strpos($this->_requestUri, $_SERVER['HTTP_HOST']) !== false)
                        $this->_requestUri = preg_replace('/^\w+:\/\/[^\/]+/', '', $this->_requestUri);
                } else
                    $this->_requestUri = preg_replace('/^(http|https):\/\/[^\/]+/i', '', $this->_requestUri);
            } elseif (isset($_SERVER['ORIG_PATH_INFO']))  // IIS 5.0 CGI
            {
                $this->_requestUri = $_SERVER['ORIG_PATH_INFO'];
                if (!empty($queryString))
                    $this->_requestUri .= '?' . $queryString;
            } else
                throw new CException(Yii::t('yii', 'CHttpRequest is unable to determine the request URI.'));
        }

        return $this->_requestUri;
    }

    /**
     * Decodes the path info.
     * This method is an improved variant of the native urldecode() function and used in {@link getPathInfo getPathInfo()} to
     * decode the path part of the request URI. You may override this method to change the way the path info is being decoded.
     * @param string $pathInfo encoded path info
     * @return string decoded path info
     * @since 1.1.10
     */
    protected function decodePathInfo($pathInfo)
    {
        $pathInfo = urldecode($pathInfo);

        // is it UTF-8?
        // http://w3.org/International/questions/qa-forms-utf-8.html
        if (preg_match('%^(?:
		   [\x09\x0A\x0D\x20-\x7E]            # ASCII
		 | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
		 | \xE0[\xA0-\xBF][\x80-\xBF]         # excluding overlongs
		 | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
		 | \xED[\x80-\x9F][\x80-\xBF]         # excluding surrogates
		 | \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
		 | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
		 | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
		)*$%xs', $pathInfo)) {
            return $pathInfo;
        } else {
            return utf8_encode($pathInfo);
        }
    }


} 
