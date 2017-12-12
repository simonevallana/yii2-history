<?php

use yii\db\Migration;

class m170316_064909_create_table_history extends Migration
{
    public function up()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'initiator' => $this->integer(), // user_id
            'ip' => $this->string(32),
            'event' => $this->string(255),
            'class' => $this->string(255),
            'table_name' => $this->string(64),
            'row_id' => $this->string(32),
            'log' => $this->text(),
            'created_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%history}}');
    }
}
