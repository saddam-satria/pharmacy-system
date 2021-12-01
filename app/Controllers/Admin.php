<?php

namespace App\Controllers;

use \App\Models\PatientsModel;


class Admin extends BaseController
{
    public function index()
    {
        $medicines = $this->MedicinesModel->findAll();
        $patients = $this->PatientsModel->findAll();
        $data = ["title" => "Admin", "sumPatients" => count($patients), "sumMedicines" => count($medicines)];
        return view('admin', $data);
    }
    public function renderUsers()
    {
        $data = ["title" => "Users"];
        return view('users', $data);
    }
    public function renderMedicines()
    {
        $medicines = $this->MedicinesModel->findAll();
        $data = ["title" => "Medicines", "medicines" => $medicines];
        return view('medicines', $data);
    }
    public function renderPatients()
    {
        $patients = $this->PatientsModel->findAll();
        // dd($patients);
        $data = ["title" => "Patients", "patients" => $patients];
        return view('patients', $data);
    }
    public function renderFormAddPatients()
    {
        helper('form');
        $data = ["title" => "New Patients"];
        return view('add_patients', $data);
    }
    public function renderFormAddMedicines()
    {
        helper('form');
        $data = ["title" => "New Medicines"];
        return view('add_medicines', $data);
    }
    public function renderFormUpdatePatients(string $id)
    {
        helper('form');
        if (!empty($id)) {
            $patients = $this->PatientsModel->find(array('id' => $id));
            if (count($patients) < 1) {
                return redirect()->to(base_url('/patients'));
            } else {
                $data = ['title' => "Update Patients", "patients" => $patients];
                return view('update_patients', $data);
            }
        }
    }
}
