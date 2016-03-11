<?php

class m160127_012824_add_testimonials_field extends CDbMigration
{
	public function up()
	{
		$this->addColumn('testimonials', 'active', 'tinyint(1) NULL DEFAULT 1');
	}

	public function down()
	{
		$this->dropColumn('testimonials', 'active');
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