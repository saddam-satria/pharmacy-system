<?php

namespace App\Controllers;

class Medicines extends BaseController
{
    public function index()
    {

        $data = ["title" => "Medicines"];
        return view('medicines', $data);
    }
}
