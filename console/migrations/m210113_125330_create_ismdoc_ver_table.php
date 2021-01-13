<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ismdoc_ver}}`.
 */
class m210113_125330_create_ismdoc_ver_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // таблица актуальных версий документов
        $this->createTable('{{%ismdoc_ver}}', [
            'id' => $this->primaryKey(),
            'ismdocId' => $this->integer()->notNull(),
            'latestVersion' => $this->integer()->notNull(),
            'latestApprovedVersion' => $this->integer()->Null(),
        ]);

        //внешний ключ для id ism doc
        $this->addForeignKey(
            'ismdocIDVerKey', //имя ключа
            '{{%ismdoc_ver}}', //текущая таблица
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
        $this->dropForeignKey('ismdocIDKey','{{%ismdoc_ver}}');
        $this->dropTable('{{%ismdoc_ver}}');
    }
}
