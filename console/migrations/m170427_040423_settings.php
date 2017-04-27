<?php

use yii\db\Schema;
use yii\db\Migration;

class m170427_040423_settings extends Migration
{
    const VERSION = 0.1;
    public function up()
    {
        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql') {         
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        
        //таблица settings
         //SETTINGS
        $this->createTable(
                '{{%settings}}', [
            'setting_id' => Schema::TYPE_PK,
            'name' =>Schema::TYPE_STRING . '(64) NOT NULL', //$this->string(64)->notNull(),
            'title' =>Schema::TYPE_STRING . '(128) NOT NULL', //$this->string(128)->notNull(),
            'value' =>Schema::TYPE_STRING . '(1024) NULL DEFAULT NULL' , //$this->string(1024),
            'visibility' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 0',
        ], $tableOptions
                );
        
        
        
        //INSERT VERSION
        $this->delete('{{%settings}}', ['name' => 'yii2-blog_version']);
        $this->insert('{{%settings}}', [
            'name' => 'yii2-blog_version',
            'value' => self::VERSION,
            'title' => 'Yii2-blog version',
            'visibility' => 0
        ]);

    }

    public function down()
    {
        $this->dropTable('{{%settings}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
