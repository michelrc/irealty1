<?php

class m150608_150616_2015_06_08_listing_img extends CDbMigration
{
	public function up()
	{
        $this->execute("
          ALTER TABLE `property` ADD `listing_image` VARCHAR(255) null;
        ");
	}

	public function down()
	{
		echo "m150608_150616_2015_06_08_listing_img does not support migration down.\n";
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