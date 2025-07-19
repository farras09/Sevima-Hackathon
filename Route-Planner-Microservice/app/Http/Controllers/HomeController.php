<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Halte;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //

    public function index(Request $request) {
        $data = Halte::all();
        return Inertia::render('Home/Home', ['halte'=>$data]);
    }
}
