<?php

namespace App\Controllers;

class Users extends BaseController
{

    public function renderLogin()
    {
        $data = ["title" => "Login"];
        return view('login', $data);
    }
    public function renderRegister()
    {
        $data = ["title" => "Register"];
        return view('register', $data);
    }
    public function renderForgotPassword()
    {
        $data = ["title" => "Forgot Password"];
        return view('forgot_password', $data);
    }
    public function loginAction()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
    }
}
