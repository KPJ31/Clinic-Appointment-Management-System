<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index() {
        $specializations = Specialization::all();
        return view('specializations.index', compact('specializations'));
    }

    public function create() {
        return view('specializations.create');
    }
}
