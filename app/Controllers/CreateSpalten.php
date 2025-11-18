<?php

namespace App\Controllers;

class CreateSpalten extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('create-spalten');
        echo view('templates/footer');
    }
}
