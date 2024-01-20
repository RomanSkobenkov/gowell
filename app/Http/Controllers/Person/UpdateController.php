<?php

namespace App\Http\Controllers\Person;

use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    // не забывать про название переменной, именно $person (как в роутинге)
    public function __invoke(UpdateRequest $request, Person $person): bool
    {
        return $person->update($request->validated());
    }
}
