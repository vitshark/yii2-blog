<?php

//use yii\db\Schema;
use yii\db\Migration;

class m170427_101142_categories extends Migration
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
                
    }

    public function down()
    {
        $this->dropTable('{{%categories}}');
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
