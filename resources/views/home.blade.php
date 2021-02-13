@extends('layouts.app')
@section('title', 'SYS-LARAVEL8')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header"><h1>{{ __('Subir Imágen') }}</h1></div>

                <div class="card-body">
                <form action="{{route('files.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form group m-2">
                <input type="file" name="file" id="" accept="image/*">
                @error('file')
                <br>
                    <small class="text-danger">{{$message}}</small>
                @enderror
                </div>
                
                 <button type="submit" class="btn btn-primary">Subir imágen</button>
                </form>
                </div>
                <div class="card-footer">
                
                </div>
                </div>
        </div>
    </div>
</div>
@endsection
