<?php
namespace frontend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class MainController extends Controller
{
    public function init()
    {
        parent::init();
        //重新定义布局相对路径
        $this->layout = "top";
    }

    public function actionIndex()
    {
//        $this->layout = 'top';
//        print_r($this->layout);exit;
        return $this->render('index');
    }

}
