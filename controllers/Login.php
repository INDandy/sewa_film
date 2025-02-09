<?php

include_once('models/LoginModel.php');

class LoginController
{
    private $model;

    public function __construct()
    {
        $this->model = new LoginModel();
    }

    public function login_validation($email, $nohp, $sandi)
    {
        return $this->model->login_validation($email, $nohp, $sandi);
    }

    public function addUsers($nama,$email,$nohp,$sandi)
    {
        return $this->model->addUsers($nama,$email,$nohp,$sandi);
    }

}
