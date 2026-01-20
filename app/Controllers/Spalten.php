<?php

namespace App\Controllers;

use App\Models\SpaltenModel;

class Spalten extends Home
{
    protected $spaltenModel;

    public function __construct()
    {
        $this->SpaltenModel = new SpaltenModel();
    }

    public function getIndex()
    {
        $data['title'] = "Spalten";
        echo view('templates/header');
        echo view('templates/menu');
        $data['spalten'] = $this->SpaltenModel->getspalten();
        echo view('spalten/list_edit', $data);
        echo view('templates/footer');
    }
    public function getIndex_edit() {

        $data['title'] = "Spaltendaten bearbeiten";
        $data['spalten'] = $this->SpaltenModel->getspalten();

        echo view( 'templates/header');
        echo view('templates/menu');
        echo view('spalten/list_edit', $data);
        echo view( 'templates/footer');

    }

    public function getCed_edit($id = 0, $todo = 0) {

        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        // Person bearbeiten oder löschen

        if($id > 0 && ($todo == 1 || $todo == 2 ))
            $data['spalten'] = $this->SpaltenModel->getspalten($id);

        echo view( 'templates/header');
        echo view('templates/menu');
        echo view( 'spalten/edit', $data);
        echo view( 'templates/footer');

    }

    public function postSubmit_edit() {

        // Task ändern
        if(isset($_POST['btnSpeichern'] )) {

            if($this->validation->run($_POST, 'spaltebearbeiten')){
                if(isset($_POST['id']) && $_POST['id'] != '') {
                    $this->SpaltenModel->getUpdateSpalte();
                }
                else {
                    $this->SpaltenModel->getCreateSpalte();
                }
                return redirect()->to(base_url('spalten/index_edit/'));
            } else {

                $data['spalten'] = $_POST;
                $data['error'] = $this->validation->getErrors();

                $data['todo'] = (isset($_POST['id']) && $_POST['id'] != '') ? 1 : 0;

                echo view('templates/header');
                echo view('templates/menu');
                echo view('spalten/edit', $data);
                echo view('templates/footer');
            }



        }
        // Task löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->SpaltenModel->getDeleteSpalte();
            return redirect()->to(base_url('spalten/index_edit/'));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('spalten/index_edit/'));
        }

    }

}

