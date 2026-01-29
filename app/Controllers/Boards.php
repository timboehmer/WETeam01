<?php

namespace App\Controllers;

use App\Models\BoardsModel;

class Boards extends Home
{
    protected $BoardsModel;

    public function __construct()
    {
        $this->BoardsModel = new BoardsModel();
    }

    public function getIndex()
    {
        $data['title'] = "Boards";

        $data['boards'] = $this->BoardsModel->getboards();

        echo view('templates/header');
        echo view('templates/menu');

        echo view('boards/list_edit', $data);
        echo view('templates/footer');
    }
    public function getIndex_edit() {

        $data['title'] = "Boards";

        $data['boards'] = $this->BoardsModel->getboards();

        echo view('templates/header');
        echo view('templates/menu');
        echo view('boards/list_edit', $data);
        echo view('templates/footer');

    }

    public function getCed_edit($id = 0, $todo = 0, $spaltenid = 0) {

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen

        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['boards'] = $this->BoardsModel->getboards($id);

        echo view( 'templates/header');
        echo view('templates/menu');
        echo view( 'boards/edit', $data);
        echo view( 'templates/footer');

    }

    public function postSubmit_edit() {

        if(isset($_POST['btnSpeichern'] )) {

            if($this->validation->run($_POST, 'boardbearbeiten')){
                if(isset($_POST['id']) && $_POST['id'] != '') {
                    $this->BoardsModel->getUpdateBoard();
                }
                else {
                    $this->BoardsModel->getCreateBoard();
                }
                return redirect()->to(base_url('boards/index_edit/'));
            } else {

                $data['boards'] = $_POST;
                $data['error'] = $this->validation->getErrors();

                $data['todo'] = (isset($_POST['id']) && $_POST['id'] != '') ? 1 : 0;

                echo view('templates/header');
                echo view('templates/menu');
                echo view('boards/edit', $data);
                echo view('templates/footer');
            }

        }
        elseif (isset($_POST['btnLoeschen'])) {
            $this->BoardsModel->getDeleteBoard();
            return redirect()->to(base_url('boards/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('boards/index_edit/'));
        }

    }

}

