<?php

class m160128_145809_add_fields_agent_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('agent', 'active', 'tinyint(1) NULL DEFAULT 1');
		$this->addColumn('agent', 'best_agent', 'tinyint(1) NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('agent', 'active');
		$this->dropColumn('agent', 'best_agent');
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