@extends('layouts.plantilla')

@section('page_title')
Facilisimo | Perfil Usuario
@endsection

@section('title')
    <h1 style="color: black;">
        Perfil Usuario
    </h1>
@endsection

@section('content') 
<form id="usuario" class="form-horizontal form-label-left" enctype="multipart/form-data" autocomplete="off" novalidate 
      method="POST" action="{{ url('usuarios/'.$usuario->id."/show_update")}}">
    @csrf
    @method('put')
    <div class="item form-group form_title">
        Formulario Perfil Usuario        
    </div>
    <div class="separator"></div>
    <div class="item form-group"> 
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_id_number">Documento <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="user_id_number" name="user_id_number" type="text"  required="required" 
                   class="form-control col-md-7 col-xs-12 @error('user_id_number') parsley-error @enderror"
                   placeholder="Ingrese Número de Documento" value="{{ $usuario->user_id_number }}"readonly>
            @error('user_id_number')
            <ul class="parsley-errors-list filled" id="parsley-id-1"><li class="parsley-required">*{{$message}}</li></ul> 
            @enderror
        </div>
    </div>

    <div class="item form-group"> 
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Nombres <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="first_name" name="first_name" type="text"  required="required" 
                   class="form-control col-md-7 col-xs-12 @error('first_name') parsley-error @enderror"
                   placeholder="Ingrese Nombres" value="{{ $usuario->first_name }}" readonly>
            @error('first_name')
            <ul class="parsley-errors-list filled" id="parsley-id-1"><li class="parsley-required">*{{$message}}</li></ul> 
            @enderror
        </div>
    </div>

    <div class="item form-group"> 
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Apellidos <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="last_name" name="last_name" type="text"  required="required" 
                   class="form-control col-md-7 col-xs-12 @error('last_name') parsley-error @enderror"
                   placeholder="Ingrese Apellidos" value="{{ $usuario->last_name }}" readonly>
            @error('last_name')
            <ul class="parsley-errors-list filled" id="parsley-id-1"><li class="parsley-required">*{{$message}}</li></ul> 
            @enderror
        </div>
    </div>


    <div class="item form-group"> 
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="email" name="email" type="text"  required="required" 
                   class="form-control col-md-7 col-xs-12 @error('email') parsley-error @enderror"
                   placeholder="Ingrese Email" value="{{ $usuario->email }}" readonly>
            @error('email')
            <ul class="parsley-errors-list filled" id="parsley-id-1"><li class="parsley-required">*{{$message}}</li></ul> 
            @enderror
        </div>
    </div>   
    
    <div class="ln_solid"></div>
    {{-- <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <a href="{{url('home')}}" class="btn btn-primary">Cancelar</a> 
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div> --}}
</form>
@endsection