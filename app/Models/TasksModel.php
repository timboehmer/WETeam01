<?php

namespace App\Models;

use CodeIgniter\Model;

class TasksModel extends Model
{
    protected $table = 'tasks';
    protected $returnType = 'array';


    public function getTasks($task_id = NULL) {
        $this->tasks = $this->db->table('tasks');
        $this->tasks->select('*');

        IF ($task_id != NULL)
            $this->tasks->where('tasks.id', $task_id);

        $this->tasks->orderBy('tasks.tasks');
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
            'erinnerung'       => isset($_POST['erinnerung']) ? 1 : 0,
            'notizen'          => $_POST['notizen']
        ));
    }

    public function getUpdateTask() {

        $this->tasks = $this->db->table('tasks');
        $this->tasks->where('tasks.id', $_POST['id']);
        $this->tasks->insert(array(
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


}