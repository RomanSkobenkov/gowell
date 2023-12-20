<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __invoke(): array
    {
        $persons = [
            [
                'id' => 1,
                'name' => 'Roman',
                'age' => 111,
                'job' => 'developer'
            ],
            [
                'id' => 2,
                'name' => 'Natasha',
                'age' => 222,
                'job' => 'junior'
            ],
            [
                'id' => 3,
                'name' => 'Artem',
                'age' => 333,
                'job' => 'penguin'
            ],
            [
                'id' => 4,
                'name' => 'Vanya',
                'age' => 444,
                'job' => 'Boss'
            ],
            [
                'id' => 5,
                'name' => 'Lera',
                'age' => 555,
                'job' => 'Crush'
            ],
        ];
        return $persons;
    }
}
