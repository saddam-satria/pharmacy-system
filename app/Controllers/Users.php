<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{
    protected $rules;
    protected $UsersModel;
    protected $session;
    public function __construct()
    {
        $this->rules = [
            "name" => ["rules" => "required", "errors" => ["required" => "Please, fill name"]],
            "email" => ["rules" => "required|valid_email|is_unique[users_data.email]", "errors" => ["is_unique" => "Email already exist", "required" => "Please, fill email", "valid_email" => "email must be valid"]],
            "phone" => ["rules" => "required|numeric|is_unique[users_data.phone_number]", "errors" => ["is_unique" => "Phone number already exist ", "required" => "Please, fill phone number", "numeric" => "phone number must be number"]],
            "password" => ["rules" => "required|min_length[8]|max_length[26]|regex_match[/^([A-Z]{1})([\d\D\w\W]+)$/]", "errors" => ["required" => "Please, fill password", "min_length" => "password minimal 8 characters", "max_length" => "password maximum 26 characters", "regex_match" => "the first word must capital"]],
            "confirm-password" => ["rules" => "required|matches[password]", "errors" => ["required" => "Please, fill confirm password", "matches" => "confirm password doesn't same with password"]],
        ];
        $this->UsersModel = new UsersModel();
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function renderUserPage()
    {
        return view('user_page', array('title' => "User Page"));
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
        if (!$this->validate(array("email" => "required", "password" => "required"))) return redirect()->to(base_url('login'))->with("error", "<script>Swal.fire(
            'form cannot be empty',
            'Try again',
            'error'
        )
        </script>");

        if (!$this->request->getPost()) return redirect()->to(base_url('login'));
        $userInput = array("email" => $this->request->getVar('email'), "password" => $this->request->getVar('password'));
        $user = $this->UsersModel->where('email', $userInput['email'])->first();

        if (empty($user)) return redirect()->to(base_url('login'))->with('error', "<script>Swal.fire(
            'email not found ',
            'Try Again',
            'error'
        )
        </script>");


        $result = password_verify($userInput['password'], $user['password']);

        if (!$result) return redirect()->to(base_url('login'))->with('error', "<script>Swal.fire(
            'wrong password ',
            'Try again',
            'error'
        )
        </script>");


        $this->session->set("user_data", array('id' => $user['id'], "email" => $user['email'], "role" => $user['role']));
        if ($user['role'] == "admin") {
            return redirect()->to(base_url('dashboard'));
        } elseif ($user['role'] == 'user') {
            return redirect()->to(base_url('user-page'));
        }
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

            if (!$result) return redirect()->to(base_url('register'))->with("error", "<script>Swal.fire(
                'somethings wrong ',
                '',
                'error'
            )
            </script>");

            return redirect()->to(base_url('register'))->with('success', "<script>Swal.fire(
                'register success ',
                '',
                'success'
            )
            </script>");
        }
        return redirect()->to(base_url('/register'));
    }
    public function deleteUsers(string $id)
    {
        if (empty($id)) return redirect()->to(base_url('users'));

        $result = $this->UsersModel->delete(array('id' => $id));
        if (!$result) return redirect()->to(base_url('users'))->with('error', "<script>Swal.fire(
            'error remove user ',
            '',
            'error'
        )
        </script>");

        return redirect()->to(base_url('users'))->with("success", "<script>Swal.fire(
            'success remove user ',
            '',
            'success'
        )
        </script>");
    }
    public function logout()
    {
        if (empty($this->session->get('user_data'))) return redirect()->to(base_url('login'))->with('error', "<script>Swal.fire(
            'Login First ',
            '',
            'error'
        )
        </script>");

        $this->session->remove('user_data');

        return redirect()->to(base_url('login'))->with('error', "<script>Swal.fire(
            'Logout success ',
            '',
            'success'
        )
        </script>");
    }
    public function showProfile(string $id)
    {
        helper('form');
        if (empty($this->session->get('user_data'))) return redirect()->to(base_url('login'))->with('error', "<script>Swal.fire(
            'Login First ',
            '',
            'error'
        )
        </script>");
        $user = $this->UsersModel->find(array('id' => $id));
        if (!$user) return redirect()->to(base_url('users'))->with('error', "<script>Swal.fire(
            'user not found ',
            '',
            'error'
        )
        </script>");

        return view('show_profile', array('title' => "Show Profile", "user" => $user[0]));
    }
    public function updateProfile(string $id)
    {
        helper('form');
        if (empty($this->session->get('user_data'))) return redirect()->to(base_url('login'))->with('error', "<script>Swal.fire(
            'Login First ',
            '',
            'error'
        )
        </script>");
        $user = $this->UsersModel->find(array('id' => $id));
        if (!$user) return redirect()->to(base_url('users'))->with('error', "<script>Swal.fire(
                'user not found ',
                '',
                'error'
            )
            </script>");

        return view('update_profile', array('title' => "Update Profile", "user" => $user[0]));
    }

    public function updateProfileAction(string $id)
    {


        if (empty($this->session->get('user_data'))) return redirect()->to(base_url('login'))->with('error', "<script>Swal.fire(
            'Login First ',
            '',
            'error'
        )
        </script>");

        $user = $this->UsersModel->find(array('id' => $id));

        if (empty($id) && !$this->request->getPost()) return redirect()->to(base_url('user-page/update-profile/' . $user['id']));

        if (!$this->validate($this->rules)) return view('update_profile', array('title' => "Update Profile", "user" => $user[0], "validation" => $this->validator));


        // Bug Issues

        $hashPassword = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);
        $newUser =  array("name" => $this->request->getVar('name'), "email" => $this->request->getVar('email'), "phone_number" => $this->request->getVar('phone'), "password" => $hashPassword, "updated_at" => date("Y-m-d H:i:s"));

        $result =  $this->UsersModel->update(array("id" => $id), $newUser);

        if (!$result) return redirect()->to(base_url('user-page/update-profile/' . $user['id']))->with("error", "<script>Swal.fire(
            'somethings wrong',
            '',
            'error'
        )
        </script>");

        return redirect()->to(base_url('user-page/update-profile/' . $user['id']))->with("error", "<script>Swal.fire(
            'success update profile',
            '',
            'success'
        )
        </script>");
    }
}
