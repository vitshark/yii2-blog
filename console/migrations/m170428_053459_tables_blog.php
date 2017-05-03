<?php

use yii\db\Schema;
use yii\db\Migration;

class m170428_053459_tables_blog extends Migration
{
    public function up()
    {

        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql') {         
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        
        //таблица categories
         //
        $this->createTable(
                '{{%categories}}', [
                    'category_id'=>$this->primaryKey(),
                    'title'=> $this->string(128)->notNull(),
                    'image_file'=>$this->string(128)->defaultValue(NULL),
                    'order_num'=> $this->integer()->defaultValue(0),
                    'slug'=>$this->string(128)->defaultValue(NULL),
                    'parent_id'=>$this->integer(),
                    'status'=>$this->boolean()->defaultValue(1)
                    ], $tableOptions
                );
                
        
        //таблица статей posts
        
        $this->createTable(
                '{{%posts}}', [
                    'post_id' => Schema::TYPE_PK,
                    'category_id' => Schema::TYPE_INTEGER . ' NOT NULL',
                    'title' => Schema::TYPE_STRING . '(128) NOT NULL',                  
                    'image' => Schema::TYPE_STRING . '(128) NULL DEFAULT NULL',                  
                    'short' =>Schema::TYPE_STRING . '(1024) NULL DEFAULT NULL',
                    'text' =>Schema::TYPE_TEXT,
                    'slug' => Schema::TYPE_STRING . '(128) NULL DEFAULT NULL',
                    'time' =>Schema::TYPE_INTEGER . ' DEFAULT 0',
                    'views' =>Schema::TYPE_INTEGER . ' DEFAULT 0',
                    'status' =>Schema::TYPE_SMALLINT . ' DEFAULT 1',
                    'FOREIGN KEY(category_id) REFERENCES '
                    . $this->db->quoteTableName('{{%categories}}') . '(category_id) ON UPDATE CASCADE ON DELETE CASCADE'
        ], $tableOptions
                );
    }

    public function down()
    {
        $this->dropTable('{{%categories}}');
        $this->dropTable('{{%posts}}');
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
