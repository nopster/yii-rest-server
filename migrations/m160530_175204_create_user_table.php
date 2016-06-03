<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation for table `users_table`.
 */
class m160530_175204_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
			'username' => $this->string(20)->notNull(),
			'email' => $this->string(255),
			'password' => $this->string(30),
			'display_name' => $this->string(70),
			'status' => $this->integer()->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
