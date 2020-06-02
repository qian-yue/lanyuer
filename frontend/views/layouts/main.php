<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<!--基础菜单布局-->
<!--<script src="\yii2test\frontend\web\css\hui-iconfont\1.0.9\iconfont.css" type="text/css"></script>-->

<?=$this->registerCssFile('@web/css/hui-iconfont/1.0.9/iconfont.css');?>
<?=$this->registerCssFile('@web/css/hui-iconfont/1.0.9/iconfont.min.css');?>
<?=$this->registerCssFile('@web/css/hui-iconfont/1.0.9/login.css');?>
<?=$this->registerCssFile('@web/assets/slider/style.css');?>
<?=$this->registerJsFile('@web/assets/slider/style.js');?>
<?=$this->registerJsFile('@web/assets/866e555a/jquery.min.js');?>
<?=$this->registerJsFile('@web/assets/layer/layer.js');?>
<style>
    .cls_hide{
        display: none;
    }
    .breadcrumb{
        bottom: 20px;
    }
    .Hui-article-box{
        position: unset!important;
        overflow: visible!important;
    }
</style>

<?= Html::csrfMetaTags() ?>
<!--<title>--><?//= Html::encode($this->title) ?><!--</title>-->
<title>lanyuer</title>
<?php $this->head() ?>

<?php $this->beginBody() ?>

<!--/_menu 后续考虑更细致分离-->
<?= $content ?>
<?php $this->endBody() ?>

<?php $this->endPage() ?>

