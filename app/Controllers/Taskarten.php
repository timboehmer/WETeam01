<?php

namespace App\Controllers;

use App\Models\TaskartenModel;

class Taskarten extends Home
{
    protected $TaskartenModel;

    public function __construct()
    {
        $this->TaskartenModel = new TaskartenModel();
    }

    public function getIndex()
    {
        $data['title'] = "Taskarten";

        // Daten aus dem Model laden
        $data['taskarten'] = $this->TaskartenModel->getTaskarten();

        echo view('templates/header');
        echo view('templates/menu');
        echo view('taskarten/list_edit', $data);
        echo view('templates/footer');
    }

    public function getIndex_edit() {

        $data['title'] = "Taskarten";

        $data['taskarten'] = $this->TaskartenModel->getTaskarten();

        echo view('templates/header');
        echo view('templates/menu');
        echo view('taskarten/list_edit', $data);
        echo view('templates/footer');

    }

    public function getCed_edit($id = 0, $todo = 0) {

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;

        if($id > 0 && ($todo == 1 || $todo == 2 )) {
            $data['taskarten'] = $this->TaskartenModel->getTaskarten($id);
        }

        echo view('templates/header');
        echo view('templates/menu');
        echo view('taskarten/edit', $data);
        echo view('templates/footer');

    }

    public function postSubmit_edit() {

        if(isset($_POST['btnSpeichern'] )) {

            if($this->validation->run($_POST, 'taskartbearbeiten')){

                if(isset($_POST['id']) && $_POST['id'] != '') {
                    $this->TaskartenModel->getUpdateTaskart();
                }
                else {
                    $this->TaskartenModel->getCreateTaskart();
                }
                return redirect()->to(base_url('taskarten/index_edit/'));

            } else {

                $data['taskarten'] = $_POST;
                $data['error'] = $this->validation->getErrors();

                $data['todo'] = (isset($_POST['id']) && $_POST['id'] != '') ? 1 : 0;

                echo view('templates/header');
                echo view('templates/menu');
                echo view('taskarten/edit', $data);
                echo view('templates/footer');
            }

        }
        elseif (isset($_POST['btnLoeschen'])) {
            $this->TaskartenModel->getDeleteTaskart();
            return redirect()->to(base_url('taskarten/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('taskarten/index_edit/'));
        }

    }
}