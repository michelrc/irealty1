<?php

/**
 * Class ModuleBehavior
 *
 * @property string $adminMenus
 */
class ModuleBehavior extends CBehavior
{

    public function getAdminMenus()
    {
        $id = $this->owner->id;
        $items = array();
        $files = scandir(Yii::getPathOfAlias("$id.models"));
        foreach ($files as $file) {
            if ($file[0] !== '.' && CFileHelper::getExtension($file) === 'php') {
                $fileClassName = substr($file, 0, strpos($file, '.'));
                if (class_exists($fileClassName) && is_subclass_of($fileClassName, 'GxActiveRecord')) {
                    $fileClass = new ReflectionClass($fileClassName);
                    $model = $fileClassName::model();
                    if (!$fileClass->isAbstract()) {
                        if (method_exists($model, 'hasAdmin') && $model->hasAdmin()) {
                            $icon = param('ycm.model.defaultIcon');
                            $items[] = array(
                                'icon' => isset($model->adminIcon) ? $model->adminIcon : ($icon ? $icon : 'ok'),
                                'label' => ycm()->getAdminName($fileClassName),
                                'url' => ycm_url($fileClassName),
                                'active' => ycm_active($fileClassName),
                                'visible' => user()->checkAccess($fileClassName . '.list'),
                            );
                        }
                    }
                }
            }
        }

        $visibleMenu = false;
        foreach ($items as $item) {
            if ($item['visible'])
                $visibleMenu = true;
        }


        if (count($items)) {
            return array(
                array(
                    'url' => '#',
                    'icon' => 'hand-right',
                    'label' => $this->owner->name,
                    'visible' => $visibleMenu,
                    'items' => $items,
                ),
            );
        }
    }
}
