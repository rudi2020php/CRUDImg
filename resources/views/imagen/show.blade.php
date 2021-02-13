@extends('layouts.app')

@section('title', 'nueva')

@section('content')
    <!-- Page Content -->
    <div class="content">
        
        <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header"><h2>{{ __('Actualizar Imágen') }}</h2></div>

                <div class="card-body">
                <form action="{{route('files.update', $imagen)}}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('put');
                
                <div class="form group m-2">
                <div class="ml-5 mt-2">
                <img  src="{{asset($imagen->url)}}" alt="">
                <input type="file" name="file" id="" accept="image/*">
                @error('file')
                <br>
                    <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
                
                 <button type="submit" class="btn btn-primary">Actualizar imágen</button>
                </form>
                </div>
                <div class="card-footer">
                
                </div>
                </div>
        </div>
    </div>
    </div>
    <!-- END Page Content -->
@endsection
