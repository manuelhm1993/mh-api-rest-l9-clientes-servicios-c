<?php

namespace App\Http\Controllers;

use App\MH\Classes\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endpoint = '/clients';

        $response = Http::get(Helper::getURLMHClientesServiciosAPI() . $endpoint);

        if($response->ok()) {
            $data = $response->json();
        }
        else {
            $data = [];
        };

        // Como el objeto response implementa ArrayAccess se puede acceder directamente a las claves del json
        return view('clients.index', ['data' => $data['clients']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $endpoint = '/clients';

        $response = Http::post(Helper::getURLMHClientesServiciosAPI() . $endpoint, $request->all());
        $status   = $response->status();

        if($response->ok()) {
            $feedback  = 'Éxito';
            $message = 'Cliente creado exitosamente';
        }
        else {
            $feedback  = 'Error';
            $message = 'Error al crear al cliente';
        };

        // Mensajes flash, se pueden concatenar tantos como sean necesarios
        return to_route('clients.index')
               ->with('feedback', $feedback)
               ->with('message', $message)
               ->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endpoint = "/clients/$id";

        $response = Http::get(Helper::getURLMHClientesServiciosAPI() . $endpoint);
        $data     = $response->json();

        if(!$response->ok()) {
            $feedback  = 'Error';
            $message   = 'Error al mostrar el detalle del cliente';
            $status    = $response->status();

            return to_route('clients.index')
                   ->with('feedback', $feedback)
                   ->with('message', $message)
                   ->with('status', $status);
        }

        return view('clients.show', ['client' => $data['client']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endpoint = "/clients/$id";

        $response = Http::get(Helper::getURLMHClientesServiciosAPI() . $endpoint);
        $data     = $response->json();

        if(!$response->ok()) {
            $feedback  = 'Error';
            $message   = 'Error al desplegar el formulario de actualización';
            $status    = $response->status();

            return to_route('clients.index')
                   ->with('feedback', $feedback)
                   ->with('message', $message)
                   ->with('status', $status);
        }

        return view('clients.edit', ['client' => $data['client']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $endpoint = "/clients/$id";

        $response = Http::put(Helper::getURLMHClientesServiciosAPI() . $endpoint, $request->all());
        $status    = $response->status();

        if($response->ok()) {
            $feedback  = 'Éxito';
            $message = 'Cliente actualizado exitosamente';
        }
        else {
            $feedback  = 'Error';
            $message   = 'Error al actualizar el cliente';
        }

        return to_route('clients.index')
                   ->with('feedback', $feedback)
                   ->with('message', $message)
                   ->with('status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endpoint = "/clients/$id";

        $response = Http::delete(Helper::getURLMHClientesServiciosAPI() . $endpoint);
        $status    = $response->status();

        if($response->ok()) {
            $feedback  = 'Éxito';
            $message   = 'Cliente borrado exitosamente';
        }
        else {
            $feedback  = 'Error';
            $message   = 'Error al borrar el cliente';
        };

        // Mensajes flash, se pueden concatenar tantos como sean necesarios
        return to_route('clients.index')
               ->with('feedback', $feedback)
               ->with('message', $message)
               ->with('status', $status);
    }
}
