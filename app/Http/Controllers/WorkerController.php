<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();

        return view('worker.index', compact('workers'));
    }

    public function show(Worker $worker)
    {
        return view('worker.show', compact('worker'));
    }

    public function create()
    {
        $worker = [
            'name' => 'Mark',
            'surname' => 'Markov',
            'email' => 'markov@mail.ru',
            'age' => 20,
            'description' => 'This is Mark',
            'is_married' => false,
        ];

        Worker::create($worker);

        return 'Mark was created';
    }

    public function update()
    {
        $worker = Worker::find(2);

        $worker->name = 'Carl2';
        $worker->surname = 'Petrov2';
        $worker->save();

        return 'Worker was updated';
    }

    public function delete()
    {
        $worker = Worker::find(2);

        $worker->delete();

        return 'Worker was deleted';
    }


}
