<?php

namespace App\Http\Controllers\Admin;

use App\Models\Retur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReturController extends Controller
{
    public function index()
    {
        $retur = Retur::all();
        return view('admin.retur.index', compact('retur'));
    }

    public function terima($id)
    {
        $retur = Retur::find($id);
        $retur->status = 'accepted';
        $retur->save();
        return redirect()->route('admin.retur');
    }

    public function tolak($id)
    {
        $retur = Retur::find($id);
        $retur->status = 'denied';
        $retur->save();
        return redirect()->route('admin.retur');
    }
}
