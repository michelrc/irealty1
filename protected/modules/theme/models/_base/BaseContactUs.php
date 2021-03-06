<?php

/**
 * This is the model base class for the table "contact_us".
 * It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ContactUs".
 * This code was improve iReevo Team
 * Columns in table "contact_us" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $banner_image
 * @property string $title
 * @property string $description
 * @property string $place_holder_name
 * @property string $place_holder_phone
 * @property string $place_holder_email
 * @property string $place_holder_subject
 * @property string $place_holder_message
 * @property string $agents_title
 * @property string $address_title
 *
 * @property Date2TimeBehavior $date2time
 * @property CurrencyBehavior $currency
 * @property ImageARBehavior $imageAR

 */
abstract class BaseContactUs extends I18NInTableAdapter {

/* si tiene una imagen pa subir con ImageARBehavior, descomente la linea siguiente
// public $recipeImg;

    /**
    * Behaviors.
    * @return array
    */
    public $recipeImg1;
    public $recipeImg2;
    function behaviors() {
        return CMap::mergeArray(parent::behaviors(), array(
                

                                '_banner_image' => array(
                    'class' => 'ImageARBehavior',
                    'attribute' => 'recipeImg1', // this must exist
                    'extension' => 'jpg,gif,png', // possible extensions, comma separated
                    'prefix' => 'img1_',
                    'relativeWebRootFolder' => '/images/ContactUs',
                    'formats' => array(
                    // create a thumbnail for used in the view datails
                    'thumb' => array(
                    'suffix' => '_thumb',
                    'process' => array('resize' => array(50, 50)),
                    ),
                    'normal' => array(
                    'suffix' => '_normal',

                                        'process' => array('resize' => array(1263,289, 1)),
                                        ),
                    // and override the default :
                    ),

                    'defaultName' => 'default', // when no file is associated, this one is used
                            // defaultName need to exist in the relativeWebRootFolder path, and prefixed by prefix,
                            // and with one of the possible extensions. if multiple formats are used, a default file must exist
                            // for each format. Name is constructed like this :
                            //     {prefix}{name of the default file}{suffix}{one of the extension}
                ),
                '_banner_image_mobile' => array(
                                'class' => 'ImageARBehavior',
                                'attribute' => 'recipeImg2', // this must exist
                                'extension' => 'jpg,gif,png', // possible extensions, comma separated
                                'prefix' => 'img2_',
                                'relativeWebRootFolder' => '/images/ContactUs',
                                'formats' => array(
                                // create a thumbnail for used in the view datails
                                'thumb' => array(
                                'suffix' => '_thumb',
                                'process' => array('resize' => array(50, 50)),
                                ),
                                'normal' => array(
                                'suffix' => '_normal',

                                                    'process' => array('resize' => array(450,289, 1)),
                                                    ),
                                // and override the default :
                                ),

                                'defaultName' => 'default', // when no file is associated, this one is used
                                        // defaultName need to exist in the relativeWebRootFolder path, and prefixed by prefix,
                                        // and with one of the possible extensions. if multiple formats are used, a default file must exist
                                        // for each format. Name is constructed like this :
                                        //     {prefix}{name of the default file}{suffix}{one of the extension}
                            ),
                

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
		return 'contact_us';
	}

	public static function label($n = 1) {
		return self::model()->t_model('ContactUs|ContactUses', $n);
	}

	public static function representingColumn() {
		return 'agents_title';
	}

    public function i18nAttributes() {
        return array(
        'title', 'description', 'place_holder_name', 'place_holder_phone', 'place_holder_email', 'place_holder_subject', 'place_holder_message', 'agents_title', 'address_title', );
    }

	public function rules() {
		return array(
			array('id, agents_title, address_title', 'required'),
			array('id', 'length', 'max'=>50),
			array('banner_image, agents_title, address_title', 'length', 'max'=>255),
			array('title, place_holder_name, place_holder_phone, place_holder_email, place_holder_subject, place_holder_message', 'length', 'max'=>250),
			array('description', 'safe'),
			array('banner_image, title, description, place_holder_name, place_holder_phone, place_holder_email, place_holder_subject, place_holder_message', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title, description, place_holder_name, place_holder_phone, place_holder_email, place_holder_subject, place_holder_message, agents_title, address_title', 'i18n.validators.I18NValidator', 'validate' => 'required'),

/* descomente las lineas siguientes si quiere subir una image con ImageARBehavior*/
    array('recipeImg1', 'file', 'on'=>'insert', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png,JPG,GIF,JPEG,PNG', 'maxSize'=>1024*1024*6),
array('recipeImg1', 'file', 'on'=>'update', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png,JPG,GIF,JPEG,PNG', 'maxSize'=>1024*1024*6),
array('recipeImg1', 'safe'),
            array('recipeImg2', 'file', 'on'=>'insert', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png,JPG,GIF,JPEG,PNG', 'maxSize'=>1024*1024*6),
array('recipeImg2', 'file', 'on'=>'update', 'allowEmpty'=>true, 'types'=>'jpg,jpeg,gif,png,JPG,GIF,JPEG,PNG', 'maxSize'=>1024*1024*6),
array('recipeImg2', 'safe'),


			array('id, banner_image, title, description, place_holder_name, place_holder_phone, place_holder_email, place_holder_subject, place_holder_message, agents_title, address_title', 'safe', 'on'=>'search'),
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
			'banner_image' => $this->t_label('Map image Alt'),
			'title' => $this->t_label('Title'),
			'description' => $this->t_label('Description'),
			'place_holder_name' => $this->t_label('Place holder name'),
			'place_holder_phone' => $this->t_label('Place holder phone'),
			'place_holder_email' => $this->t_label('Place holder email'),
			'place_holder_subject' => $this->t_label('Place holder subject'),
			'place_holder_message' => $this->t_label('Place holder message'),
			'agents_title' => $this->t_label('Agents title section'),
			'address_title' => $this->t_label('Address title section'),
    'recipeImg1' => $this->t_label('Map image PC'),
    'recipeImg2' => $this->t_label('Map image Mobile'),

		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('banner_image', $this->banner_image, true);
		$criteria->compare('title', $this->title, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('place_holder_name', $this->place_holder_name, true);
		$criteria->compare('place_holder_phone', $this->place_holder_phone, true);
		$criteria->compare('place_holder_email', $this->place_holder_email, true);
		$criteria->compare('place_holder_subject', $this->place_holder_subject, true);
		$criteria->compare('place_holder_message', $this->place_holder_message, true);
		$criteria->compare('agents_title', $this->agents_title, true);
		$criteria->compare('address_title', $this->address_title, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
            		));
	}
}