<?php

namespace App\Controllers;

class Spalten extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('spalten');
        echo view('templates/footer');
    }
}
