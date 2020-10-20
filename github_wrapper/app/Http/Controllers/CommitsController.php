<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * Modela los commits y sus operaciones con la API de github
 */
class CommitsController extends Controller 
{

    /**
     * Metodo encargada de obtener las ramas de un repositorio.
     * Recibe como parametros el sha que hace referencia al repo
     * que queremos acceder para obtener las ramas.
     */
    public function getCommitInfo($sha)
    {
        $usuario = env('GITHUB_USER');
        $token = env('GITHUB_TOKEN');

        $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/commits/' . $sha);
        $commitInfo = $response->json();

        return view('commitInfo', compact('commitInfo'));
    }
}
