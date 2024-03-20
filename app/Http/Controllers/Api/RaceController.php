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
        $races = Race::join('race_editions', 'races.id', '=', 'race_editions.race_id')
                     ->join('race_details', 'races.id', '=', 'race_details.race_id')
                     ->orderBy('date', 'desc')
                     ->get(['races.*', 'race_editions.edition', 'race_editions.district', 'race_details.type', 'race_details.minimum_condition', 'race_details.start_time', 'race_details.end_time', 'race_details.date', 'race_details.has_accessibility']);
    
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
            'titulo' => 'required|string|min:10',
            'descricao' => 'required|string|min:25',
        ]);

        if ($fValidator->fails()) {
            return response()->json(['success' => false, 'errors' => $fValidator->errors()->toArray()], 400);
        }

        $raceAc = $request->input('tem_acessibilidade');

        if ($raceAc !== 'true' && $raceAc !== 'false') {
            return response()->json(['success' => false, 'errors' => ['tem_acessibilidade' => ['O campo de acessibilidade é obrigatório']]], 404);
        }

        $sValidator = Validator::make($request->all(), [
            'data' => 'required|date_format:Y-m-d',
            'condicao_minima' => 'required|in:beginner,experienced,advanced',
            'hora_partida' => 'required|date_format:H:i:s',
            'hora_chegada' => 'required|date_format:H:i:s|after:hora_partida',
        ]);

        if ($sValidator->fails()) {
            return response()->json(['success' => false, 'errors' => $sValidator->errors()->toArray()], 400);
        }

        $qValidator = Validator::make($request->all(), [
            'distrito' => [
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

            $end_time = $request->input('hora_chegada') !== null ? $request->input('hora_chegada') : null;

            $race = new Race([
                'name' => $raceUniqueName,
                'image_path' => $finalPath,
                'district' => $request->input('distrito'),
                'title' => $request->input('titulo'),
                'description' => $request->input('descricao'),
                'minimum_condition' => $request->input('condicao_minima'),
                'start_time' => $request->input('hora_partida'),
                'end_time' => $end_time,
                'date' => $request->input('data'),
                'has_accessibility' => $request->input('tem_acessibilidade') === 'true',
            ]);

            $race->save();

            return response()->json(['success' => true, 'errors' => null, 'message' => 'Corrida criada com sucesso'], 200);
        } else {
            $end_time = $request->input('hora_chegada') !== null ? $request->input('hora_chegada') : null;

            $race = new Race([
                'name' => $raceUniqueName,
                'district' => $request->input('distrito'),
                'title' => $request->input('titulo'),
                'description' => $request->input('descricao'),
                'minimum_condition' => $request->input('condicao_minima'),
                'start_time' => $request->input('hora_partida'),
                'end_time' => $end_time,
                'date' => $request->input('data'),
                'has_accessibility' => $request->input('tem_acessibilidade') === 'true',
            ]);

            $race->save();

            $race->save();

            return response()->json(['success' => true, 'errors' => null, 'message' => 'Corrida criada com sucesso'], 200);
        }
    }
}
