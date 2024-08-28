@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <h2>Aggiungi nuovo optional</h2>
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
        <form action="{{ route('admin.optionals.store') }}" method="POST">
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
                    <label for="price" class="control-label">Prezzo</label>
                    <input type="number" name="price" id="price" placeholder="Prezzo"
                        class="form-control form-control-sm" value="{{ old('price') }}">
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <button class="btn btn-sm btn-success mt-4">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection
