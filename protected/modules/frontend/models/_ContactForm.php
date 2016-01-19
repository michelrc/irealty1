<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class _ContactForm extends CFormModel
{
	public $name;
	public $email;
	public $subject;
	public $message;
	public $phone;
    public $reason;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, subject, message, reason', 'required'),
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
            'subject'=>Yii::t('Contact_Form','Subject'),
            'message'=>Yii::t('Contact_Form','Message'),
            'phone'=>Yii::t('Contact_Form','Phone'),
		);
	}

    public function sendMail($controller){
        $company_info = CompanyInfo::model()->find();
        $to_email = 'sales@puntacanahome.com';
        $company_name = Yii::app()->name;

        if (isset($company_info)) {
            $to_email = $company_info->email;
            $company_name = $company_info->company_name;
        }

        $subject = $company_name;
        $message = $this->message . '<br> ' . 'Nombre: ' . $this->name .
            '<br> ' . 'Teléfono: ' . $this->phone;

        $criteria = new CDbCriteria();
        $criteria->compare('id', $this->reason);
        $reason_query = ContactUsReason::model()->find($criteria);
        $message .= '<br> Motivo del contacto: ' . $reason_query->title;

        return $controller->sendMail($this->name, $this->email, $to_email, $subject, $message);
    }
}