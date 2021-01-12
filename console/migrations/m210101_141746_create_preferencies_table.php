<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%preferencies}}`.
 */
class m210101_141746_create_preferencies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%preferencies}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'value' => $this->string(),
            'min' => $this->string(),
            'max' => $this->string(),
        ]);

        $this->insert( '{{%preferencies}}', [
            'name' => 'ISM File Server',
            'value' => '127.0.0.1',
        ]);

        $this->insert( '{{%preferencies}}', [
            'name' => 'ISM File Folder',
            'value' => '\uploads\ismdocs',
        ]);

        $this->insert( '{{%preferencies}}', [
            'name' => 'Email Server',
            'value' => 'xxx',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%preferencies}}');
    }
}
