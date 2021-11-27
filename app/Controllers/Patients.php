<?php

namespace App\Controllers;

class Patients extends BaseController
{
    public function index()
    {

        $data = ["title" => "Patients", "datas" => [

            "nama" => ["saddam", "saddam", "saddam"],
            "kelas" => "12.1A.05",
            "country" => "indonesia"

        ]];
        return view('patient', $data);
    }
}
