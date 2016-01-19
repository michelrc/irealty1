<?php
Yii::import('zii.widgets.jui.CJuiTabs');
/**
 * LanguageWidget
 * ==============
 *
 * ADD DESCRIPTION OF EXTERNSION HERE.
 *
 * This base code was generated with the [gii-extension-generator](http://www.yiiframework.com/extension/gii-extension-generator/)
 * @version 0.1
 * @author ADD YOU NAME HERE
 */
class LanguageWidget extends CJuiTabs
{
    public $widgetClass = 'zii.widgets.';
    protected $_template = null;
    protected $_prevContent = null;

    public $contentTemplate = '<div id="{id}" rel="{lang}" class="lang">{content}</div>';

    public $headerTemplate = '<li><a href="{url}" class="langtab" rel="{lang}" title="{langname}">{title}</a></li>';
    /**
     * @var CModel the data model associated with this widget.
     */
    public $model;
    /**
     * @var string the attribute associated with this widget. Starting from version 1.0.9,
     * the name can contain square brackets (e.g. 'name[1]') which is used to collect tabular data input.
     */
    public $attribute;
    /**
     * @var string the input name. This must be set if {@link model} is not set.
     */
    public $name;

    /**
     * @var array additional HTML options to be rendered in the input tag
     */
    public $htmlOptions = array();

    public $options = array(
        'collapsible' => true
    );
    public $errorSummary = false;
    protected $_models = array();


    /**
     * @return array the name and the ID of the input.
     */
    protected function resolveNameID()
    {
        if ($this->name !== null)
            $name = $this->name;
        else if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];
        else if ($this->hasModel())
            $name = CHtml::activeName($this->model, $this->attribute);
        else
            throw new CException(Yii::t('yii', '{class} must specify "model" and "attribute" or "name" property values.', array('{class}' => get_class($this))));

        if (($id = $this->getId(false)) === null) {
            if (isset($this->htmlOptions['id']))
                $id = $this->htmlOptions['id'];
            else
                $id = CHtml::getIdByName($name);
        }

        return array($name, $id);
    }

    /**
     * @return boolean whether this widget is associated with a data model.
     */
    protected function hasModel()
    {
        return $this->model instanceof CModel && $this->attribute !== null;
    }


    public function init()
    {

        parent::init();
        ob_implicit_flush(false);
        $this->_prevContent = ob_get_clean();

        ob_start();
    }


    public function run()
    {
        $this->_template = ob_get_contents();
        ob_clean();
        print $this->_prevContent;
        $this->tabs = array();

        $modelClass = get_class($this->model);
        foreach (Language::getLanguages() as $lang) {

            $item = $this->model->getLang($lang->id);

            $this->_models[] = $item;
            $this->tabs[$lang->id] = array(
                'id' => 'tab_' . $this->attribute . '_' . $lang->id,
                'content' => strtr($this->_template, array(
                    '{lang}' => $lang->id,
                    '{name}' => $modelClass . '[' . $this->attribute . ']' . '[' . $lang->id . ']',
                    '{id}' => CHtml::getIdByName($modelClass . '[' . $this->attribute . ']' . '[' . $lang->id . ']'),
                    '{value}' => $item ? $item[$this->attribute] : '',
                    '{attribute}' => $this->attribute,
                    '{error}' => CHtml::error($item, $this->attribute),
                )),
                'langname' => $lang->name,
                'lang' => $lang->id
            );
        }

        $separator = '<hr>';
        if (isset($this->htmlOptions['separator'])) {
            $separator = $this->htmlOptions['separator'];
            unset($this->htmlOptions['separator']);
        }

        $id = $this->getId();
        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;

        echo CHtml::openTag($this->tagName, $this->htmlOptions) . "\n";

        $tabsOut = "";
        $contentOut = "";
        $tabCount = 0;

        foreach ($this->tabs as $title => $content) {
            $tabId = (is_array($content) && isset($content['id'])) ? $content['id'] : $id . '_tab_' . $tabCount++;

            if (!is_array($content)) {
                $tabsOut .= strtr($this->headerTemplate, array('{title}' => $title, '{url}' => '#' . $tabId, '{id}' => '#' . $tabId)) . "\n";
                $contentOut .= strtr($this->contentTemplate, array('{content}' => $content, '{id}' => $tabId)) . "\n";
            } elseif (isset($content['ajax'])) {
                $tabsOut .= strtr($this->headerTemplate, array('{title}' => $title, '{url}' => CHtml::normalizeUrl($content['ajax']), '{id}' => '#' . $tabId)) . "\n";
            } else {
                $tabsOut .= strtr($this->headerTemplate, array('{title}' => $title, '{lang}' => $content['lang'], '{langname}' => $content['langname'], '{url}' => '#' . $tabId)) . "\n";
                if (isset($content['content']))
                    $contentOut .= strtr($this->contentTemplate, array('{content}' => $content['content'], '{lang}' => $content['lang'], '{id}' => $tabId)) . "\n";
            }
        }
        echo "<ul>\n" . $tabsOut . "</ul>\n";
        if ($this->errorSummary) {
            echo CHtml::errorSummary($this->_models, $this->attribute);
        }
        echo $contentOut;

        echo $separator . CHtml::closeTag($this->tagName) . "\n";

        $options = empty($this->options) ? '' : CJavaScript::encode($this->options);
        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, "jQuery('#{$id}').tabs($options);jQuery('.language .ui-tabs').tabs({
            select: function(event, ui) {

                if (!window.selectionBlocked){ // Selected by the user
                    window.selectionBlocked = true;
                    jQuery('.language .ui-tabs').not(this).tabs('option', 'selected', ui.index);
                    window.selectionBlocked = false;
                    return true;
                }



                // Else, change in case are not the selected
                return (ui.index != jQuery(this).tabs('option', 'selected'));
            }
        });

        $('.language .ui-tabs .ui-widget-content div.errorMessage').each(function (){
            var jthis = $(this);
            jthis.parents('.language .ui-tabs').find('ul li a[rel=' + jthis.parent().attr('rel') + ']').css('color', 'red').last().trigger('click');
        });

        $('ul.ui-tabs-nav > li > a').click(function (){
            var jthis = $(this);
            jthis.parents('.language .ui-tabs').find('div[rel=' + jthis.attr('rel') + '] > input, div[rel=' + jthis.attr('rel') + '] > textarea').focus();
        });

        "
        );

        Yii::app()->getClientScript()->registerScript(__CLASS__ . '#kdiuud', "window.selectionBlocked = false;", CClientScript::POS_HEAD);
    }


}