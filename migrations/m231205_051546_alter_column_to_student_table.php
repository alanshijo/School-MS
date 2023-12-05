<?php

use yii\db\Migration;

/**
 * Class m231205_051546_alter_column_to_student_table
 */
class m231205_051546_alter_column_to_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('{{%student}}', '[[student_img]]', $this->string(255)->null());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('{{%student}}', '[[student_img]]', $this->string(255)->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231205_051546_alter_column_to_student_table cannot be reverted.\n";

        return false;
    }
    */
}
