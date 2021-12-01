<?php

namespace App\Controllers;

class Medicines extends BaseController
{
    protected $rules;
    public function __construct()
    {
        $this->rules = [
            "medicine-name" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine name"]],
            "medicine-stock" => ["rules" => "required|numeric", "errors" => ["required" => "Please, fill medicine stock", "numeric" => "medicine stock must be number"]],
            "medicine-expiry" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine expiry"]],
            "medicine-purpose" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine purpose"]],
            "medicine-factory" => ["rules" => "required", "errors" => ["required" => "Please, fill medicine factory"]],
        ];
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
            $medicines = array("");
        } else {
            return redirect()->to(base_url('add-medicines'));
        }
    }
}
