<?php
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use app\widgets\Alert;

NavBar::begin([
//    'brandLabel' => '首页',
    //'brandUrl' => Yii::$app->homeUrl,
//    'brandUrl' => 'index',
    'options' => [
    'class' => 'navbar-top navbar-fixed-top', //对应的样式
        'style'=>"background:aliceblue"
    ],
]);

echo Nav::widget([
    'items' => [
        ['label' => '首页', 'url' => ['/main/index']],
        ['label' => '用户', 'url' => ['/user/list']],
        ['label' => '商品', 'options'=>['class'=>'ycn-banner'], 'items'=>[
                ['label' => '<i class="fa fa-wikipedia-w top-tag"></i> 商品1', 'url' => ['topic/wiki'],'encode' => false],
                ['label' => '<i class="fa fa-question-circle top-tag"></i> 商品2', 'url' => ['topic/question'],'encode' => false],
                ['label' => '<i class="fa fa-book top-tag"></i> 商品3', 'url' => ['topic/blog'],'encode' => false],
            ]
        ],
    ],
    'options' => ['class' => 'navbar-nav navbar-left'],
]);

echo Nav::widget([
'items' => [
    ['label' => '登出', 'url' => ['/topic/index']],
    ['label' => '注册', 'options'=>['class'=>'ycn-banner'],],
],
'options' => ['class' => 'navbar-nav navbar-right'],
]);

//echo Nav::widget([
//    'options' => ['class' => 'navbar-nav navbar-right'],//显示在右边
//    'items' => [
//        Yii::$app->session['user']['isLogin'] != 1 ? (
//        ['label'=>'登录','url'=>['/member/auth']]
//        ) : '',
//        Yii::$app->session['user']['isLogin'] != 1 ? (
//        ['label'=>'注册','url'=>['/member/reg']]
//        ) : '',
//        Yii::$app->session['user']['isLogin'] == 1 ? (
//            Yii::$app->session['user']['username'] . ',欢迎回来' ." ". Html::a('退出',['/member/logout'])
//        ) : '',
//    ],
//]);

NavBar::end();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <?= $content ?>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
