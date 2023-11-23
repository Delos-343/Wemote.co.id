<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reseller;
use Illuminate\Support\Facades\Cache;

class ResellerController extends Controller
{
    public function index()
    {
        $minutes = 60;
        
        $resellers = Cache::remember('resellers_all', $minutes, function () {
            return Reseller::all();
        });

        return view('resellers.index', compact('resellers'));
    }

    public function show($id)
    {
        $minutes = 30;

        $reseller = Cache::remember('reseller_' . $id, $minutes, function () use ($id) {
            return Reseller::findOrFail($id);
        });

        return view('resellers.show', compact('reseller'));
    }
}
