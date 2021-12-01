<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicinesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'medicines_data';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["medicine_id", "medicine_name", "medicine_stock", "medicine_expiry", "medicine_purpose", "medicine_factory", "created_at", "updated_at"];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "medicine_id" => "required|string|max_length[100]",
        "medicine_name" => "required|string|max_length[150]",
        "medicine_stock" => "required|numeric",
        "medicine_expiry" => "required|date",
        "medicine_purpose" => "required|string|max_length[150]",
        "medicine_factory" => "required|string|max_length[150]",
        "created_at" => "required|date",
        "updated_at" => "permit_empty|date"
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
