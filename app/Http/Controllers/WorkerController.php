<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        phpinfo();
        die();
        return 'indexAction';
    }
    public function show()
    {
        return 'showAction';
    }


}
