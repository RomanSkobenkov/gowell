<?php

namespace App\Http\Controllers\Person;

use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    // не забывать про название переменной, именно $person (как в роутинге)
    public function __invoke(UpdateRequest $request, Person $person): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        $person->update($request->validated());
        return response([]);
    }
}
