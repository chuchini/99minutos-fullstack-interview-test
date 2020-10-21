<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



/**
 * Modela los branches y sus operaciones con la API de github
 */
class BranchesController extends Controller 
{
    /**
     * Metodo encargado de obtener las ramas de un repositorio. 
     * En nuestro caso solo nos interesa el repositorio de la prueba en
     * mi repositorio. Si se quisiera para cualquier repositorio y usuario, 
     * unicamente hay que agregar dos parametros correspondiente a ellos.
     */
    public function getBranches()
    {
        $usuario = env('GITHUB_USER');
        $token = env('GITHUB_TOKEN');

        $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/branches');
        $branches = array_reverse($response->json());

        return view('branches', compact('branches'));
    }

    /**
     * Metodo encargado de obtener todos los commits de una rama, para ello
     * es necesario el valor sha que nos regresa la API de github para 
     * identificar a cada rama.
     */
    public function getCommits($sha)
    {
        $usuario = env('GITHUB_USER');
        $token = env('GITHUB_TOKEN');


        $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/commits?sha=' . $sha);
        $branchInfo = $response->json();

        return view('brancheDetails', compact('branchInfo'));
    }
    
}