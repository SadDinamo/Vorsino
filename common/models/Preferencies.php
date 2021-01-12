<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "preferencies".
 *
 * @property int $id
 * @property string $name
 * @property string|null $value
 * @property string|null $min
 * @property string|null $max
 */
class Preferencies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'preferencies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'value', 'min', 'max'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'min' => 'Min',
            'max' => 'Max',
        ];
    }
}
