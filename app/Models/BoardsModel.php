<?php

namespace App\Models;

use CodeIgniter\Model;

class BoardsModel extends Model
{

    protected $table = 'boards';
    protected $returnType = 'array';

    public function getBoards($board_id = NULL) {
        $this->boards = $this->db->table('boards');

        $this->boards->select('*');

        if ($board_id != NULL)
            $this->boards->where('boards.id', $board_id);

        $this->boards->orderBy('boards.board', 'ASC');

        $result = $this->boards->get();

        if ($board_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getCreateBoard() {
        $this->boards = $this->db->table('boards');

        $this->boards->insert(array(
            'board' => $_POST['board']
        ));
    }

    public function getUpdateBoard() {
        $this->boards = $this->db->table('boards');
        $this->boards->where('boards.id', $_POST['id']);

        $this->boards->update(array(
            'board' => $_POST['board']
        ));
    }

    public function getDeleteBoard() {
        $this->boards = $this->db->table('boards');
        $this->boards->where('boards.id', $_POST['id']);
        $this->boards->delete();
    }
}