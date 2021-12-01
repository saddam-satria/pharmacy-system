<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Medicines extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                "type"  => "INT",
                "auto_increment" => true,
                "null" => false,
            ],
            "id_medicine" => [
                "type"  => "VARCHAR",
                "null" => false,
                "unique" => true,
                "constraint" => 100,
            ],
            "medicine_name"  => [
                "type"  => "VARCHAR",
                "constraint" => 150,
                "null" => false,
            ],
            "medicine_stock" => [
                "type"  => "INT",
                "null" => false,
            ],
            "medicine_expiry" => [
                "type" => "DATE",
                "null" => false,
            ],
            "medicine_purpose" => [
                "type" => "VARCHAR",
                "constraint" => 150,
                "null" => false,
            ],
            "medicine_factory" => [
                "type" => "VARCHAR",
                "constraint" => 150,
                "null" => false,
            ],
            "created_at" => [
                "type" => "DATETIME",
                "null" => false
            ],
            "updated_at" => [
                "type" => "DATETIME",
                "null" => true
            ]

        ]);

        $this->forge->addKey("id", true);
        $this->forge->createTable("medicines_data",  true);
    }

    public function down()
    {
        $this->forge->dropTable('medicines_data');
    }
}
