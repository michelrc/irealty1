<?php

class m160430_184025_create_table_currency extends CDbMigration
{
	public function up()
	{
		$this->createTable('currency', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'symbol' => 'string NOT NULL',
			'alphabetical_code' => 'string NOT NULL',
			'active' => 'tinyint Default 0'
		));
	}

	public function down()
	{
		$this->dropTable('currency');
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