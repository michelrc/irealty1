<?php

/**
 * This is the model base class for the table "newsletter_section".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "NewsletterSection".
 * This code was improve iReevo Team
 * Columns in table "newsletter_section" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $place_holder
 *
 * @property Date2TimeBehavior $date2time
 * @property CurrencyBehavior $currency
 * @property ImageARBehavior $imageAR

 */
abstract class BaseNewsletterSection extends I18NInTableAdapter {

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
		return 'newsletter_section';
	}

	public static function label($n = 1) {
		return self::model()->t_model('NewsletterSection|NewsletterSections', $n);
	}

	public static function representingColumn() {
		return 'place_holder';
	}

    public function i18nAttributes() {
        return array(
        'place_holder', );
    }

	public function rules() {
		return array(
			array('id, place_holder', 'required'),
			array('id', 'length', 'max'=>50),
			array('place_holder', 'length', 'max'=>250),
			array('place_holder', 'i18n.validators.I18NValidator', 'validate' => 'required'),

/* descomente las lineas siguientes si quiere subir una image con ImageARBehavior*/


			array('id, place_holder', 'safe', 'on'=>'search'),
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
			'place_holder' => $this->t_label('Place holder text'),

		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('place_holder', $this->place_holder, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            		));
	}
}