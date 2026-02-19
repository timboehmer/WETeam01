<?php

namespace App\Controllers;

use App\Models\TasksModel;
use App\Models\SpaltenModel;
use App\Models\BoardsModel;
use App\Models\TaskartenModel;

class Tasks extends Home
{
    protected $TasksModel;
    protected $TaskartenModel;
    protected $BoardsModel;
    protected $SpaltenModel;

    public function __construct()
    {
        $this->TasksModel = new TasksModel();
        $this->SpaltenModel = new SpaltenModel();
        $this->BoardsModel = new BoardsModel();
        $this->TaskartenModel = new TaskartenModel();
    }

    public function getIndex()
    {
        $boards = $this->BoardsModel->getBoards();
        $data['boards'] = $boards;

        $boardID = $this->request->getVar('boardid');


        $data['aktuelleBoardID'] = $boardID;

        $data['spalten'] = [];
        $data['tasks'] = [];
        $data['title'] = "Board auswählen";

        if (!empty($boardID)) {

            $alleSpalten = $this->SpaltenModel->getspalten();
            $gefilterteSpalten = [];

            if (!empty($alleSpalten)) {
                foreach ($alleSpalten as $spalte) {
                    if (isset($spalte['boardsid']) && $spalte['boardsid'] == $boardID) {
                        $gefilterteSpalten[] = $spalte;
                    }
                }
            }
            $data['spalten'] = $gefilterteSpalten;

            $data['tasks'] = $this->TasksModel->gettasks();

            foreach ($boards as $board) {
                if ($board['id'] == $boardID) {
                    $data['title'] = $board['board'];
                    break;
                }
            }
        }

        echo view('templates/header');
        echo view('templates/menu');

        echo view('tasks/list_edit', $data);
        echo view('templates/footer');
    }

    public function getIndex_edit()
    {
        $boards = $this->BoardsModel->getBoards();
        $data['boards'] = $boards;

        $boardID = $this->request->getVar('boardid');

        $data['aktuelleBoardID'] = $boardID;

        $data['spalten'] = [];
        $data['tasks'] = [];
        $data['title'] = "Willkommen";

        if (!empty($boardID)) {

            $alleSpalten = $this->SpaltenModel->getspalten();
            $gefilterteSpalten = [];

            if (!empty($alleSpalten)) {
                foreach ($alleSpalten as $spalte) {
                    if (isset($spalte['boardsid']) && $spalte['boardsid'] == $boardID) {
                        $gefilterteSpalten[] = $spalte;
                    }
                }
            }
            $data['spalten'] = $gefilterteSpalten;

            $data['tasks'] = $this->TasksModel->gettasks();

            foreach ($boards as $board) {
                if ($board['id'] == $boardID) {
                    $data['title'] = $board['board'];
                    break;
                }
            }
        }

        echo view('templates/header');
        echo view('templates/menu');

        echo view('tasks/list_edit', $data);
        echo view('templates/footer');
    }

    public function getCed_edit($id = 0, $todo = 0, $spaltenid = 0)
    {
        // Todo: 0 = create, 1 = Bearbeiten, 2 = löschen
        $data['todo'] = $todo;
        $data['spaltenid'] = $spaltenid;
        $data['tasks'] = [];

        $boardID = $this->request->getVar('boardid');

        if ($id > 0 && ($todo == 1 || $todo == 2)) {
            $task = $this->TasksModel->gettasks($id);
            $data['tasks'] = $task;

            if (!empty($task)) {
                $aktuelleSpalte = $this->SpaltenModel->getspalten($task['spaltenid']);
                $boardID = $aktuelleSpalte['boardsid'] ?? null;
            }

        }
        elseif ($spaltenid > 0 && empty($boardID)) {
            $aktuelleSpalte = $this->SpaltenModel->getspalten($spaltenid);
            $boardID = $aktuelleSpalte['boardsid'] ?? null;
        }

        $data['taskarten'] = $this->TaskartenModel->gettaskarten();

        if ($boardID) {
            $data['spalten'] = $this->SpaltenModel->getSpaltenByBoardId($boardID);
            $data['boardid'] = $boardID;
        }
        else {
            $data['spalten'] = [];
            $data['boardid'] = 0;
        }

        echo view('templates/header');
        echo view('templates/menu');
        echo view('tasks/edit', $data);
        echo view('templates/footer');
    }

    public function postSubmit_edit()
    {
        $redirectBoardId = $_POST['boardid'] ?? '';

        // Task ändern
        if (isset($_POST['btnSpeichern'])) {

            if ($this->validation->run($_POST, 'taskbearbeiten')) {
                if (isset($_POST['id']) && $_POST['id'] != '') {
                    $this->TasksModel->getUpdateTask();
                }
                else {
                    $this->TasksModel->getCreateTask();
                }
                return redirect()->to(base_url('tasks?boardid=' . $redirectBoardId));
            }
            else {

                $data['tasks'] = $_POST;
                $data['error'] = $this->validation->getErrors();

                $data['todo'] = (isset($_POST['id']) && $_POST['id'] != '') ? 1 : 0;

                $data['taskarten'] = $this->TaskartenModel->gettaskarten();

                $boardID = $_POST['boardid'] ?? null;
                $data['boardid'] = $boardID;

                if ($boardID) {
                    $data['spalten'] = $this->SpaltenModel->getSpaltenByBoardId($boardID);
                }
                else {
                    $data['spalten'] = [];
                }

                echo view('templates/header');
                echo view('templates/menu');
                echo view('tasks/edit', $data);
                echo view('templates/footer');
            }

        }
        // Task löschen
        elseif (isset($_POST['btnLoeschen'])) {
            $this->TasksModel->getDeleteTask();
            return redirect()->to(base_url('tasks?boardid=' . $redirectBoardId));
        }
        // Abbrechen
        elseif (isset($_POST['btnAbbrechen'])) {
            return redirect()->to(base_url('tasks?boardid=' . $redirectBoardId));
        }
    }

    public function postSubmittaskboard()
    {
        $taskIds   = $this->request->getPost('taskIds');
        $spaltenid = $this->request->getPost('spaltenid');

        if (!empty($taskIds) && is_array($taskIds)) {
            foreach ($taskIds as $position => $taskId) {
                $this->TasksModel->updateTaskPosition($taskId, $spaltenid, $position + 1);
            }
        }

        return $this->response->setJSON(['status' => 'ok']);
    }







}