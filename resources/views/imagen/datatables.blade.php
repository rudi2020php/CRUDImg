@extends('layouts.app')

@section('css_before')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection

@section('js_after')
<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@section('content')
<!-- Page Content -->
<div class="content">
    <div class="my-50 text-center">
        <h2 class="font-w700 text-black mb-10">DataTables Imágenes</h2>
        <a href="{{route('home')}}"><small>up load</small></a>
    </div>



    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">

        </div>
        <div class="block-content col-12">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
            <div class="row">
                @foreach ($imagenes as $imagen)
                <div class="col-sm-5">
                    <div class="card">
                        <h5 class="card-title">Nombre de Imagen</h5>
                        <div class="card-body">

                            <form action="{{route('files.destroy', $imagen)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Quitar</button>
                            </form>

                            <a href="{{route('files.show', $imagen->id)}}">
                                <img class="card-img-top" src="{{asset($imagen->url)}}" alt="Card image cap">
                                <p class="card-text"><small class="text-muted">Cambiar Imágen</small></p>
                            </a>
                        </div>
                    </div>
                </div>@endforeach
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>

    <!-- END Page Content -->
    @endsection