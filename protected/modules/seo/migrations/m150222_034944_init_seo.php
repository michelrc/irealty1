<?php

class m150222_034944_init_seo extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('seo_model', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'url' => 'varchar(255) NULL DEFAULT NULL',
            'title' => 'varchar(255) NULL DEFAULT NULL',
            'description' => 'text NULL',
            'keywords' => 'varchar(255) NULL DEFAULT NULL',
            'modelClassName' => 'varchar(255) NOT NULL',
            'PRIMARY KEY (`id`)',
        ), 'ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci');

        $this->createTable('seo_model_meta', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'name' => 'varchar(255) NOT NULL',
            'content' => 'text NOT NULL',
            'seo_model_id' => 'int(11) NOT NULL',
            'PRIMARY KEY (`id`)',
        ), 'ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci');

        $this->addForeignKey('seo_model_id_fk1', 'seo_model_meta', 'seo_model_id', 'seo_model', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('seo_model_id_idx1', 'seo_model_meta', 'seo_model_id');

        $this->createTable('seo_url_rule', array(
            "`id` int(11) NOT NULL AUTO_INCREMENT",
            "`route` varchar(1023) DEFAULT NULL",
            "`caseSensitive` tinyint(1) NOT NULL",
            "`str_params` text",
            "`urlSuffix` varchar(255) DEFAULT NULL",
            "`defaultParams` text",
            "`matchValue` tinyint(1) NOT NULL",
            "`verb` varchar(255) DEFAULT NULL",
            "`parsingOnly` tinyint(1) NOT NULL",
            "`references` text",
            "`routePattern` varchar(1023) DEFAULT NULL",
            "`template` varchar(1023) DEFAULT NULL",
            "`append` tinyint(1) NOT NULL",
            "`hasHostInfo` tinyint(1) NOT NULL",
            "`order` int(11) DEFAULT NULL COMMENT '@order'",
            'modelClassName' => 'varchar(255) NULL',
            'primaryKeyParam' => 'varchar(255) NULL',
            'PRIMARY KEY (`id`)',
        ), 'ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci');
    }

    public function safeDown()
    {
        $this->dropForeignKey('seo_model_id_fk1', 'seo_model_meta');
        $this->dropTable('seo_model_meta');
        $this->dropTable('seo_model');
        $this->dropTable('seo_url_rule');
    }
}