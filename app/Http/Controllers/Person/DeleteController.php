<?php

namespace App\Http\Controllers\Person;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    // не забывать про название переменной, именно $person (как в роутинге)
    public function __invoke(Person $person): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $person->delete();
        // при удалении данных надо возвращать пустой массив
        // вторым параметром можно указать статус ответа, по умолчанию - 200
        return response([]);
    }
}
