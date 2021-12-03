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
        if (!$this->validate($this->rules)) return view('add_patients', ["title" => "Add Patients", "validation" => $this->validator]);

        if (!$this->request->getPost()) return redirect()->to(base_url('/add-patients'));

        $patients = ["id_patient" => uniqid("patients-"), "name" => $this->request->getVar('patients-name'), "age" => $this->request->getVar('patients-age'), "address" => $this->request->getVar('patients-address'), "diseases" => $this->request->getVar('patients-diseases'), "last_visited" => $this->request->getVar('last-visited'), "next_visited" => $this->request->getVar('next-visited')];

        $result = $this->PatientsModel->insert($patients);
        if (!$result) return redirect()->to(base_url('/add-patients'))->with("error", "<script>Swal.fire(
            'somethings wrong ',
            '',
            'error'
        )
        </script>");

        return redirect()->to(base_url('/add-patients'))->with("success", "<script>Swal.fire(
            'success create new patient ',
            '',
            'success'
        )
        </script>");
    }
    public function removePatients(string $id)
    {
        if (empty($id)) return redirect()->to(base_url('/patients'));

        // Running
        $result = $this->PatientsModel->delete(array("id" => $id));
        if (!$result) return redirect()->to(base_url('/patient'))->with('error', "<script>Swal.fire(
                'somethings wrong ',
                '',
                'error'
            )
            </script>");
        return redirect()->to(base_url('/patients'))->with('success', "<script>Swal.fire(
                'success remove patient ',
                '',
                'success'
            )
            </script>");
    }
    public function updatePatients(string $id)
    {
        helper('form');

        if (empty($id) && !$this->request->getPost()) return redirect()->to(base_url('patients'));
        if (!$this->validate($this->rules)) return view('update_patients', ["title" => "Update Patients", "validation" => $this->validator, "patients" => $this->PatientsModel->find(array('id' => $id))]);

        $updatePatients = ["name" => $this->request->getVar('patients-name'), "age" => $this->request->getVar('patients-age'), "address" => $this->request->getVar('patients-address'), "diseases" => $this->request->getVar('patients-diseases'), "last_visited" => $this->request->getVar('last-visited'), "next_visited" => $this->request->getVar('next-visited')];
        $result = $this->PatientsModel->update(array("id" => $id), $updatePatients);
        if (!$result) return redirect()->to(base_url('update-patients/' . $id))->with("error", "<script>Swal.fire(
            'somethings wrong',
            '',
            'error'
        )
        </script>");

        return redirect()->to(base_url('update-patients/' . $id))->with('success', "<script>Swal.fire(
            'success update patient ',
            '',
            'success'
        )
        </script>");
    }
}
