<?php

namespace App\Http\Controllers\Names;

use App\Http\Controllers\Controller;
use App\Names;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NamesController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $name = $request->input('name');
        //dd($request->all());
        //$names = new Names();
        //$result = $names->create($name);
        $result = Names::create($request->all());
        if($result){
            $jsonData = array("Mensaje"=>"El nombre ha sido Agregado satisfactoriamente");
        }else{
            $jsonData = array("Mensaje"=>"Error al ingresar el nombre a la base de datos");
        }
        return response()->json($jsonData)->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Names  $names
     * @return \Illuminate\Http\Response
     */
    public function show(Names $names)
    {
        //
        return response()->json($names->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Names  $names
     * @return \Illuminate\Http\Response
     */
    public function edit(Names $names)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Names  $names
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Names $names)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Names  $names
     * @return \Illuminate\Http\Response
     */
    public function destroy(Names $names,$id)
    {
        //
        if(DB::table('names')->delete($id)){
            $jsonData = array("Mensaje"=>"El nombre a sido eliminado satisfactoriamente");
        }else{
            $jsonData = array("Mensaje"=="Error el nombre no fue eliminado");
        }
        //dd($names->delete());
        return response()->json($jsonData)->setStatusCode(201);

    }
}
