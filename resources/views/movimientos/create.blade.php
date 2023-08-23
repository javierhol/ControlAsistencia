@extends('layouts.plantilla')

@section('page_title')
    Facilisimo | Crear Movimientos
@endsection

@section('title')
    Crear Movimiento
@endsection

@section('content')
        
            
    
    <form id="usuario" class="form-horizontal form-label-left" autocomplete="off" method="post"
        action="{{url('/movimientos/createMovimiento')}}">
        @csrf
        <div class="item form-group form_title">
            Formulario Crear Movimientos
        </div>
        <div class="separator" style="
        margin-bottom: 2rem;"></div>

        <a href="javascript:void(0)" onclick="activeSensorRead(true)" class="btn-sensor-active">Activar Sensor</a>
        <a href="javascript:void(0)" onclick="closeSensorRead(true)" class="btn-sensor-close">Desactivar Sensor</a>                                            
        
        <div class="item form-group" style="margin-top: 3rem;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_activo_tegnologicos">Id Tecnologico <span
                    class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="id_activo_tegnologicos" name="id_activo_tegnologicos" type="text" required="required"
                    class="form-control col-md-7 col-xs-12 @error('id_activo_tegnologicos') parsley-error @enderror"
                    placeholder="Ingrese Id Tecnologico" value="{{ $movimientos->id_activo_tegnologicos }}"readonly>
                @error('id_activo_tegnologicos')
                    <ul class="parsley-errors-list filled" id="parsley-id-1">
                        <li class="parsley-required">*{{ $message }}</li>
                    </ul>
                @enderror
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="activo_fijo">Activo Fijo <span
                    class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="activo_fijo" name="activo_fijo" type="text" required="required"
                    class="form-control col-md-7 col-xs-12 @error('activo_fijo') parsley-error @enderror"
                    placeholder="Ingrese El Activo" value="{{ $movimientos->activo_fijo }}" readonly>
                @error('activo_fijo')
                    <ul class="parsley-errors-list filled" id="parsley-id-1">
                        <li class="parsley-required">*{{ $message }}</li>
                    </ul>
                @enderror
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="punto">Punto <span
                    class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="punto" name="punto" type="text" required="required"
                    class="form-control col-md-7 col-xs-12 @error('punto') parsley-error @enderror"
                    placeholder="Ingrese El nombre del punto">
                @error('punto')
                    <ul class="parsley-errors-list filled" id="parsley-id-1">
                        <li class="parsley-required">*{{ $message }}</li>
                    </ul>
                @enderror
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="observaciones">Observacion <span
                    class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-7 col-xs-12 @error('observaciones') parsley-error @enderror"
                    style="width: 100%" required="required" name="observaciones" id="observaciones">
                    <option disabled selected>Seleccione...</option>
                    @if ($ultimaPosicion == 'SALIDA')
                        <option value="INGRESO">Ingreso</option>
                    @endif
                    @if ($ultimaPosicion == 'INGRESO')
                        <option value="SALIDA">Salida</option>
                    @endif
                    @if ($ultimaPosicion == null)
                        <option value="INGRESO">Ingreso</option>
                        <option value="SALIDA">Salida</option>
                    @endif
                </select>
                @error('observaciones')
                    <ul class="parsley-errors-list filled" id="parsley-id-1">
                        <li class="parsley-required">*{{ $message }}</li>
                    </ul>
                @enderror
            </div>
        </div>
        
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id_number">Cedula <span
                    class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="user_id_number" name="user_id_number" type="text" required="required"
                    class="form-control col-md-7 col-xs-12 @error('user_id_number') parsley-error @enderror"
                    placeholder="Ingrese Cedula" value="{{ old('user_id_number') }}" readonly>
                @error('user_id_number')
                    <ul class="parsley-errors-list filled" id="parsley-id-1">
                        <li class="parsley-required">*{{ $message }}</li>
                    </ul>
                @enderror
            </div>
        </div>
        <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_usuario">Nombre Usuario <span
                    class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="nombre_usuario" name="nombre_usuario" type="text" required="required"
                    class="form-control col-md-7 col-xs-12 @error('nombre_usuario') parsley-error @enderror"
                    placeholder="Ingrese Nombre" value="{{ old('nombre_usuario') }}" readonly>
                @error('nombre_usuario')
                    <ul class="parsley-errors-list filled" id="parsley-id-1">
                        <li class="parsley-required">*{{ $message }}</li>
                    </ul>
                @enderror
            </div>
        </div>
        <div style="width: 15%;" class="img">
            <img class="imgFinger" name="imgFinger" src="{{asset('images/finger.png')}}" />
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
                <a href="{{ url('usuarios') }}" class="btn btn-success">Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <input type="text" name="ubicacion" style="display: none" value="{{ $movimientos->ubicacion }}">
        

    </form>
    <div class="" role="main">
        {{-- <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="img">
                                <img class="imgFinger" src="{{asset('images/finger.png')}}" />
                            </div>
                            <div class="txtFinger ct2" >----------</div>
                            <div class="dataUser" >
                                Identificacion: --------
                                <br>
                                Nombre: ----------
                            </div>

                            <div>
                                <input type="text" value="" class="dataUser">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <form id="token" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
