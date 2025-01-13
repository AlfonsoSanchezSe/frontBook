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
            ->get(env('APP_URL_BACKEND') . '/books');

        Log::info($response);
        // Verifica que la solicitud fue exitosa
        if ($response->successful()) {
            Log::info("initss");
            $libros = $response->json()['data'];
            Log::info($libros);
            return view('book', compact('libros'));
        } /*else {
            return view('libros.index')->withErrors('Error al recuperar los libros');
        }*/
    }

    public function createBook(Request $request)
    {
        return view('createBook');
    }


    public function proccessCreateBook(Request $request)
    {


        // Realiza la solicitud GET a tu API
        $token = session('jwt_token');
        $response = Http::withToken($token)
            ->post(env('APP_URL_BACKEND') . '/book/create', [
                "isbn" => $request->isbn,
                "gen" => $request->gen,
                "status" => $request->state,
                "price" => $request->price,
                "published" => $request->published,

            ]);

        //Log::info($response);
        // Verifica que la solicitud fue exitosa
        if ($response->successful()) {
            Log::info("createBook");
            return $this->books();
        } /*else {
            return view('libros.index')->withErrors('Error al recuperar los libros');
        }*/
    }



    public function confirmDelete($id)
    {

        $token = session('jwt_token');
        $response = Http::withToken($token)
            ->get(env('APP_URL_BACKEND') . '/book/' . $id);

        if ($response->successful()) {
            $libro = $response->json()['data'];
            Log::info($libro);

            return view("confirmDelete", compact("libro"));
        }
    }
    public function deleteBook($id)
    {
        // Realiza la solicitud GET a tu API
        $token = session('jwt_token');
        $response = Http::withToken($token)
            ->delete(env('APP_URL_BACKEND') . '/delete/' . $id);

        Log::info($response);
        // Verifica que la solicitud fue exitosa
        if ($response->successful()) {
            Log::info("initss");
            return $this->books();
        } /*else {
            return view('libros.index')->withErrors('Error al recuperar los libros');
        }*/
    }


    public function updatePage($id)
    {

        $token = session('jwt_token');
        $response = Http::withToken($token)
            ->get(env('APP_URL_BACKEND') . '/book/' . $id);

        if ($response->successful()) {
            $libro = $response->json()['data'];
            Log::info($libro);

            return view("updateBook", compact("libro"));
        }
    }

    public function updateBook(Request $request, $id)
    {
        $token = session('jwt_token');
        $response = Http::withToken($token)
            ->patch(env('APP_URL_BACKEND') . '/updateBook', [
                "id" => $id,
                "isbn" => $request->isbn,
                "gen" => $request->gen,
                "status" => $request->state,
                "price" => $request->price,
                "published" => $request->published,

            ]);

        if ($response->successful()) {
            $libro = $response->json()['data'];
            Log::info($libro);

            return $this->books();
        }

        Log::info($request);
    }
}
