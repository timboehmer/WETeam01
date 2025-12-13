<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'personen';
    protected $returnType = 'array';
    public function getData()
    {
        return $this->findAll();
    }
}