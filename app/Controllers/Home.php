<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('startseite');
        echo view('templates/footer');
    }

    public function spalten()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('spalten');
        echo view('templates/footer');
    }

    public function createspalten()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('create-spalten');
        echo view('templates/footer');
    }

    public function tasks()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('tasks');
        echo view('templates/footer');
    }

    public function boards()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('boards');
        echo view('templates/footer');
    }
}
