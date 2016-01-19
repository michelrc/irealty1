<?php

/**
 * This is the model base class for the table "social_networks".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SocialNetworks".
 * This code was improve iReevo Team
 * Columns in table "social_networks" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $google_plus_link
 * @property string $instagram_link
 *
 * @property Date2TimeBehavior $date2time
 * @property CurrencyBehavior $currency
 * @property ImageARBehavior $imageAR

 */
abstract class BaseSocialNetworks extends I18NInTableAdapter {

/* si tiene una imagen pa subir con ImageARBehavior, descomente la linea siguiente
// public $recipeImg;

    /**
    * Behaviors.
    * @return array
    */
    function behaviors() {
        return CMap::mergeArray(parent::behaviors(), array(
                

                

                                'files' => array(
                     'class'=>'application.modules.ycm.behaviors.FileBehavior',
                ),
                'date2time' => array(
                    'class' => 'ycm.behaviors.Date2TimeBehavior',
                    'attributes'=>'',
                    'format'=>'Y-m-d',
                ),
                'datetime2time' => array(
                    'class' => 'ycm.behaviors.Date2TimeBehavior',
                    'attributes'=>'',
                    'format'=>'Y-m-d H:i:s',
                ),
                'currency' => array(
                    'class' => 'ycm.behaviors.CurrencyBehavior',
                    'attributes'=>'',
                ),
                            ));
    }


	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'social_networks';
	}

	public static function label($n = 1) {
		return self::model()->t_model('SocialNetworks|SocialNetworks', $n);
	}

	public static function representingColumn() {
		return 'id';
	}

    public function i18nAttributes() {
        return array(
        );
    }

	public function rules() {
		return array(
			array('id', 'required'),
			array('id', 'length', 'max'=>50),
			array('facebook_link, twitter_link, google_plus_link, instagram_link', 'length', 'max'=>255),
			array('facebook_link, twitter_link, google_plus_link, instagram_link', 'default', 'setOnEmpty' => true, 'value' => null),

/* descomente las lineas siguientes si quiere subir una image con ImageARBehavior*/


			array('id, facebook_link, twitter_link, google_plus_link, instagram_link', 'safe', 'on'=>'search'),
        		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => $this->t_label('ID'),
			'facebook_link' => $this->t_label('Facebook link'),
			'twitter_link' => $this->t_label('Twitter link'),
			'google_plus_link' => $this->t_label('Google plus link'),
			'instagram_link' => $this->t_label('Flickr link'),

		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('facebook_link', $this->facebook_link, true);
		$criteria->compare('twitter_link', $this->twitter_link, true);
		$criteria->compare('google_plus_link', $this->google_plus_link, true);
		$criteria->compare('instagram_link', $this->instagram_link, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            		));
	}
}