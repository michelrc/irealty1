<!DOCTYPE html>
<html lang="<?php echo app()->language;?>">
<head>
    <meta charset="UTF-8" />



<!--    --><?php //$this->widget('application.modules.irseo.widgets.IRSeo'); ?>
    <?php
    cs()->registerCssFile(thu('css/unicorn.login.css'));
    cs()->registerCssFile(thu('css/jquery.gritter.css'));


    ?>
</head>
<body>




<div id="logo">
    <?php
    $entity=CompanyInfo::model()->findAll();
    if(isset($entity[0])){
        if(isset($entity[0]->_company_logo) && $entity[0]->_company_logo->getFileUrl('normal')!='') {
            echo CHtml::link(CHtml::image($entity[0]->_company_logo->getFileUrl('normal'),''),'/');
        }
        else {
            echo '<h1>'.$entity[0]->company_name.'</h1>';
        }
    }
    else {
        echo app()->name;
    }?>

</div>
<div id="loginbox">
    <?php echo $content; ?>
</div>

<?php
cs()->registerScriptFile(thu('js/jquery.gritter.js'), CClientScript::POS_END);
cs()->registerScriptFile(thu('js/unicorn.login.js'), CClientScript::POS_END);
//cs()->registerScriptFile(thu('js/jquery.ias.js'), CClientScript::POS_END);

?>
<?php
$flashes = user()->flashes;
foreach($flashes as $key => $message){
    $icons = param('flash.icons');
    $icon = $icons[$key];
    cs()->registerScript('gritter_flash', <<<JS
    $.gritter.add({
        text:	'<i class="icon-$icon"></i> $message',
        sticky: false
    });
JS
        , CClientScript::POS_READY);

}
?>
</body>
</html>
