<?php

class m160128_162112_add_fields_create_time_agent_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('agent', 'create_time', 'int(11)');
	}

	public function down()
	{
		$this->dropColumn('agent', 'create_time');
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