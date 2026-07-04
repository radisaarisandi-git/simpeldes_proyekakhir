<?php

namespace App\Http\Controllers;

use App\Models\Kependudukan;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    public function index(){
        //ambil data
        $datas = Kependudukan::with('user')->get();
        return view('admin.kependudukan', compact('datas'));
    }
}
