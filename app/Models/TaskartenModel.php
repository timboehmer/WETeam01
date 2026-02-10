<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskartenModel extends Model
{
    protected $table = 'taskarten';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['taskart', 'taskartenicon'];

    public function getTaskarten($id = null)
    {
        return $this->find($id);
    }

    public function getCreateTaskart()
    {
        return $this->insert([
            'taskart' => $_POST['taskart'],
            'taskartenicon' => $_POST['taskartenicon']
        ]);
    }

    public function getUpdateTaskart()
    {
        return $this->update($_POST['id'], [
            'taskart' => $_POST['taskart'],
            'taskartenicon' => $_POST['taskartenicon']
        ]);
    }

    public function getDeleteTaskart()
    {
        return $this->delete($_POST['id']);
    }
}