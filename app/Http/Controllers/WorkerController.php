<?php

namespace App\Http\Controllers;

use App\Http\Requests\Worker\StoreRequest;
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
        return view('worker.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        // дополнительная обработка чекбокса
        $data['is_married'] = isset($data['is_married']);
        
        // можем так сделать, потому что ключи нашего массива совпадают с ключами таблицы
        Worker::create($data);

        return redirect()->route('worker.index');
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
