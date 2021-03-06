<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%settings}}".
 *
 * @property integer $setting_id
 * @property string $name
 * @property string $title
 * @property string $value
 * @property integer $visibility
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%settings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title'], 'required'],
            [['visibility'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['title'], 'string', 'max' => 128],
            [['value'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'setting_id' => 'Setting ID',
            'name' => 'Name',
            'title' => 'Title',
            'value' => 'Value',
            'visibility' => 'Visibility',
        ];
    }
}
