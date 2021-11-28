<?php

namespace App\Controllers;

use App\Controllers;


class Patients extends BaseController
{
    protected  $rules;
    public function __construct()
    {
        $this->rules = [
            "patients-name" => ["rules" => "required", "errors" => ["required" => "please, fill name"]],
            "patients-address" => ["rules" => "required", "errors" => ["required" => "please, fill address"]],
            "patients-diseases" => ["rules" => "required", "errors" => ["required" => "please, fill diseases"]],
            "last-visited" => ["rules" => "required", "errors" => ["required" => "please, fill last visited"]],
            "next-visited" => ["rules" => "required", "errors" => ["required" => "please, fill next visited"]]
        ];
    }

    public function addPatients()
    {
        if ($this->validate($this->rules)) {
            if ($this->request->getPost()) {
                $patients = ["name" => $this->request->getVar('patients-name'), "address" => $this->request->getVar('patients-address'), "diseases" => $this->request->getVar('patients-diseases'), "last-visited" => $this->request->getVar('last-visited'), "next-visited" => $this->request->getVar('next-visited')];

                // add to db
                return view('add_patients', ["title" => "Add Patients", "success" => $this->validator]);
            } else {
                return redirect()->back();
            }
        } else {
            return view('add_patients', ["title" => "Add Patients", "validation" => $this->validator]);
        }
    }
}
