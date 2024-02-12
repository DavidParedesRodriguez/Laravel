<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the specified resource.
     */

    /*
    public function show($id)
    {
        return view('posts.show');
    }
*/

    public function show($id)
    {
        $detalle = $this->edit(); // Llamada al método edit()
        return view('posts.show', compact('detalle'));
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
      //  return "Nuevo post";
      return redirect()->route('inicio');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //return "Edición de post";
        return redirect()->route('inicio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
