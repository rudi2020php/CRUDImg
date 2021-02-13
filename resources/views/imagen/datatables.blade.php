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
            <div class="block-content sm">
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
   <div class="card-columns">
                        @foreach ($imagenes as $imagen)
                        <form action="{{route('files.destroy', $imagen)}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Quitar</button>
                        </form>
                                <div class="card">
                                <a href="{{route('files.show', $imagen->id)}}">
                                <img  src="{{asset($imagen->url)}}" alt=""> </a>
                                </div>
                        @endforeach
                 </div>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>

    <!-- END Page Content -->
@endsection
