<?php

namespace App\Controllers;

use App\Controllers;
use App\Models\PatientsModel;

class Patients extends BaseController
{
    protected $rules;
    protected $PatientsModel;
    public function __construct()
    {
        $this->rules = [
            "patients-name" => ["rules" => "required", "errors" => ["required" => "please, fill name"]],
            "patients-age" => ["rules" => "required|numeric", "errors" => ["required" => "please, fill age", "numeric" => "age must be number"]],
            "patients-address" => ["rules" => "required", "errors" => ["required" => "please, fill address"]],
            "patients-diseases" => ["rules" => "required", "errors" => ["required" => "please, fill diseases"]],
            "last-visited" => ["rules" => "required", "errors" => ["required" => "please, fill last visited"]],
            "next-visited" => ["rules" => "required", "errors" => ["required" => "please, fill next visited"]]
        ];
        $this->PatientsModel = new PatientsModel();
    }

    public function addPatients()
    {
        helper("form");
        if ($this->validate($this->rules)) {
            if ($this->request->getPost()) {
                $patients = ["id_patient" => uniqid("patients-"), "name" => $this->request->getVar('patients-name'), "age" => $this->request->getVar('patients-age'), "address" => $this->request->getVar('patients-address'), "diseases" => $this->request->getVar('patients-diseases'), "last_visited" => $this->request->getVar('last-visited'), "next_visited" => $this->request->getVar('next-visited')];
                // add to db

                $result = $this->PatientsModel->insert($patients);
                if ($result) {
                    return redirect()->to(base_url('/add-patients'))->with("success", "success create a new patient");
                } else {
                    return redirect()->to(base_url('/add-patients'))->with("error", "somethings wrong");
                }
                // return view('add_patients', ["title" => "Add Patients", "validation" => $this->validator]);
            } else {
                return redirect()->to(base_url('/add-patients'));
            }
        } else {
            return view('add_patients', ["title" => "Add Patients", "validation" => $this->validator]);
        }
    }
    public function removePatients(string $id)
    {
        if (!empty($id)) {
            // Running
            $result = $this->PatientsModel->delete(array("id" => $id));
            if ($result) {
                return redirect()->to(base_url('/patients'))->with('success', "success remove patient");
            }
            return redirect()->to(base_url('/patient'))->with('error', "error remove patient");
        } else {
            return redirect()->to(base_url('/patients'));
        }
    }
    public function updatePatients(string $id)
    {
        helper('form');
        if (!empty($id) && $this->request->getPost()) {
            if ($this->validate($this->rules)) {
                $updatePatients = ["name" => $this->request->getVar('patients-name'), "age" => $this->request->getVar('patients-age'), "address" => $this->request->getVar('patients-address'), "diseases" => $this->request->getVar('patients-diseases'), "last_visited" => $this->request->getVar('last-visited'), "next_visited" => $this->request->getVar('next-visited')];
                $result = $this->PatientsModel->update(array("id" => $id), $updatePatients);
                if (!$result) {
                    return redirect()->to(base_url('update-patients/' . $id))->with("error", "somethings wrong");
                }
                return redirect()->to(base_url('update-patients/' . $id))->with('success', 'success update patients');
            } else {
                $patients = $this->PatientsModel->find(array('id' => $id));
                return view('update_patients', ["title" => "Update Patients", "validation" => $this->validator, "patients" => $patients]);
            }
            // $result = $this->PatientsModel->set($id, $updatePatients);

        }
    }
}
