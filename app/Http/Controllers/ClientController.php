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
        $data = $response->json();

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

        if($response->ok()) {
            $status  = 'Éxito';
            $message = 'Cliente creado exitosamente';
        }
        else {
            $status  = 'Error';
            $message = 'Error al crear al cliente';
        };

        // Mensajes flash, se pueden concatenar tantos como sean necesarios
        return to_route('clients.index')->with('status', $status)->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
