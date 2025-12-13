<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends Home
{
    protected $tasksModel;

    public function __construct()
    {
        $this->tasksModel = new TasksModel();
    }

    public function getIndex()
    {
        echo view('templates/header');
        echo view('templates/menu');
        $data['tasks'] = $this->tasksModel->getData();
        echo view('tasks', $data);
        echo view('templates/footer');
    }
}