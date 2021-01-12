<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ismDoc}}`.
 */
class m201210_144831_create_ismDoc_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ismDoc}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->unique()->null(),
            'name' => $this->string()->unique()->notNull(),
            'version' => $this->integer()->notNull(),
            'authorId' => $this->integer(),
            'uploadedOn' => $this->dateTime(),
            'link' => $this->string()->unique(),
            'latestLink' => $this->string()->Null(), // Сссылка на последнюю утвержденную версию
            'status' => $this->integer()->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ismDoc}}');
    }
}
