<?php

class m150327_112548_2015_03_27_cascade_article extends CDbMigration
{
	public function up()
	{
        $this->execute('
            ALTER TABLE `article` DROP FOREIGN KEY `article_ibfk_1` ,
            ADD FOREIGN KEY ( `category` ) REFERENCES `article_category` (
            `id`
            ) ON DELETE CASCADE ON UPDATE CASCADE ;
        ');
	}

	public function down()
	{
		echo "m150327_112548_2015_03_27_cascade_article does not support migration down.\n";
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