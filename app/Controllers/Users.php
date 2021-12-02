<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $rules;
    protected $UsersModel;

    public function __construct()
    {
        $this->rules = [
            "name" => ["rules" => "required", "errors" => ["required" => "Please, fill name"]],
            "email" => ["rules" => "required|valid_email|is_unique[users_data.email]", "errors" => ["is_unique" => "Email already exist", "required" => "Please, fill email", "valid_email" => "email must be valid"]],
            "phone" => ["rules" => "required|numeric|is_unique[users_data.phone_number]", "errors" => ["is_unique" => "Phone number already exist ", "required" => "Please, fill phone number", "numeric" => "phone number must be number"]],
            "password" => ["rules" => "required|min_length[8]|max_length[26]|regex_match[/^([A-Z]{1})([\d\D\w\W]+)$/]", "errors" => ["required" => "Please, fill passwrd", "min_length" => "password minimal 8 characters", "max_length" => "password maximum 26 characters", "regex_match" => "the first word must capital"]],
            "confirm-password" => ["rules" => "required|matches[password]", "errors" => ["required" => "Please, fill confirm password", "matches" => "confirm password doesn't same with password"]],
        ];
        $this->UsersModel = new UsersModel();
    }

    public function renderLogin()
    {
        helper('form');
        $data = ["title" => "Login"];
        return view('login', $data);
    }
    public function renderRegister()
    {
        helper('form');
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
        helper('form');
        $data = array("title" => "Login", "validation" => $this->validator);
        if (!$this->request->getPost()) return redirect()->to(base_url('login'));
        if (!$this->validate($this->rules)) return view("login", array("title" => "Login", "validation" => $this->validator));
        $userInput = array("email" => $this->request->getVar('email'), "password" => $this->request->getVar('password'));
        $user = $this->UsersModel->where('email', $userInput['email'])->first();

        if (empty($user)) return redirect()->to('login')->with('error_email', "Email Not Found");

        $result = password_verify($userInput['password'], $user['password']);
        if (!$result) return redirect()->to('login')->with('error_password', "Wrong password");
        return redirect()->to('login')->with('success', "Success");
    }
    public function registerAction()
    {
        helper('form');
        if ($this->request->getPost()) {
            date_default_timezone_set("Asia/Jakarta");
            if (!$this->validate($this->rules)) return view("register", array("title" => "register", "validation" => $this->validator));
            $hashPassword  =    password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
            $user =  array("name" => $this->request->getVar('name'), "email" => $this->request->getVar('email'), "phone_number" => $this->request->getVar('phone'), "password" => $hashPassword, "created_at" => date("Y-m-d H:i:s"));
            $result = $this->UsersModel->insert($user);


            // bug cannot show feedback
            if (!$result) return redirect()->to(base_url('register'))->with("error", "somethings wrong");

            return redirect()->to(base_url('register'))->with('success', 'success update patients');
        }
        return redirect()->to(base_url('/register'));
    }
    public function deleteUsers(string $id)
    {
        if (empty($id)) return redirect()->to(base_url('users'));


        $result = $this->UsersModel->delete(array('id' => $id));
        if (!$result) return redirect()->to(base_url('users'))->with('error', "somethings wrong");

        return redirect()->to(base_url('users'))->with("success", "success remove user");
    }
}
