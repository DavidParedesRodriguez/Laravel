<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PruebaController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'auth:api',
            ['except' => ['index', 'show']]
        );
    }

    public function index()
    {
        return response()->json(['mensaje' => 'Accediendo a index']);
    }
    public function store(Request $request)
    {
        return response()->json(['mensaje' => 'Insertando'], 201);
    }
    public function show($id)
    {
        return response()->json(['mensaje' => 'Ficha de ' . $id]);
    }
    public function update(Request $request, $id)
    {
        return response()->json(['mensaje' => 'Actualizando elemento']);
    }
    public function destroy($id)
    {
        return response()->json(['mensaje' => 'Borrando elemento']);
    }
}
