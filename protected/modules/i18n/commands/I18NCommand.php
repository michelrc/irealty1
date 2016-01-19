<?php
/**
 * Author : Yusnel Rojas Garcia <yrojass@gmail.com>
 * User   : one
 * Date   : 8/20/12
 * Time   : 1:36 PM
 */
class I18NCommand extends CConsoleCommand
{

    public static $i18nModels = array(
        'Zone', 'Airport', 'City', 'Country', 'Region', 'Currency', 'Harbor',
        'EmailCategory', 'EmailLayout', 'EmailTemplate', 'Event', 'EventType',
        'ProviderGroup', 'ProviderType', 'Provider', /*'ProviderType',*/
        'Hotel', 'HotelReduction', 'HotelRoomType', 'HotelBar', 'HotelRestaurant', 'HotelSupplement', 'LeisureType', 'BarType', 'MediaType', 'MediaItem',
        'PassangerType', 'PaymentMode', 'PaymentPeriod',
        'PersonType', 'RegimenType', 'RestaurantType', 'RoomComfort', 'RoomDefinition', 'RoomView',
        'RoomItem', 'ServiceType', 'Topic', 'TourGuide', 'TourguideCategory', 'Typology',
        'Excursion', 'SeoPage',
        'CarType', 'CarTransmission', 'CarFuel', 'CarCategory', 'CarSupplement', 'MediaItemCategory'
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

            }
        }
    }

    /**
     * @param string $lang The Language to Install
     * @param array $models The models to apply the new lang
     */
    public function actionAddLang($lang, array $models = array())
    {
        if (empty($models)) $models = self::$i18nModels;

        foreach ($models as $modelClass) {
            $models = CActiveRecord::model($modelClass);

            /** @var $models I18NAdapterAbstract */
            if ($models instanceof I18NAdapterAbstract) {
                $models->addLangTranslationSchema($lang);
                echo str_pad(get_class($models), 40, '.') . " OK " . PHP_EOL;
            } else {

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

            }
        }
    }
}
