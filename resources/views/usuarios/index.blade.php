@extends('layouts.plantilla')

@section('page_title')
Facilisimo | Lista Usuarios
@endsection

@section('title')
<h1 style="color: black;">
    Listado de Usuarios
</h1>
@endsection

@section('content')
<div class="">
    
    <div>
        <table class="table table-striped jambo_table table-hover" id="usuarios_table">
            <thead>
                <tr class="headings">  
                    <th class="column-title">Cedula</th>
                    <th class="column-title">Nombre</th>
                    <th class="column-title">Email</th>
                    <th class="column-title">Tipo Usuario</th>                           
                    <th class="column-title no-link last"><span class="nobr">Action</span></th>                   
                </tr>
            </thead>
            <tbody id="_results">
                @foreach($users as $user)
                <tr class="even pointer">  
                    <td class=" ">{{$user->user_id_number}}</td>
                    <td class=" ">{{$user->first_name ." ". $user->last_name}}</td>
                    <td class=" ">{{$user->email}}</td>
                    <td class=" ">{{$user->getTipo->description}}</td>                            
                    <td class=" last">
                        <a href="usuarios/{{$user->id}}/edit" style="font-size: 15px;" ><i class="fa fa-pencil"></i></a>
                        <a href="usuarios/{{$user->id}}/finger-list" style="font-size: 15px;margin-left: 7px;color:#03579f;" ><i class="fa fa-hand-o-up"></i></a>
                        <a href="javascript:void(0)" class="eliminar" 
                            data-titulo="¿Esta seguro de eliminar este registro?"
                            data-id="{{$user->id}}"
                            style="color:#dc3545;margin-left: 5px;font-size: 15px;margin-left: 7px;"
                            data-placement="top"><i class="fa fa-trash"></i>
                        </a> 
                    </td>
                </tr>  
                @endforeach
            </tbody>
        </table>                  
        <input type="hidden" name="link" id="link" value="usuarios" />
        <input type="hidden" name="show_action" id="show_action" value="Y" />
        <input type="hidden" name="fields" id="fields" value="id,user_id_number,name,email,userType" />
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css"/>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.18/sweetalert2.min.js"
    integrity="sha512-mBSqtiBr4vcvTb6BCuIAgVx4uF3EVlVvJ2j+Z9USL0VwgL9liZ638rTANn5m1br7iupcjjg/LIl5cCYcNae7Yg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://kit.fontawesome.com/cec3a6c7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            var usuarios_table=$('#usuarios_table').DataTable({
                responsive:true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No hay registros  ",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
                lengthChange: false,
                buttons: [
                    {
                        extend: 'csv',
                    },
                ]
            });
            usuarios_table.buttons().container()
        .appendTo( '#usuarios_table_wrapper .col-md-6:eq(0)' );
        });
    </script>
@endsection