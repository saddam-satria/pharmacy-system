<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;

class Admin extends BaseController
{
    public function index()
    {
        $medicines = $this->MedicinesModel->findAll();
        $patients = $this->PatientsModel->findAll();
        $users = $this->UsersModel->findAll();
        $data = ["title" => "Admin", "sumPatients" => count($patients), "sumMedicines" => count($medicines), "sumUsers" => count($users)];
        return view('admin', $data);
    }
    public function renderUsers()
    {
        $users = $this->UsersModel->findAll();
        $data = ["title" => "Users", "users" => $users];
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
    public function renderFormUpdateMedicines(string $id)
    {
        helper('form');
        if (!empty($id)) {
            $medicines = $this->MedicinesModel->find(array("id" => $id));
            if (count($medicines) < 1) {
                return redirect()->to(base_url('medicines'));
            }
            $data = ['title' => "Update Medicines", "medicines" => $medicines];
            return view('update_medicines', $data);
        }
    }
    public function genereteReport(string $type)
    {
        $fileName = date('Y-m-d') . "-report-" . $type;
        $dompdf = new Dompdf();


        $datas = [];
        if ($type == "patients") {
            $patients = $this->PatientsModel->findAll();
            $datas['patients'] = array($patients);
        } elseif ($type == "medicines") {
            $medicines = $this->MedicinesModel->findAll();
            $datas['medicines'] = array($medicines);
        } elseif ($type == "users") {
            $users = $this->UsersModel->findAll();
            $datas['users'] = array($users);
        }


        $html = view('generate_pdf', array("title" => $fileName, "datas" => $datas[$type][0], "type" => $type));
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream($fileName);
    }
}
