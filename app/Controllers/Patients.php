<?php

namespace App\Controllers;

use App\Controllers;


class Patients extends BaseController
{
    protected $rules;
    public function __construct()
    {
        $this->rules = [
            "patients-name" => "required",
            "patients-address" => "required",
            "patients-diseases" => "required",
            "last-visited" => "required",
            "next-visited" => "required"
        ];
    }

    public function addPatients()
    {
        $patients = ["name" => $this->request->getVar('patients-name'), "address" => $this->request->getVar('patients-address'), "diseases" => $this->request->getVar('patients-diseases'), "last-visited" => $this->request->getVar('last-visited'), "next-visited" => $this->request->getVar('next-visited')];

        if (!$this->validate($this->rules)) {
            echo view('add_patients', ["title" => "Add Patients", "validation" => $this->validator]);
        } else {
            dd($patients);
        }
    }
}
