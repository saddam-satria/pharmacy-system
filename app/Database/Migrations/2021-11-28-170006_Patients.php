<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Patients extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                "type"  => "INT",
                "auto_increment" => true,
                "null" => false,
            ],
            "id_patient" => [
                "type" => "VARCHAR",
                "null" => false,
                "unique" => true,
                "constraint" => 100,
                "auto_increment" => false,
            ],
            "name" => [
                "type" => "VARCHAR",
                "null" => false,
                "constraint" => 150,

            ],
            "age" => [
                "type" => "INT",
                "null" => false,
            ],
            "address" => [
                "type" => "VARCHAR",
                "null" => false,
                "constraint" => 200,
            ],
            "diseases" => [
                "type" => "VARCHAR",
                "null" => false,
                "constraint" => 100
            ],
            "last_visited" => [
                "type" => "DATE",
                "null" => false,

            ],
            "next_visited" => [
                "type" => "DATE",
                "null" => false,

            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('patients_data', true);
    }

    public function down()
    {
        $this->forge->dropTable('patients_data');
    }
}
