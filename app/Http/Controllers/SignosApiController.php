<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignosApiController extends Controller
{
    public function getSignPrediction($language, $sign, $date)
    {
        // Convertir la fecha al formato YYYY-MM-DD
        $formattedDate = date('Y-m-d', strtotime($date));

        // Determinar el nombre del campo de la predicción según el idioma
        $predictionField = ($language === 'es') ? 'prediction_es' : 'prediction_en';

        // Consultar la base de datos para obtener la predicción del signo
        $prediction = DB::table('signos')
            ->select($predictionField)
            ->where('signo', $sign)
            ->whereDate('fecha', $formattedDate)
            ->value($predictionField);

        // Si no se encontró la predicción, devolver un error
        if (!$prediction) {
            return response()->json(['error' => 'No se encontró la predicción para el signo y la fecha especificados'], 404);
        }

        // Devolver la predicción en formato JSON
        return response()->json(['prediction' => $prediction]);
    }
}
