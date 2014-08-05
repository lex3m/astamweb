<?php

/**
 * OrderForm class.
 */
class OrderForm extends CFormModel
{
	public $name;
	public $email;
    public $phone;
    public $message;
    public $file;
    public $type;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, phone', 'required'),
			// email has to be a valid email address
			array('email', 'email', 'message'=>'Пожалуйста, введите правильный e-mail адрес.'),
            array('phone', 'match', 'pattern'=>'/^(\(\d{3}\)\s*)*\d{3}(-{0,1}|\s{0,1})\d{2}(-{0,1}|\s{0,1})\d{2}$/'),
            array('file', 'file',
                'allowEmpty' => true,
                'types'=> 'doc, docx, pdf, odt, xls, xlsx, csv, rtf, txt',
                'maxSize' => 1024 * 1024 * 10, // 10MB
                'tooLarge' => 'Размер файла превышает 10MB. Пожалуйста, загрузите файл меньшего размера.',
            ),
		);
	}

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'message' => 'Сообщение',
            'file' => 'Документ',
        );
    }
}