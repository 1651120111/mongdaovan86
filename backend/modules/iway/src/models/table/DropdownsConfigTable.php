<?php

namespace modava\iway\models\table;

use Yii;
use yii\db\ActiveRecord;

class DropdownsConfigTable extends ActiveRecord
{
    static $CACHE_PREFIX = 'redis-dropdowns-config';

    public static function tableName()
    {
        return 'dropdowns_config';
    }


    public function afterDelete()
    {
        $cache = Yii::$app->cache;
        $keys = [
            self::$CACHE_PREFIX . '-' . $this->table_name
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
            self::$CACHE_PREFIX . '-' . $this->table_name
        ];
        foreach ($keys as $key) {
            $cache->delete($key);
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}
