<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];
    public $taskbearbeiten = [
        'tasks' => 'required|min_length[3]|max_length[255]',
        'personenid' => 'required|integer',
        'taskartenid' => 'required|integer',
        'spaltenid' => 'required|integer',
        'erinnerungsdatum' => 'valid_date[Y-m-d H:i:s]',
        'notizen' => 'max_length[1000]',
        'erinnerung' => 'in_list[0,1]',
    ];

    public $taskbearbeiten_errors = [
        'tasks' => [
            'required' => 'Bitte tragen Sie einen Tasknamen ein.',
            'min_length' => 'Der Taskname muss mindestens 3 Zeichen lang sein.',
            'max_length' => 'Der Taskname darf maximal 255 Zeichen lang sein.',
        ],
        'personenid' => [
            'required' => 'Bitte geben Sie eine PersonenID ein.',
            'integer' => 'Die PersonenID muss eine natürliche Zahl größer als Null sein.',
        ],
        'taskartenid' => [
            'required' => 'Bitte geben Sie eine TaskartenID ein.',
            'integer' => 'Die TaskartenID muss eine natürliche Zahl größer als Null sein.',
        ],
        'spaltenid' => [
            'required' => 'Bitte geben Sie eine SpaltenID ein.',
            'integer' => 'Die SpaltenID muss eine natürliche Zahl größer als Null sein.',
        ],
        'erinnerungsdatum' => [
            'valid_date' => 'Das Erinnerungsdatum muss im Format JJJJ-MM-TT HH:MM:SS vorliegen.',
        ],
        'notizen' => [
            'max_length' => 'Die Notizen dürfen maximal 1000 Zeichen lang sein.',
        ],
        'erinnerung' => [
            'in_list' => 'Die Erinnerung muss entweder 0 (Nein) oder 1 (Ja) sein.',
        ],
    ];
    public $spaltebearbeiten = [
        'spalte' => 'required|min_length[3]|max_length[255]',
        'sortid' => 'required|integer',
        'spaltenbeschreibung' => 'required|max_length[1000]',
    ];

    public $spaltebearbeiten_errors = [
        'spalte' => [
            'required' => 'Bitte tragen Sie einen Spaltennamen ein.',
            'min_length' => 'Der Spaltenname muss mindestens 3 Zeichen lang sein.',
            'max_length' => 'Der Spaltenname darf maximal 255 Zeichen lang sein.',
        ],
        'sortid' => [
            'required' => 'Bitte geben Sie eine SortID ein.',
            'integer' => 'Die SortID muss eine natürliche Zahl größer als Null sein.',
        ],
        'spaltenbeschreibung' => [
            'required' => 'Bitte tragen Sie eine Spaltenbeschreibung ein.',
            'max_length' => 'Die Spaltenbeschreibung darf maximal 1000 Zeichen lang sein.',
        ],
    ];
    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
}
