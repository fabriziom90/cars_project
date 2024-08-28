@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>Elenco Auto</h2>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.cars.create') }}">Aggiungi auto</a>
                    </div>
                </div>
            </div>
            @if (\Session::has('message'))
                <div class="alert alert-success px-2 py-4">
                    <h4>{{ \Session::get('message') }}</h4>
                </div>
            @endif
            <div class="col-12">
                <table id="cars-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Modello</th>
                            <th>Brand</th>
                            <th>Usata/nuova</th>
                            <th>Prezzo</th>
                            <th>Km</th>
                            <th>Alimentazione</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $car->id }}</td>
                                <td>{{ $car->model_name }}</td>
                                <td>{{ $car->brand ? $car->brand->name : 'Brand non specificato' }}</td>
                                <td>{{ $car->used ? 'Sì' : 'No' }}</td>
                                <td>{{ $car->price }}€</td>
                                <td>{{ $car->km }}</td>
                                <td>{{ $car->power_supply }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.cars.show', ['car' => $car->id]) }}"
                                            class="mx-1 btn btn-sm btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.cars.edit', ['car' => $car->id]) }}"
                                            class="mx-1 btn btn-sm btn-square btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button class="btn btn-sm btn-square btn-danger delete-button"
                                            data-bs-toggle="modal" data-bs-target="#deletecar"
                                            data-id="{{ $car->id }}" data-type="cars"
                                            data-name="{{ $car->name }}">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.cars.components.modal_delete')
@endsection
