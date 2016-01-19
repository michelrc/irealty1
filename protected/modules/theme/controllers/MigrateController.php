<?php

class MigrateController extends GxController
{

    function accessRules()
    {
        return array(

            array('allow',
                'users' => mod('user')->getAdmins(),

            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function behaviors()
    {
        return CMap::mergeArray(parent::behaviors(), array(
           // 'ajax' => 'frankenstein.behaviors.controllers.FAjaxControllerBehavior'
        ));
    }


    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    protected function runCommand($args){
        $commandPath = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . 'commands';
        $runner = new CConsoleCommandRunner();
        $runner->addCommands($commandPath);
        $commandPath = Yii::getFrameworkPath() . DIRECTORY_SEPARATOR . 'cli' . DIRECTORY_SEPARATOR . 'commands';
        $runner->addCommands($commandPath);
        ob_start();
        $runner->run($args);
        echo htmlentities(ob_get_clean(), null, Yii::app()->charset);
    }

    public function actionUp()
    {
        $this->runCommand(array('yiic', 'migrate', '--interactive=0'));
    }

    public function actionDown($n=1)
    {
        $this->runCommand(array('yiic', 'migrate', 'down', $n, '--interactive=0'));
    }

}
