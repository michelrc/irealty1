<?php

class m150327_112718_2015_03_27_cascade_property_category extends CDbMigration
{
	public function up()
	{
        $this->execute('
            ALTER TABLE `property` DROP FOREIGN KEY `property_category_1` ,
            ADD FOREIGN KEY ( `category` ) REFERENCES `property_category` (
            `id`
            ) ON DELETE CASCADE ON UPDATE CASCADE ;
        ');
	}

	public function down()
	{
		echo "m150327_112718_2015_03_27_cascade_property_category does not support migration down.\n";
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