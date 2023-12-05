<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%student}}`.
 */
class m231129_092647_create_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%student}}', [
            'id' => $this->primaryKey(),
            'student_img' => $this->string(255)->notNull(),
            'full_name' => $this->string(100)->notNull(),
            'phone_no' => $this->string(20)->notNull(),
            'email' => $this->string(255)->notNull()->unique(),
            'dob' => $this->date()->notNull(),
            'address' => $this->string(255)->notNull(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull()
        ]);

        $this->addForeignKey('fk_created_by_user', '{{%student}}', '[[created_by]]', '{{%user}}', '[[id]]');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%student}}');

        $this->dropForeignKey('fk_created_by_user', '{{%student}}');
    }
}
