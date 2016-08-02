<?php

class m160502_011243_user_management_operation extends CDbMigration
{
	public function up()
	{
		$this->insert('authitem',
			array('name'=> 'User Management', 'type'=>0, 'description' => 'User Management'));
	}

	public function down()
	{
		echo "m160502_011243_user_management_operation does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}