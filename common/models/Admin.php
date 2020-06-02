<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Admin model
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $createTime
 */
//class Admin extends ActiveRecord implements IdentityInterface
class Admin extends ActiveRecord
{
    const STATUS_DELETED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
//        return  't_admin';
        return '{{%admin}}';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'min' => 2, 'max' => 255],
            ['sms', 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

}
