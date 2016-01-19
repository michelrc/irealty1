<?php
return array(
    '<language:\w{2}>/<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<language:\w{2}>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<language:\w{2}>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    '<language:\w{2}>/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
);