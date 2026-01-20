<?php

namespace App\Models;

use CodeIgniter\Model;

class SpaltenModel extends Model
{
    protected $table = 'spalten';
    protected $returnType = 'array';

    public function getSpalten($spalten_id = NULL) {
        $this->spalten = $this->db->table('spalten');

        $this->spalten->select('*');

        IF ($spalten_id != NULL)
            $this->spalten->where('spalten.id', $spalten_id);

        $result = $this->spalten->get();

        if ($spalten_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getCreateSpalte() {
        $this->spalten = $this->db->table('spalten');
        $boardsid = (!empty($_POST['boardsid'])) ? $_POST['boardsid'] : null;
        $this->spalten->insert(array(
            'spalte' => $_POST['spalte'],
            'sortid'     => $_POST['sortid'],
            'spaltenbeschreibung'       => $_POST['spaltenbeschreibung'],
            'boardsid'       => $boardsid,
        ));
    }

    public function getUpdateSpalte() {

        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('spalten.id', $_POST['id']);
        $boardsid = (!empty($_POST['boardsid'])) ? $_POST['boardsid'] : null;

        $this->spalten->update(array(

            'sortid'     => $_POST['sortid'],
            'spalte' => $_POST['spalte'],
            'spaltenbeschreibung'       => $_POST['spaltenbeschreibung'],
            'boardsid'       => $boardsid,
        ));
    }

    public function getDeleteSpalte() {
        $this->spalten = $this->db->table('spalten');
        $this->spalten->where('spalten.id', $_POST['id']);
        $this->spalten->delete();
    }


}