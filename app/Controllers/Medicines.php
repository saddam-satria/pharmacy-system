<?php

namespace App\Controllers;

use \App\Models\MedicinesModel;

class Medicines extends BaseController
{
    protected $rules;
    protected $MedicinesModel;
    public function __construct()
    {
        $this->rules = [
            "medicine-name" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine name"]],
            "medicine-stock" => ["rules" => "required|numeric", "errors" => ["required" => "Please, fill medicine stock", "numeric" => "medicine stock must be number"]],
            "medicine-expiry" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine expiry"]],
            "medicine-purpose" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine purpose"]],
            "medicine-factory" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine factory"]],
        ];
        $this->MedicinesModel = new MedicinesModel();
    }
    public function addMedicines()
    {
        helper('form');
        if ($this->request->getPost()) {
            if (!$this->validate($this->rules)) {
                $data = ["title" => "New Medicines", "validation" => $this->validator];
                return view('add_medicines', $data);
            }

            // add to db
            $medicines = ["medicine_id" => uniqid("medicine-"), "medicine_name" => $this->request->getVar('medicine-name'), "medicine_stock" => $this->request->getVar('medicine-stock'), "medicine_expiry" => $this->request->getVar('medicine-expiry'), "medicine_purpose" => $this->request->getVar('medicine-purpose'), "medicine_factory" => $this->request->getVar('medicine-factory'), "created_at" => $this->request->getVar('created-at')];
            $result = $this->MedicinesModel->insert($medicines);
            if ($result) {
                return  redirect()->to(base_url('add-medicines'))->with("success", "success create new medicine");
            } else {
                return redirect()->to(base_url('add-medicines'))->with('error', "somethings wrong");
            }
        } else {
            return redirect()->to(base_url('add-medicines'));
        }
    }
    public function getMedicine()
    {
    }
}
