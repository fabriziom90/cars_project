@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <h2>Aggiungi nuovo brand</h2>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <label for="name" class="control-label">Nome</label>
                    <input type="text" name="name" id="name" placeholder="Nome"
                        class="form-control form-control-sm" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="price" class="control-label">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control form-control-sm">
                    @error('logo')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <button class="btn btn-sm btn-success mt-4">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection
