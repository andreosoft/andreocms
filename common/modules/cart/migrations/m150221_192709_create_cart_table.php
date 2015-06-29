<?php

use yii\db\Schema;
use yii\db\Migration;

class m150221_192709_create_cart_table extends Migration {

    public function up() {

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%cart}}', [
            "id" => Schema::TYPE_PK,
            "status" => "int(11) NOT NULL DEFAULT '0'",
            "cart_customer_id" => "int(11) NOT NULL DEFAULT '0'",
            "createdby" => "int(11) DEFAULT '0'",
            "createdon" => "datetime DEFAULT NULL",
            "editedby" => "int(11) DEFAULT '0'",
            "editedon" => "datetime DEFAULT NULL",
            "full_price" => "decimal(11,2) DEFAULT '0.00'",
            "delivery_price" => "decimal(11,2) DEFAULT '0.00'",
            "products_price" => "decimal(11,2) DEFAULT '0.00'",
            "comments" => "tinytext NOT NULL DEFAULT ''",
                ], $tableOptions);

        // Indexes
        $this->createIndex('cart_customer_id', '{{%cart}}', 'cart_customer_id');
        $this->createIndex('status', '{{%cart}}', 'status');
        $this->createIndex('createdby', '{{%cart}}', 'createdby');
        $this->createIndex('createdon', '{{%cart}}', 'createdon');
        $this->createIndex('editedby', '{{%cart}}', 'editedby');
        $this->createIndex('editedon', '{{%cart}}', 'editedon');

        $this->createTable('{{%cart_products}}', [
            "id" => Schema::TYPE_PK,
            "cart_id" => "int(11) NOT NULL DEFAULT '0'",
            "product_id" => "int(11) NOT NULL DEFAULT '0'",
            "amount" => "int(11) NOT NULL DEFAULT '0'",
            "price" => "decimal(11,2) DEFAULT '0.00'",
            "status" => "int(11) NOT NULL DEFAULT '0'",
            "comments" => "tinytext NOT NULL DEFAULT ''",
                ], $tableOptions);
        
        $this->createIndex('cart_id', '{{%cart_products}}', 'cart_id');
        $this->createIndex('product_id', '{{%cart_products}}', 'product_id');
        $this->createIndex('status', '{{%cart_products}}', 'status');
        
        $this->createTable('{{%cart_customer}}', [
            "id" => Schema::TYPE_PK,
            "name" => "varchar(255) NOT NULL DEFAULT ''",
            "adress" => "tinytext NOT NULL DEFAULT ''",
            "phone" => "varchar(255) NOT NULL DEFAULT ''",
            "email" => "varchar(255) NOT NULL DEFAULT ''",
            "status" => "int(11) NOT NULL DEFAULT '0'",
            "user_id" => "int(11) NOT NULL DEFAULT '0'",
            "comments" => "tinytext NOT NULL DEFAULT ''",
                ], $tableOptions);     
        
        $this->createTable('{{%cart_delivery}}', [
            "id" => Schema::TYPE_PK,
            "cart_id" => "int(11) NOT NULL DEFAULT '0'",
            "cart_delivery_type_id" => "int(11) NOT NULL DEFAULT '0'",
            "amount" => "int(11) NOT NULL DEFAULT '0'",
            "price" => "decimal(11,2) DEFAULT '0.00'",
            "status" => "int(11) NOT NULL DEFAULT '0'",
            "comments" => "tinytext NOT NULL DEFAULT ''",
                ], $tableOptions);
        
        $this->createIndex('cart_id', '{{%cart_delivery}}', 'cart_id');
        $this->createIndex('cart_delivery_type_id', '{{%cart_delivery}}', 'cart_delivery_type_id');
        $this->createIndex('status', '{{%cart_delivery}}', 'status');
        
        $this->createTable('{{%cart_delivery_type}}', [
            "id" => Schema::TYPE_PK,
            "name" => "varchar(255) NOT NULL DEFAULT ''",
            "description" => "varchar(255) NOT NULL DEFAULT ''",
            "amount" => "int(11) NOT NULL DEFAULT '0'",
            "price" => "decimal(11,2) DEFAULT '0.00'",
            "status" => "int(11) NOT NULL DEFAULT '0'",
            "comments" => "tinytext NOT NULL DEFAULT ''",
                ], $tableOptions);
        
        $this->createIndex('status', '{{%cart_delivery_type}}', 'status');
    }

    public function down() {
        $this->dropTable('{{%cart}}');
        $this->dropTable('{{%cart_products}}');
        $this->dropTable('{{%cart_customer}}');
        $this->dropTable('{{%cart_delivery}}');
        $this->dropTable('{{%cart_delivery_type}}');
        return false;
    }

}
