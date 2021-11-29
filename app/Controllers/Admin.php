<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $sumPatients = $this->db->query("SELECT * FROM `patients_data`")->getNumRows();
        $data = ["title" => "Admin", "sumPatients" => $sumPatients];
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
        $patients = $this->db->query("SELECT * FROM `patients_data`")->getResult();
        $data = ["title" => "Patients", "patients" => $patients];
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
