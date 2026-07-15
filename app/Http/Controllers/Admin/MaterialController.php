<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index()
    {
        return view('admin.materials.index', [
            'title' => 'Materi',
        ]);
    }
}
