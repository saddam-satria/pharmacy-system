<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = ["title" => "Admin"];
        return view('admin', $data);
    }
    public function renderUsers()
    {
        $data = ["title" => "Users"];
        return view('users', $data);
    }
    public function renderMedicines()
    {
        $data = ["title" => "Medicines"];
        return view('medicines', $data);
    }
    public function renderPatients()
    {
        $data = ["title" => "Patients"];
        return view('patients', $data);
    }
}
