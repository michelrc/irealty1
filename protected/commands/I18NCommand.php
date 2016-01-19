<?php
/**
 * Author : Yusnel Rojas Garcia <yrojass@gmail.com>
 * User   : one
 * Date   : 8/20/12
 * Time   : 1:36 PM
 */
class I18NCommand extends CConsoleCommand
{
    /*public static $i18nModels = array(
        'CompanyInformation', 'FooterMain', 'NavigationMenu', 'Section1', 'Section2', 'Section2InfoInfo', 'Section2LeftColumn',
        'Section2RightColumn', 'Section3', 'Section3Main', 'Section3Tabs', 'Section4', 'Section4Main', 'Section4Tabs',
        'Section5Main', 'Section5Projects', 'Section6Main'
    );*/
    public static $i18nModels = array(
            'RentListPageGeneralInfo', 'BuyListPageGeneralInfo'
    );
    public $model = array();

    /**
     * @param array $model
     * @param bool $keepSource
     */
    public function actionInstall(array $model = array(), $keepSource = true)
    {

        if (empty($model)) $model = self::$i18nModels;

        foreach ($model as $modelClass) {
            $model = CActiveRecord::model($modelClass);

            /** @var $model I18NAdapterAbstract */
            if ($model instanceof I18NAdapterAbstract) {
                $model->installTranslationSchema(!$keepSource);
                echo str_pad(get_class($model), 40, '.') . " OK " . PHP_EOL;
            } else {
                echo str_pad(get_class($model), 40, '.') . " I18N Missing" . PHP_EOL;
            }
        }
    }

    public function actionRemoveFields(array $model = array())
    {

        if (empty($model)) $model = self::$i18nModels;

        foreach ($model as $modelClass) {
            $model = CActiveRecord::model($modelClass);

            /** @var $model I18NAdapterAbstract */
            if ($model instanceof I18NAdapterAbstract) {
                $schema = $model->getTableSchema();
                foreach ($model->i18nAttributes() as $attribute) {
                    if ($schema->getColumn($attribute)) {
                        Yii::app()->db->createCommand(
                            Yii::app()->db->getSchema()->dropColumn($model->tableName(), $attribute)
                        )->execute();
                    }
                }
                echo str_pad(get_class($model), 40, '.') . " OK " . PHP_EOL;
            } else {
                echo str_pad(get_class($model), 40, '.') . " I18N Missing" . PHP_EOL;
            }
        }
    }

    /**
     * @param array $model
     */
    public function actionUninstall(array $model = array())
    {
        if (empty($model)) $model = self::$i18nModels;

        foreach ($model as $modelClass) {
            $model = CActiveRecord::model($modelClass);

            /** @var $model I18NAdapterAbstract */
            if ($model instanceof I18NAdapterAbstract) {
                $model->uninstallTranslationSchema();

                echo str_pad(get_class($model), 40, '.') . " OK " . PHP_EOL;
            } else {
                echo str_pad(get_class($model), 40, '.') . " I18N Missing" . PHP_EOL;
            }
        }
    }

    /**
     * @param string $lang The Language to Install
     * @param array $model The models to apply the new lang
     */
    public function actionAddLang($lang, array $model = array())
    {
        if (empty($model)) $model = self::$i18nModels;

        foreach ($model as $modelClass) {
            $model = CActiveRecord::model($modelClass);

            /** @var $model I18NAdapterAbstract */
            if ($model instanceof I18NAdapterAbstract) {
                $model->addLangTranslationSchema($lang);
                echo str_pad(get_class($model), 40, '.') . " OK " . PHP_EOL;
            } else {
                echo str_pad(get_class($model), 40, '.') . " I18N Missing" . PHP_EOL;
            }
        }
    }

    /**
     * @param string $lang The Language to Install
     * @param array $model The models to apply the new lang
     */
    public function actionRemoveLang($lang, array $model = array())
    {
        if (empty($model)) $model = self::$i18nModels;

        foreach ($model as $modelClass) {
            $model = CActiveRecord::model($modelClass);

            /** @var $model I18NAdapterAbstract */
            if ($model instanceof I18NAdapterAbstract) {
                $model->removeLangTranslationSchema($lang);
                echo str_pad(get_class($model), 40, '.') . " OK " . PHP_EOL;
            } else {
                echo str_pad(get_class($model), 40, '.') . " I18N Missing" . PHP_EOL;
            }
        }
    }

}
