<?php

namespace App\Http\Controllers\Person;

use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        // возврат созданной персоны здесь для дальнейших возможных действий
        return Person::create($request->validated());
    }
}
