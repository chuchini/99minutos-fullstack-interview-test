<?php

namespace App\Http\Controllers;

use Illuminate\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * Modela los pull requests y sus operaciones con la API de github
 */
class PRController extends Controller 
{
    
    /**
     * Metodo encargada de obtener las ramas de un repositorio.
     * Recibe como parametros a $user el usuario y $repo el repositorio
     * del cual se quieren obtener las ramas.
     */
    public function getPR()
    {
        $usuario = env('GITHUB_USER');
        $token = env('GITHUB_TOKEN');
        
        $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls?state=all');
        //$response = Http::withToken('token')->get('https://api.github.com/rate_limit');
        
        $pullrequests = $response->json();

        return view('pullRequests', compact('pullrequests'));
    }

    /**
     * Metodo que se encarga de cerrar un PR con base al ID que se de del PR
     */
    public function closePR($prID)
    {
        $usuario = env('GITHUB_USER');
        $token = env('GITHUB_TOKEN');

        $max_retries = 0;
        $response = Http::withBasicAuth($usuario, $token)->patch('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls/' . $prID, [
            'state' => 'closed'
        ]);

        $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls?state=all');
        $checkPRStatus = $response->json();
        
        while($checkPRStatus[$prID - 1]['state'] == 'open') {
            sleep(1);
            $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls?state=all');
            $checkPRStatus = $response->json();
            if ($max_retries > 15) {
                break;
            }
            $max_retries++;
        }

        return redirect('/pullrequests');
    }

    /**
     * Metodo que se encarga de renderizar la vista para generar un nuevo PR
     * con la información de las ramas disponibles con las que se puede 
     * crear un nuevo PR.
     */
    public function newpr() {

        $usuario = env('GITHUB_USER');
        $token = env('GITHUB_TOKEN');

        $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/branches');
        $branches = array_reverse($response->json());

        return view('createpr', compact('branches'));
    }

    /**
     * Metodo encargado de generar un nuevo PR.
     * Si el boton que se presiona es de solo crear un nuevo PR, 
     * lo crea y lo deja abierto.
     * 
     * Si el boton que se presiona es el de crear y hacer merge, se
     * crea un nuevo PR y posteriormente se hace merge, en caso de recibir una respuesta
     * de fallo por parte del servidor, se notifica al usuario.
     */
    public function createPR() {

        $usuario = env('GITHUB_USER');
        $token = env('GITHUB_TOKEN');

        $input = request('create');
        if (isset($input)) {
            // Unicamente creamos el PR y lo salvamos dejandolo con status=open
            $response = Http::withBasicAuth($usuario, $token)->post('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls', [
                'title' => request('title'),
                'body' => request('description'),
                'head' => request('head'),
                'base' => request('base')
            ]);

            if ($response->failed()) {
                return view('error');
            }
        } else {
            // Primero se crea el PR
            $response = Http::withBasicAuth($usuario, $token)->post('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls', [
                'title' => request('title'),
                'body' => request('description'),
                'head' => request('head'),
                'base' => request('base')
            ]);
            // Se obtiene el pull_number, como se acaba de crear estara en la posicion 0 de la api de github.
            // Puede existir el caso en el que, debido a la concurrencia, esto no se cumpla. Sin embargo se puede arreglar
            // agregando otro metodo de comprobacion, lo cual no hacemos aqui para fines practicos.
            $response = Http::withBasicAuth($usuario, $token)->get('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls');
            
            $pull_request_id = $response->json();
            $pull_request_id = $pull_request_id[0]['number'];
            
            // Por ultimo, hacemos el merge con el ID del PR
            $response = Http::withBasicAuth($usuario, $token)->put('https://api.github.com/repos/chuchini/99minutos-fullstack-interview-test/pulls/' . $pull_request_id . '/merge',[
                'title' => request('title')
            ]);
            
            if ($response->failed()) {
                return view('error');
            }
        }
        
        return redirect('/pullrequests');
    }
}
