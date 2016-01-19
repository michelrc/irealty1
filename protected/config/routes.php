<?php
return array(
    '/' => 'frontend/default/index',
    'admin' => 'site/index',
    'changelang/<lang:\w+>'=>'frontend/default/changelang',
    'gii'=>'gii',
    'gii/<controller:\w+>'=>'gii/<controller>',
    'gii/<controller:\w+>/<action:\w+>'=>'gii/<controller>/<action>',
    'sendemail'=>'frontend/default/sendemail',
    'searcherProperty'=>'frontend/default/searcherProperty',
);
?>