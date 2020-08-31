<?php

namespace modava\iway\models\table;

use cheatsheet\Time;
use modava\iway\components\MyIwayModel;
use Yii;
use yii\db\ActiveRecord;

class PaymentTable extends MyIwayModel
{
    public static function tableName()
    {
        return 'iway_payment';
    }


    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        $cache = Yii::$app->cache;
        $keys = [];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
