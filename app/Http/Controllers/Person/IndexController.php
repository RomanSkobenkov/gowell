<?php

namespace App\Http\Controllers\Person;

use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(): \Illuminate\Database\Eloquent\Collection
    {
        return Person::all();
    }
}
