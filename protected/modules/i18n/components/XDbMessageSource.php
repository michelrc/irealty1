<?php

Yii::import('system.i18n.CDbMessageSource');

class XDbMessageSource extends CDbMessageSource
{
    const CACHE_KEY_PREFIX = 'easy.XDbMessageSource.';

    /**
     * @var string  the name of the category table. Defaults to 'i18n_category'
     */
    public $messageCategoryTable = 'i18n_category';
    /**
     * @var string the name of the source message table. Defaults to 'i18n_source'.
     */
    public $sourceMessageTable = 'i18n_source';
    /**
     * @var string the name of the translated message table. Defaults to 'i18n_message'.
     */
    public $translatedMessageTable = 'i18n_message';

    private $_db;

    /**
     * Returns the DB connection used for the message source.
     * @return CDbConnection the DB connection used for the message source.
     * @since 1.1.5
     */
    public function getDbConnection()
    {
        if ($this->_db === null) {
            $this->_db = Yii::app()->getComponent($this->connectionID);
            if (!$this->_db instanceof CDbConnection)
                throw new CException(Yii::t('yii', 'CDbMessageSource.connectionID is invalid. Please make sure "{id}" refers to a valid database application component.',
                    array('{id}' => $this->connectionID)));
        }
        return $this->_db;
    }

    /**
     * Loads the messages from database.
     * You may override this method to customize the message storage in the database.
     * @param string $category the message category
     * @param string $language the target language
     * @return array the messages loaded from database
     * @since 1.1.5
     */
    protected function loadMessagesFromDb($category, $language)
    {
        $sql = <<<EOD
SELECT t1.message AS message, t2.translation AS translation
FROM {$this->sourceMessageTable} t1, {$this->translatedMessageTable} t2
WHERE t1.id=t2.id AND t1.category=:category AND t2.language=:language
EOD;
        $command = $this->getDbConnection()->createCommand($sql);
        $command->bindValue(':category', $category);
        $command->bindValue(':language', $language);
        $messages = array();
        foreach ($command->queryAll() as $row)
            $messages[$row['message']] = $row['translation'];

        return $messages;
    }
}