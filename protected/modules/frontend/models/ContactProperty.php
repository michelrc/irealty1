<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class ContactProperty extends CFormModel
{
	public $name;
	public $email;
	public $message;
	public $phone;
    public $property_id;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, message, property_id', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'name'=>Yii::t('Contact_Form', 'Name'),
            'email'=>Yii::t('Contact_Form','Email'),
            'message'=>Yii::t('Contact_Form','Message'),
            'phone'=>Yii::t('Contact_Form','Phone'),
		);
	}

    public function sendMail($controller){
        $company_info = CompanyInfo::model()->find();
        $to_email = 'sales@puntacanahome.com';
        if (isset($company_info)) {
            $to_email = $company_info->email;
        }

        $property = Property::model()->findByPk($this->property_id);

        $this->message .= '<br>Id de la Propiedad: ' . $this->property_id .
            '<br>Nombre de la Propiedad: ' . $property->name_es .
            '<br>Categoría de la Propiedad: ' . $property->category0->category_name_es .
            '<br>Teléfono: ' . $this->phone;

        return $controller->sendMail($this->name, $this->email, $to_email, $this->subject, $this->message);
    }
}