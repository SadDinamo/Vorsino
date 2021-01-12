<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ismdoc".
 *
 * @property int $id
 * @property string|null $code
 * @property string $name
 * @property int $version
 * @property int|null $authorId
 * @property string|null $uploadedOn
 * @property string $link
 * @property int $status
 */
class Ismdoc extends \yii\db\ActiveRecord
{
    public $file;
    const STATUS_NEW = 1;
    const STATUS_AGREED = 2;
    const STATUS_APPROVED = 3;
    const STATUS_ABANDONED = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ismdoc';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code','authorId','name', 'version', 'link', 'status'], 'required', 'message' => 'Поле не может быть пустым'],
            [['file'], 'required', 'message' => 'Требуется указать расположение файла'],
            [['version', 'authorId', 'status'], 'integer'],
            [['uploadedOn'], 'safe'],
            [['code', 'name', 'link', 'latestLink'], 'string', 'max' => 255],
            [['name'], 'unique', 'message' => 'Такое имя документа уже есть в базе данных'],
            [['link'], 'unique'],
            [['file'], 'file'],
            [['code'], 'unique', 'message' => 'Такой код документа уже есть в базе данных'],
            ['code','match','pattern'=>'/^[A-Z0-9][A-Z0-9_-]*$/', 'message'=>'Код должен начинаться с заглавной латинской буквы или цифры, далее: заглавные латинские буквы, цифры, подчеркивание и дефис']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Код',
            'name' => 'Название',
            'version' => 'Версия',
            'authorId' => 'ID автора',
            'uploadedOn' => 'Дата загрузки',
            'link' => 'Файл',
            'file' => 'Файл',
            'status' => 'Статус',
            'latestLink' => 'Ссылка на последнюю утвержденную версию документа'
        ];
    }
}
