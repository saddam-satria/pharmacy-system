<?php

namespace App\Controllers;

class Patients extends BaseController
{
    public function index()
    {

        $data = ["title" => "Patients"];
        return view('patient', $data);
    }
}
