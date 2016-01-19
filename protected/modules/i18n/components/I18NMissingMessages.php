<?php
/**
 * Handle onMissingTranslation event
 */
class I18NMissingMessages extends CApplicationComponent
{

    public static $ignoredCategories = array();

    /**
     * Add missing translations to the source table and
     * If we are using a different translation then the original one
     * Then add the same message to the translation table.
     * @param \CMissingTranslationEvent $event
     */
    public static function load($event)
    {

        if (in_array($event->category, self::$ignoredCategories)) return;

        // Load the messages
        /** @var $source I18nSource */
        $source = I18nSource::model()->findByAttributes(array('message' => $event->message, 'category' => $event->category));
        /** @var $category I18nCategory */
        $category = I18nCategory::model()->findByPk($event->category);

        if (!$category) {
            // Add it
            $category = new I18nCategory();

            $category->category = $event->category;
            if (!$category->save()) return; //cant save the category
        }

        // If we didn't find one then add it
        if (!$source) {
            // Add it
            $source = new I18nSource;

            $source->category = $event->category;
            $source->message = $event->message;
            try {
                $source->save();
            } catch (Exception $e) {
            }
        }

        if ($event->language != Yii::app()->sourceLanguage) {
            // Do the same thing with the messages
            $translation = I18nMessage::model()->findByAttributes(array('language' => $event->language, 'id' => $source->id));

            // If we didn't find one then add it
            if (!$translation) {
                $source = I18nSource::model()->findByAttributes(array('message' => $event->message, 'category' => $event->category));

                if ($source) {
                    // Add it
                    $model = new I18nMessage();

                    $model->id = $source->id;
                    $model->language = $event->language;
                    $model->translation = $event->message;
                    try {
                        $model->save();
                    } catch (Exception $e) {

                    }
                }

            }
        }

    }
}
