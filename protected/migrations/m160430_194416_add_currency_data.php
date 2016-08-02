<?php

class m160430_194416_add_currency_data extends CDbMigration
{
	public function up()
	{
		$this->insert('currency',
			array('name'=> 'Peso Dominicano', 'symbol'=>'$', 'alphabetical_code' => 'RD', 'active'=>1));
	}

	public function down()
	{
		echo "m160430_194416_add_currency_data does not support migration down.\n";
		return true;
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