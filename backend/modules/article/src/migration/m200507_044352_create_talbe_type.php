<?php

use yii\db\Migration;

/**
 * Class m200507_044352_create_talbe_type
 */
class m200507_044352_create_talbe_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%article_type}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'slug' => $this->string(255)->notNull()->unique(),
            'image' => $this->string(255)->null(),
            'description' => $this->string()->null(),
            'position' => $this->integer(11)->null(),
            'ads_pixel' => $this->text()->null(),
            'ads_session' => $this->text()->null(),
            'status' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
            'created_by' => $this->smallInteger()->null(),
            'updated_by' => $this->smallInteger()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_type}}');
    }
}
