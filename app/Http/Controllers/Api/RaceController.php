<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function getRaces(Request $request) {
        $races = Race::orderBy('date', 'desc')->get();
        
        if ($races->isNotEmpty()) {
            return response()->json(['errors' => null, 'message' => 'Races Retrieved', 'races' => $races], 200);
        } else {
            return response()->json(['errors' => true, 'message' => 'There are no races', 'races' => []], 200);
        }
    }
}
