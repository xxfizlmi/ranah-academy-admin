<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function index()
    {
        return view('admin.certificates.index', [
            'title' => 'Sertifikat',
        ]);
    }
}
