<?php

use yii\db\Migration;

/**
 * Class m200608_112203_create_table_customer_type
 */
class m200608_112203_create_table_customer_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('customer_type');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('customer_type', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'description' => $this->text()->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1)->comment('0: disabled, 1: actived'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addColumn('customer_type', 'language', "ENUM('vi', 'en', 'jp') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vi' COMMENT 'Language' AFTER `status`");
            $this->createIndex('index-language', 'customer_type', 'language');
            $this->addForeignKey('fk_customer_type_created_by_user', 'customer_type', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('fk_customer_type_updated_by_user', 'customer_type', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        $check_rows = Yii::$app->db->createCommand('SELECT id FROM customer_type')->queryOne();
        if ($check_rows === false) {
            $this->execute("INSERT INTO `customer_type`(`id`, `name`, `description`) VALUES
(1, 'Khách online', 'Khách hàng được Sales Online tư vấn và nhập vào hệ thống'),
(2, 'Khách vãng lai', 'Khách hàng vãng lai đến trực tiếp phòng khám');");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200608_112203_create_table_customer_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200608_112203_create_table_customer_type cannot be reverted.\n";

        return false;
    }
    */
}
