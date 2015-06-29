<?php

use yii\db\Schema;
use yii\db\Migration;

class m150221_192709_create_callback_table extends Migration
{
    public function up()
    {
        // MySql table options
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        // Blogs table
        $this->createTable('{{%callback}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . " NOT NULL DEFAULT ''",
            'adress' => Schema::TYPE_STRING . " NOT NULL DEFAULT ''",
            'email' => Schema::TYPE_STRING . " NOT NULL DEFAULT ''",
            'phone' => Schema::TYPE_STRING . " NOT NULL DEFAULT ''",
            'content' => "longtext NOT NULL DEFAULT ''",
            'data' => Schema::TYPE_STRING . " NOT NULL DEFAULT ''",
            'url' => Schema::TYPE_STRING . " NOT NULL DEFAULT ''",
            'createdby' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'createdon' => Schema::TYPE_DATETIME . " DEFAULT NULL",
            'editedby' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
            'editedon' => Schema::TYPE_DATETIME . " DEFAULT NULL",            
            'status' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0',
        ], $tableOptions);

        // Indexes
        $this->createIndex('createdby', '{{%callback}}', 'createdby');
        $this->createIndex('status', '{{%callback}}', 'status');
        $this->createIndex('createdon', '{{%callback}}', 'createdon');
    
    }

    public function down()
    {
        $this->dropTable('{{%callback}}');

        return false;
    }
}
