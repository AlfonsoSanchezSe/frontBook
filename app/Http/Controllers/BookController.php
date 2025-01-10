<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function books()
    {
        // Realiza la solicitud GET a tu API
        $token = session('jwt_token');
        $response = Http::withToken($token)
                        ->get(env('APP_URL_BACKEND').'/books');

        Log::info($response);
        // Verifica que la solicitud fue exitosa
        if ($response->successful()) {
            Log::info("initss");
            $libros = $response->json()['data'];
            return view('book',compact('libros'));
        } /*else {
            return view('libros.index')->withErrors('Error al recuperar los libros');
        }*/
    }

    public function deleteBook()
    {
        // Realiza la solicitud GET a tu API
        $token = session('jwt_token');
        $response = Http::withToken($token)
                        ->get(env('APP_URL_BACKEND').'/books'.$_GET["id"]);

        Log::info($response);
        // Verifica que la solicitud fue exitosa
        if ($response->successful()) {
            Log::info("initss");
            $libros = $response->json()['data'];
            return view('book',compact('libros'));
        } /*else {
            return view('libros.index')->withErrors('Error al recuperar los libros');
        }*/
    }
}
