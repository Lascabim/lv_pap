<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Models\User;

class RaceController extends Controller
{
    public function getRaces() {
        $races = Race::all()->sortByDesc("date");
    
        return view('races', [
            'heading' => 'Races Page',
            'races' => Race::all()->sortByDesc("date"),
            'users' => User::all()
        ]);
    }
}
