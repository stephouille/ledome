<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    // var $captcha = ''; //intializing captcha var

	public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Votre email est requis'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Un mot de passe est requis'
            )
        ),
        're_password' => array(
            'required' => array(
                'rule' => array('equalToField', 'password'),
                'message' => 'Les mots de passe ne correspondent pas'
            )
        ),
        // 'captcha'=>array(
        //     'rule' => array('matchCaptcha')
        // )  
    );

    // function matchCaptcha($inputValue)  {
    //     return $inputValue == $this->getCaptcha(); //return true or false after comparing submitted value with set value of captcha
    // }

    // function setCaptcha($value) {
    //     $this->captcha = $value; //setting captcha value
    // }

    // function getCaptcha()   {
    //     return $this->captcha; //getting captcha value
    // }

    public function beforeSave($options = array()) { //cryptage password
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    function equalToField($array, $field) {
        return strcmp($this->data[$this->alias][key($array)], $this->data[$this->alias][$field]) == 0;
    }
}
