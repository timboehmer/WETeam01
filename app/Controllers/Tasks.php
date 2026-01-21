<?php

namespace App\Controllers;

use App\Models\TasksModel;

class Tasks extends Home
{
    protected $tasksModel;

    public function __construct()
    {
        $this->TasksModel = new TasksModel();
    }

    public function getIndex()
    {
        $data['title'] = "Tasks";
        echo view('templates/header');
        echo view('templates/menu');
        $data['tasks'] = $this->TasksModel->gettasks();
        echo view('pages/tasks', $data);
        echo view('templates/footer');
    }
    public function getIndex_edit() {

        $data['title'] = "Taskdaten bearbeiten";
        $data['tasks'] = $this->TasksModel->gettasks();

        echo view( 'templates/header');
        echo view('templates/menu');
        echo view('tasks/list_edit', $data);
        echo view( 'templates/footer');

    }

    public function getCed_edit($id = 0, $todo = 0) {

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen

        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['tasks'] = $this->TasksModel->gettasks($id);

        echo view( 'templates/header');
        echo view('templates/menu');
        echo view( 'tasks/edit', $data);
        echo view( 'templates/footer');

    }

    public function postSubmit_edit() {

        // Task ändern
        if(isset($_POST['btnSpeichern'] )) {

            if($this->validation->run($_POST, 'taskbearbeiten')){
                if(isset($_POST['id']) && $_POST['id'] != '') {
                    $this->TasksModel->getUpdateTask();
                }
                else {
                    $this->TasksModel->getCreateTask();
                }
                return redirect()->to(base_url('tasks/index_edit/'));
            } else {

                $data['tasks'] = $_POST;
                $data['error'] = $this->validation->getErrors();

                $data['todo'] = (isset($_POST['id']) && $_POST['id'] != '') ? 1 : 0;

                echo view('templates/header');
                echo view('templates/menu');
                echo view('tasks/edit', $data);
                echo view('templates/footer');
            }

        }
        // Task löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->TasksModel->getDeleteTask();
            return redirect()->to(base_url('tasks/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('tasks/index_edit/'));
        }

    }

}

