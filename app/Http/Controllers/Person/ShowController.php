<?php

namespace App\Http\Controllers\Person;

use App\Http\Resources\Person\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke(Person $person): PersonResource
    {
        return new PersonResource($person);
    }
}
