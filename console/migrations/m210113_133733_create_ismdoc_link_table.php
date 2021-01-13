<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ismdoc_link}}`.
 */
class m210113_133733_create_ismdoc_link_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ismdoc_link}}', [
            'id' => $this->primaryKey(),
            'ismdocId' => $this->integer()->notNull(),
            'version' => $this->integer()->notNull(),
            'authorId' => $this->integer()->notNull(),
            'uploadedOn' => $this->dateTime()->notNull(),
            'link' => $this->string()->unique(),
            'status' => $this->integer()->notNull(),
        ]);

        //внешний ключ для id ism doc
        $this->addForeignKey(
            'ismdocIDLinkKey', //имя ключа
            '{{%ismdoc_link}}', //текущая таблица
            'ismdocId', //имя столбца-ключа в текущей табице
            'ismdoc', // таблица с исходным ключом
            'id', // колонка исходного ключа
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('ismdocIDKey','{{%ismdoc_link}}');
        $this->dropTable('{{%ismdoc_link}}');
    }
}
