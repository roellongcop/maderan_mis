<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sample`.
 */
class m190523_133438_create_sample_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sample}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sample}}');
    }
}
