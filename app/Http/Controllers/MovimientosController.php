<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimientos;
use Illuminate\Support\Facades\DB;
use App\Models\ActivosFijos;
use App\Models\User;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimientos::all();
        return view("movimientos.index", compact("movimientos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        $id = (int) $id;
        $movimientos = ActivosFijos::where('id_activo_tegnologicos',$id)->first();
        $estadoMovimientos = Movimientos::where('id_activo_tegnologicos',$id)->get();
        $arrayAcciones = array();
        for ($i = 0; $i < count($estadoMovimientos); $i++) {
            array_push($arrayAcciones,$estadoMovimientos[$i]['accion']);
        }
        $ultimaPosicion = end($arrayAcciones);
        
        return view('movimientos.create', compact('movimientos','ultimaPosicion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "id_activo_tegnologicos" => "required",
            "activo_fijo" => "required",
            "punto" => "required",
            "observaciones" => "required",
            "user_id_number" => "required",
            "nombre_usuario" => "required",
        ]);
        $fechaActual = date('Y-m-d H:i:s');
        $idUsuario =User::where('user_id_number',$request->user_id_number)->first();
        
        try {
            
            $movimiento = new Movimientos();
            $movimiento->id_activo_tegnologicos = $request->id_activo_tegnologicos;
            $movimiento->activo_fijo = $request->activo_fijo;
            $movimiento->punto = $request->punto;
            $movimiento->accion = $request->observaciones;
            $movimiento->idUsuario = $idUsuario->id;
            $movimiento->cedula = $request->user_id_number;
            $movimiento->nombre = $request->nombre_usuario;
            $movimiento->ubicacion = $request->ubicacion;
            $movimiento->huella = $request->imgFinger;
            $movimiento->fecha_creacion = $fechaActual;
            $movimiento->save();
            return redirect('/home')->with(["estado" => "Ok", "mensaje" => "Movimiento creado correctamente..!"]);
        } catch (\Throwable $th) {
            dd($th);
            return redirect('/home')->with(["estado" => "NO", "mensaje" => "Movimiento No se Pudo Crear..!"]);
        }
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
