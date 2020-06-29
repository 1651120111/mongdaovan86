<?php

namespace modava\customer\models\table;

use cheatsheet\Time;
use modava\customer\models\query\CustomerCoSoQuery;
use Yii;
use yii\db\ActiveRecord;

class CustomerCoSoTable extends \yii\db\ActiveRecord
{
    const STATUS_DISABLED = 0;
    const STATUS_PUBLISHED = 1;

    public static function tableName()
    {
        return 'customer_co_so';
    }

    public static function find()
    {
        return new CustomerCoSoQuery(get_called_class());
    }

    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [
            'redis-customer-co-so-get-all-co-so-' . $this->language,
            'redis-customer-co-so-get-by-id-' . $this->id . '-' . $this->language
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        $cache = Yii::$app->cache;
        $keys = [
            'redis-customer-co-so-get-all-co-so-' . $this->language,
            'redis-customer-co-so-get-by-id-' . $this->id . '-' . $this->language
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public static function getAllCoSo($language = null)
    {
        $language = $language ?: Yii::$app->language;
        $cache = Yii::$app->cache;
        $key = 'redis-customer-co-so-get-all-co-so-' . $language;
        $data = $cache->get($key);
        if ($data == false) {
            $data = self::find()->where(['language' => $language])->all();
            $cache->set($key, $data);
        }
        return $data;
    }

    public static function getById($id, $language = null)
    {
        $language = $language ?: Yii::$app->language;
        $cache = Yii::$app->cache;
        $key = 'redis-customer-co-so-get-by-id-' . $id . '-' . $language;
        $data = $cache->get($key);
        if ($data == false) {
            $data = self::find()->where(['id' => $id, 'language' => $language])->one();
            $cache->set($key, $data);
        }
        return $data;
    }
}
