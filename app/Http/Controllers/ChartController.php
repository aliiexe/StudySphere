<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChartController extends Controller
{

    public function showChart()
{
    $maleCount = User::where('genre', 'Male')->count();
    $femaleCount = User::where('genre', 'female')->count();

    // Vérifiez les valeurs
    // dd($maleCount, $femaleCount);

    return view('chart', compact('maleCount', 'femaleCount'));
}

public function getUsersRegistrationData()
    {
        $userData = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->get();

        return response()->json($userData);
    }
}
