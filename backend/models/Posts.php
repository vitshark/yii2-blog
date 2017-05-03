<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%posts}}".
 *
 * @property integer $post_id
 * @property integer $category_id
 * @property string $title
 * @property string $image
 * @property string $short
 * @property string $text
 * @property string $slug
 * @property integer $time
 * @property integer $views
 * @property integer $status
 *
 * @property Categories $category
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%posts}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title'], 'required'],
            [['category_id', 'time', 'views', 'status'], 'integer'],
            [['text'], 'string'],
            [['title', 'image', 'slug'], 'string', 'max' => 128],
            [['short'], 'string', 'max' => 1024],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'image' => 'Image',
            'short' => 'Short',
            'text' => 'Text',
            'slug' => 'Slug',
            'time' => 'Time',
            'views' => 'Views',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['category_id' => 'category_id']);
    }
}
