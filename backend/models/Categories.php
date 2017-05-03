<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%categories}}".
 *
 * @property integer $category_id
 * @property string $title
 * @property string $image_file
 * @property integer $order_num
 * @property string $slug
 * @property integer $parent_id
 * @property integer $status
 *
 * @property Posts[] $posts
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%categories}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['order_num', 'parent_id', 'status'], 'integer'],
            [['title', 'image_file', 'slug'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'title' => 'Title',
            'image_file' => 'Image File',
            'order_num' => 'Order Num',
            'slug' => 'Slug',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['category_id' => 'category_id']);
    }
}
