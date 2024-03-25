<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Race;
use App\Models\User;

class RaceController extends Controller
{
    public function getRaces()
    {
        $races = Race::with('editions.details')->orderByDesc('created_at')->get();

        return view('races.races', [
            'heading' => 'Races Page',
            'races' => $races,
            'users' => User::all()
        ]);
    }

    public function getSpecificRace($name)
    {
        $race = Race::with('editions.details')
            ->where('name', $name)
            ->firstOrFail();

        // dd($race);

        return view('races.race_specific', [
            'heading' => 'Specific Race Page',
            'race' => $race,
            'users' => User::all()
        ]);
    }

    public function joinRace($race_id, $user)
    {
        dd($race_id, $user);
    }
}
