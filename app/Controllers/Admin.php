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
    public function renderFormAddPatients()
    {
        $data = ["title" => "Add Patients"];
        return view('add_patients', $data);
    }
    public function renderFormAddMedicines()
    {
        $data = ["title" => "Add Medicines"];
        return view('add_medicines', $data);
    }
}
