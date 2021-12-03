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
        if (!$this->request->getPost()) return redirect()->to(base_url('add-medicines'));
        if (!$this->validate($this->rules)) return view('add_medicines', array("title" => "New Medicines", "validation" => $this->validator));


        $medicines = ["id_medicine" => uniqid("medicine-"), "medicine_name" => $this->request->getVar('medicine-name'), "medicine_stock" => $this->request->getVar('medicine-stock'), "medicine_expiry" => $this->request->getVar('medicine-expiry'), "medicine_purpose" => $this->request->getVar('medicine-purpose'), "medicine_factory" => $this->request->getVar('medicine-factory'), "created_at" => $this->request->getVar('created-at')];
        $result = $this->MedicinesModel->insert($medicines);
        if (!$result) return redirect()->to(base_url('add-medicines'))->with('error', "<script>Swal.fire(
            'somethings wrong ',
            '',
            'error'
        )
        </script>");

        return  redirect()->to(base_url('add-medicines'))->with("success", "<script>Swal.fire(
            'success create new medicine ',
            '',
            'success'
        )
        </script>");
    }
    public function deleteMedicines(string $id)
    {
        if (empty($id)) return redirect()->to(base_url('medicines'));
        $result = $this->MedicinesModel->delete($id);
        if (!$result) return redirect()->to(base_url('medicines'))->with('error', "<script>Swal.fire(
            'somethings wrong ',
            '',
            'error'
        )
        </script>");

        return redirect()->to(base_url('medicines'))->with('success', "<script>Swal.fire(
            'success remove medicine ',
            '',
            'success'
        )
        </script>");
    }

    public function updateMedicines(string $id)
    {
        if (empty($id) && !$this->request->getPost()) return redirect()->to(base_url('medicines'));
        if (!$this->validate($this->rules)) return view('update_medicines', array('title' => "Update Medicines", "validation" => $this->validator, "medicines" => $this->MedicinesModel->find(["id" => $id])));

        $medicines = ["medicine_name" => $this->request->getVar('medicine-name'), "medicine_stock" => $this->request->getVar('medicine-stock'), "medicine_expiry" => $this->request->getVar('medicine-expiry'), "medicine_purpose" => $this->request->getVar('medicine-purpose'), "medicine_factory" => $this->request->getVar('medicine-factory'), "updated_at" => $this->request->getVar('updated-at')];

        $result = $this->MedicinesModel->update(["id" => $id], $medicines);
        if (!$result) return redirect()->to(base_url('update-medicines/' . $id))->with("error", "<script>Swal.fire(
            'somethings wrong ',
            '',
            'error'
        )
        </script>");

        return redirect()->to(base_url('update-medicines/' . $id))->with('success', "<script>Swal.fire(
            'success update medicine ',
            '',
            'success'
        )
        </script>");
    }
}
