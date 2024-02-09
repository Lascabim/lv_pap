<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RaceController extends Controller
{
    public function getRaces(Request $request)
    {
        $races = Race::orderBy('date', 'desc')->get();

        if ($races->isNotEmpty()) {
            return response()->json(['errors' => null, 'message' => 'Races Retrieved', 'races' => $races], 200);
        } else {
            return response()->json(['errors' => true, 'message' => 'There are no races', 'races' => []], 200);
        }
    }

    public function createRace(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['success' => false, 'errors' => [['user' => 'Utilizador não encontrado']]], 404);
        }

        $fValidator = Validator::make($request->all(), [
            'title' => 'required|string|min:10',
            'description' => 'required|string|min:25',
        ]);

        if ($fValidator->fails()) {
            return response()->json(['success' => false, 'errors' => $fValidator->errors()->toArray()], 400);
        }

        $raceAc = $request->input('has_accessibility');

        if ($raceAc !== 'true' && $raceAc !== 'false') {
            return response()->json(['success' => false, 'errors' => ['has_accessibility' => ['O campo de acessibilidade é obrigatório']]], 404);
        }

        $sValidator = Validator::make($request->all(), [
            'date' => 'required|date_format:Y-m-d',
            'minimum_condition' => 'required|in:iniciante,experiente,avançado',
            'startTime' => 'required|date_format:H:i:s',
            'endTime' => 'nullable|date_format:H:i:s|after:startTime',
        ]);

        $qValidator = Validator::make($request->all(), [
            'district' => [
                'required',
                Rule::in([
                    'aveiro', 'beja', 'braga', 'bragança', 'castelo_branco', 'coimbra',
                    'evora', 'faro', 'guarda', 'leiria', 'lisboa', 'portalegre', 'porto',
                    'santarem', 'setubal', 'viana_do_castelo', 'vila_real', 'viseu'
                ]),
            ],
        ]);

        if ($qValidator->fails()) {
            return response()->json(['success' => false, 'errors' => $qValidator->errors()->toArray()], 400);
        }

        $raceUniqueName = uniqid('race_');

        if ($request->file('image') !==  null) {
            $image = $request->file('image');
            $filename = 'race_image_' . $raceUniqueName . "." . $image->getClientOriginalExtension();
            $storagePath = 'images/races/';

            if (!file_exists(public_path($storagePath))) {
                mkdir(public_path($storagePath), 0755, true);
            }

            $image->move(public_path($storagePath), $filename);
            $finalPath = $storagePath . $filename;

            $end_time = $request->input('endTime') !== null ? $request->input('endTime') : null;

            $race = new Race([
                'name' => $raceUniqueName,
                'image_path' => $finalPath,
                'district' => $request->input('district'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'minimum_condition' => $request->input('minimum_condition'),
                'start_time' => $request->input('startTime'),
                'end_time' => $end_time,
                'date' => $request->input('date'),
                'has_accessibility' => $request->input('has_accessibility') === 'true',
            ]);

            $race->save();

            return response()->json(['success' => true, 'errors' => null, 'message' => 'Corrida criada com sucesso'], 200);
        } else {
            $end_time = $request->input('endTime') !== null ? $request->input('endTime') : null;

            $race = new Race([
                'name' => $raceUniqueName,
                'district' => $request->input('district'),
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'minimum_condition' => $request->input('minimum_condition'),
                'start_time' => $request->input('startTime'),
                'end_time' => $end_time,
                'date' => $request->input('date'),
                'has_accessibility' => $request->input('has_accessibility') === 'true',
            ]);

            $race->save();

            $race->save();

            return response()->json(['success' => true, 'errors' => null, 'message' => 'Corrida criada com sucesso'], 200);
        }
    }
}
