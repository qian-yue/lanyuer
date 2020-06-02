<?php

namespace frontend\models;

use common\models\Admin;
use yii\base\Model;

class Login extends Model
{
    /**
     * {@inheritdoc}
     */
    public function login($params)
    {
        $model = new Admin();
        $find = $model::find()
            ->where(['phone'=>$params['phone'],'password'=>md5($params['password'])])
            ->count();
        return $find;
    }
}
