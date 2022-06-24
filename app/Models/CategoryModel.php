<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $primaryKey       = 'category_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_name'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = ['category_name' => 'required'];
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

    public function noticeTable()
    {
        $builder = $this->db->table("categories");
        return $builder;
    }

    public function button()
    {
        $closureFun = function($row) {
            return '
                <button class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i></button>
                <button class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i></button>
            ';
        };
        return $closureFun;
    }
}