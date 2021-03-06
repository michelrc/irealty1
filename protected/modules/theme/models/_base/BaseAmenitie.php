<?php

/**
 * This is the model base class for the table "amenitie".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Amenitie".
 * This code was improve iReevo Team
 * Columns in table "amenitie" available as properties of the model,
 * followed by relations of table "amenitie" available as properties of the model.
 *
 * @property string $id
 * @property string $title
 *
 * @property PropertyAmenitie[] $propertyAmenities
 * @property Date2TimeBehavior $date2time
 * @property CurrencyBehavior $currency
 * @property ImageARBehavior $imageAR

 */
abstract class BaseAmenitie extends I18NInTableAdapter {
// many to many relationship
            public $PropertyAmenitie;
    
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
		return 'amenitie';
	}

	public static function label($n = 1) {
		return self::model()->t_model('Amenitie|Amenities', $n);
	}

	public static function representingColumn() {
		return 'title';
	}

    public function i18nAttributes() {
        return array(
        'title', );
    }

	public function rules() {
		return array(
			array('id, title', 'required'),
			array('id', 'length', 'max'=>50),
			array('title', 'length', 'max'=>255),
			array('title', 'i18n.validators.I18NValidator', 'validate' => 'required'),

/* descomente las lineas siguientes si quiere subir una image con ImageARBehavior*/


			array('id, title', 'safe', 'on'=>'search'),
            array('PropertyAmenitie', 'safe'),
		);
	}

	public function relations() {
		return array(
			'propertyAmenities' => array(self::HAS_MANY, 'PropertyAmenitie', 'amenitie_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => $this->t_label('ID'),
			'title' => $this->t_label('Title'),
			
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('title', $this->title, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            		));
	}
}