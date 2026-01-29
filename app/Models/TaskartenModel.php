<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskartenModel extends Model
{
    protected $table = 'taskarten';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    public function getTaskarten() {
        return $this->findAll();
    }
}