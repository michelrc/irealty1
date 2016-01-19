<?php

/**
 * This is the model base class for the table "property_type".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PropertyType".
 * This code was improve iReevo Team
 * Columns in table "property_type" available as properties of the model,
 * followed by relations of table "property_type" available as properties of the model.
 *
 * @property string $id
 * @property string $type
 *
 * @property Property[] $properties
 * @property Date2TimeBehavior $date2time
 * @property CurrencyBehavior $currency
 * @property ImageARBehavior $imageAR

 */
abstract class BasePropertyType extends I18NInTableAdapter {
// many to many relationship
            public $Property;
    
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
		return 'property_type';
	}

	public static function label($n = 1) {
		return self::model()->t_model('PropertyType|PropertyTypes', $n);
	}

	public static function representingColumn() {
		return 'type';
	}

    public function i18nAttributes() {
        return array(
        'type', );
    }

	public function rules() {
		return array(
			array('id', 'required'),
			array('id', 'length', 'max'=>50),
			array('type', 'length', 'max'=>250),
			array('type', 'default', 'setOnEmpty' => true, 'value' => null),
			array('type', 'i18n.validators.I18NValidator', 'validate' => 'required'),

/* descomente las lineas siguientes si quiere subir una image con ImageARBehavior*/


			array('id, type', 'safe', 'on'=>'search'),
            array('Property', 'safe'),
		);
	}

	public function relations() {
		return array(
			'properties' => array(self::HAS_MANY, 'Property', 'type'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => $this->t_label('ID'),
			'type' => $this->t_label('Type'),
			
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('type', $this->type, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            		));
	}
}