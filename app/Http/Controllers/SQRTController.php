<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\Log;
use App\Models\Akar;
use Symfony\Component\HttpFoundation\Response;

class SQRTController extends Controller
{
    public function API2(Request $request): JsonResponse {
        //$request->validate(['number' => 'required|numeric|gte:0']);

        //$start_time = microtime(true); // Mulai mengukur waktu proses
        $input = $request->number;

        $guess = $input / 2;
        $epsilon = 0.0001;
    
        while (abs($guess * $guess - $input) > $epsilon) {
            $new_guess = ($guess + $input / $guess) / 2;
            $guess = $new_guess;
        }
    
       // $end_time = microtime(true); // Selesai mengukur waktu proses
       // $execution_time = ($end_time - $start_time) * 1000; // Waktu dalam milidetik
    
        
        $perhitungan = new Akar();
        $perhitungan->input = $input;
        $perhitungan->angka = $guess;
        $perhitungan->waktu = 0;
        $perhitungan->jenis = 'API';
        $perhitungan->save();
        //$perhitungan = use perhitungan;
        // $perhitungan->input = $input;
        // $
        //Perhitungan::create($log);
        //dd($perhitungan);
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil mendapatkan hasil akar kuadrat',
            'data' => [
                'hasil' => $guess,
                'waktu' => 0 . " detik"
            ],
        ], Response::HTTP_OK);
    }
}