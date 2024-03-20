<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Models\User;

class RaceController extends Controller
{
    public function getRaces() {
        $races = Race::with('editions.details')->orderByDesc('created_at')->get();
    
        return view('races', [
            'heading' => 'Races Page',
            'races' => $races,
            'users' => User::all()
        ]);
    }    
}
