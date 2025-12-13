<?php

namespace App\Controllers;

class Spalten extends Home
{
    public function getIndex()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('spalten');
        echo view('templates/footer');
    }

    public function getCreatespalten()
    {
        echo view('templates/header');
        echo view('templates/menu');
        echo view('create-spalten');
        echo view('templates/footer');
    }
}