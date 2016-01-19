<?php

Yii::import('frankenstein.controllers.FController');
class DefaultController extends FController
{
    public function behaviors()
    {
        return array(
            'widgets' => array(
                'class' => 'frankenstein.behaviors.controllers.FHasWidgetsBehavior',
            ),
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', 'roles' => array('Translator')),
            array('allow', 'actions' => array('error')),
            array('deny', 'users' => array('*'))
        );
    }

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionImport()
    {
        $model = new ImportForm();
        $data = Yii::app()->request->getParam('ImportForm');
        if (!empty($data))
            $model->setAttributes($data);

        if (isset($data) && $model->validate()) {
            $sourcePath = Yii::getPathOfAlias('application');
            $translator = $model->translator;
            $fileTypes = array('php');
            $exclude = array(
                '.svn',
                'yiilite.php',
                'yiit.php',
                '/i18n/data',
                '/messages',
                '/vendors',
                '/web/js',
            );

            $options = array();
            if (isset($fileTypes))
                $options['fileTypes'] = $fileTypes;
            if (isset($exclude))
                $options['exclude'] = $exclude;

            $files = CFileHelper::findFiles(realpath($sourcePath), $options);

            $messages = array();
            foreach ($files as $file)
                $messages = array_merge_recursive($messages, $this->extractMessages($file, $translator));

            $app = Yii::app();
            $tx = $app->getDb()->beginTransaction();

            try {
                if ($model->empty) {
                    I18nCategory::model()->deleteAll();
                    I18nMessage::model()->deleteAll();
                    I18nSource::model()->deleteAll();
                }

                $categoryModels = array();
                foreach ($messages as $category => $msgs) {
                    if (isset($categoryModels[$category])) {
                        $real_category = $categoryModels[$category];
                    } else {
                        $real_category = I18nCategory::model()->findByPk($category);
                        if (!$real_category) {
                            $real_category = new I18nCategory;
                            $real_category->setAttributes(
                                array(
                                    'category' => $category,
                                )
                            );

                            if (!$real_category->save()) {
                                $tx->rollback();
                                $this->notifyUser('error', Yii::t('app', 'An error occurs importing the messages.') . print_r($real_category->errors, true));
                                $this->redirectBack();
                            }
                        }
                        $categoryModels[$category] = $real_category;
                    }

                    $msgs = array_values(array_unique($msgs));

                    foreach ($msgs as $msg) {
                        $sourceExists = I18nSource::model()->findByAttributes(
                            array(
                                'category' => $real_category->category,
                                'message' => $msg
                            )
                        );

                        if (!$sourceExists) { /* If the source does not exist, create it */
                            $source = new I18nSource();
                            $source->setAttributes(
                                array(
                                    'category' => $real_category->category,
                                    'message' => $msg
                                )
                            );
                            $source->save();
                        }
                    }
                }

                $tx->commit();
            } catch (CException $e) {
                $tx->rollback();
            }

            $this->redirectBack();
        } else {
            $this->recoveryReturnUrl();
            $this->render('import',
                array(
                    'model' => new Language(),
                    'fmodel' => $model
                )
            );
        }
    }

    protected function extractMessages($fileName, $translator)
    {
        //echo "Extracting messages from $fileName...\n";
        $subject = file_get_contents($fileName);
        $n = preg_match_all('/\b' . $translator . '\s*\(\s*(\'.*?(?<!\\\\)\'|".*?(?<!\\\\)")\s*,\s*(\'.*?(?<!\\\\)\'|".*?(?<!\\\\)")\s*[,\)]/s', $subject, $matches, PREG_SET_ORDER);
        $messages = array();
        for ($i = 0; $i < $n; ++$i) {
            if (($pos = strpos($matches[$i][1], '.')) !== false)
                $category = substr($matches[$i][1], $pos + 1, -1);
            else
                $category = substr($matches[$i][1], 1, -1);
            $message = $matches[$i][2];

            if (($pos = strpos($message, '<?php ')) !== false) continue;
            if (strlen($category) > 100) continue;
            $messages[$category][] = @eval("return $message;"); // use eval to eliminate quote escape
        }
        return $messages;
    }
}
