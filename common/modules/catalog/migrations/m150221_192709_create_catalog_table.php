<?php

use yii\db\Schema;
use yii\db\Migration;

class m150221_192709_create_catalog_table extends Migration {

    public function up() {

        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%catalog_products}}', [
            "id" => Schema::TYPE_PK,
            "name" => "varchar(255) COLLATE utf8_bin NOT NULL",
            "title" => "varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''",
            "introtext" => "text COLLATE utf8_bin NOT NULL",
            "content" => "mediumtext COLLATE utf8_bin NOT NULL",
            "description" => "tinytext COLLATE utf8_bin NOT NULL",
            "parent" => "int(11) DEFAULT '0'",
            "isparent" => "tinyint(1) NOT NULL DEFAULT '0'",
            "views" => "int(11) NOT NULL DEFAULT '0'",
            "image" => "tinytext COLLATE utf8_bin",
            "image_preview" => "tinytext COLLATE utf8_bin",
            "createdby" => "int(11) DEFAULT '0'",
            "createdon" => "datetime DEFAULT NULL",
            "deleted" => "tinyint(1) DEFAULT '0'",
            "deletedby" => "int(11) DEFAULT '0'",
            "category" => "int(11) DEFAULT NULL",
            "published" => "tinyint(1) NOT NULL DEFAULT '0'",
            "publishedon" => "datetime DEFAULT NULL",
            "price" => "decimal(11,2) NOT NULL DEFAULT '0.00'",
            "sellout" => "tinyint(1) NOT NULL DEFAULT '0'",
            "user_name" => "varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''",
            "user_type" => "varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''",
            "user_phone" => "varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''"
                ], $tableOptions);

        // Indexes
        $this->createIndex('name', '{{%catalog_products}}', 'name');
        $this->createIndex('category', '{{%catalog_products}}', 'category');
        $this->createIndex('published', '{{%catalog_products}}', 'published');
        $this->createIndex('sellout', '{{%catalog_products}}', 'sellout');
        $this->createIndex('isparent', '{{%catalog_products}}', 'isparent');
        $this->createIndex('views', '{{%catalog_products}}', 'views');
        $this->createIndex('user_type', '{{%catalog_products}}', 'user_type');

        $this->createTable('{{%catalog_categorys}}', [
            "id" => Schema::TYPE_PK,
            "name" => "varchar(255) COLLATE utf8_bin NOT NULL",
            "parent" => "int(11) NOT NULL DEFAULT '0'",
            "isparent" => "tinyint(1) NOT NULL DEFAULT '0'"
                ], $tableOptions);
        
        $this->createIndex('name', '{{%catalog_categorys}}', 'name');
        $this->createIndex('parent', '{{%catalog_categorys}}', 'parent');
        $this->createIndex('isparent', '{{%catalog_categorys}}', 'isparent');
    }

    public function down() {
        $this->dropTable('{{%catalog_products}}');
        $this->dropTable('{{%catalog_categorys}}');
        return false;
    }

}
