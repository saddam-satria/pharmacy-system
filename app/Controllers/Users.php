<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data = ["title" => "Users"];
        return view('users', $data);
    }
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
    public function loginAction()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
    }
}
