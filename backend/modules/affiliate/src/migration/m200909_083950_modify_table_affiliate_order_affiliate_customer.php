<?php

use yii\db\Migration;

/**
 * Class m200909_083950_modify_table_affiliate_order_affiliate_customer
 */
class m200909_083950_modify_table_affiliate_order_affiliate_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Affiliate Order
        $this->addColumn('affiliate_order', 'commision_for_coupon_owner', $this->decimal(11)->defaultValue(0)->comment('Hoa hồng cho chủ coupon'));

        // Affiliate Customer
        $this->addColumn('affiliate_customer', 'bank_name', $this->string()->null()->comment('Tên ngân hàng'));
        $this->addColumn('affiliate_customer', 'bank_branch', $this->string()->null()->comment('Chi nhánh ngân hàng'));
        $this->addColumn('affiliate_customer', 'bank_customer_id', $this->string(35)->null()->comment('Số tài khoản'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200909_083950_modify_table_affiliate_order_affiliate_customer cannot be reverted.\n";

        return false;
    }
}
