<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'tasks';
    protected $returnType = 'array';


    public function getTasks($task_id = NULL) {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->select('tasks.*, 
        taskarten.taskartenicon, 
        personen.vorname, 
        personen.name, 
        CONCAT(LEFT(personen.vorname, 1), LEFT(personen.name, 1)) as kuerzel');

        $this->tasks->join('personen', 'tasks.personenid = personen.id', 'left');
        $this->tasks->join('taskarten', 'tasks.taskartenid = taskarten.id');

        IF ($task_id != NULL)
            $this->tasks->where('tasks.id', $task_id);

        $this->tasks->orderBy('tasks.sortid', 'ASC');
        $result = $this->tasks->get();

        if ($task_id != NULL)
            return $result->getRowArray();
        else
            return $result->getResultArray();
    }

    public function getCreateTask() {
        $this->tasks = $this->db->table('tasks');

        $this->tasks->insert(array(
            'tasks'            => $_POST['tasks'],
            'taskartenid'      => $_POST['taskartenid'],
            'personenid'       => $_POST['personenid'],
            'spaltenid'        => $_POST['spaltenid'],
            'erstelldatum'     => date('Y-m-d'),
            'erinnerungsdatum' => $_POST['erinnerungsdatum'],
            'erinnerung'       => $_POST['erinnerung'],
            'notizen'          => $_POST['notizen']
        ));
    }

    public function getUpdateTask() {

        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $_POST['id']);
        $this->tasks->update(array(
            'personenid'       => $_POST['personenid'],
            'taskartenid'      => $_POST['taskartenid'],
            'spaltenid'        => $_POST['spaltenid'],
            'tasks'            => $_POST['tasks'],
            'erinnerungsdatum' => $_POST['erinnerungsdatum'],
            'erinnerung'       => $_POST['erinnerung'],
            'notizen'          => $_POST['notizen'],
        ));
    }

    public function getDeleteTask() {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $_POST['id']);
        $this->tasks->delete();
    }

    public function updateTaskPosition($task_id, $spaltenid, $sortid)
    {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $task_id);
        $this->tasks->update(array(
            'spaltenid' => $spaltenid,
            'sortid'    => $sortid
        ));
    }



}