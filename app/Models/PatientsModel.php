<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'patients_data';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_patient', 'name', 'age', 'address', 'diseases', 'last_visited', 'next_visited'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        "id_patient" => "required|is_unique[patients_data.id_patient]|max_length[100]",
        "name" => "required|max_length[150]",
        "age"  => "required|numeric",
        "address" => "required|max_length[200]",
        "diseases" => "required|max_length[100]",
        "last_visited" => "required",
        "next_visited" => "required"
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
