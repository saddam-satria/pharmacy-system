<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                "type"  => "INT",
                "auto_increment" => true,
                "null" => false,
            ],
            "name" => [
                "type" => "VARCHAR",
                "constraint" => 150,
            ],
            "email" => [
                "type" => "VARCHAR",
                "constraint" => 150,
                "unique" => true,
            ],
            "phone_number" => [
                "type" => "INT",
                "unique" => true,
            ],
            "password" => [
                "type" => "VARCHAR",
                "constraint" => 255,
            ],
            "role" => [
                "type" =>  "VARCHAR",
                "constraint" => 50,
                "default" => "user"
            ],
            "created_at" => [
                "type" => "DATETIME"
            ],
            "updated_at" => [
                "type" => "DATETIME"
            ]

        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('users_data');
    }

    public function down()
    {
        $this->forge->dropTable("users");
    }
}
