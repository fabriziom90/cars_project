@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>Elenco optionals</h2>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.optionals.create') }}">Aggiungi optional</a>
                    </div>
                </div>
            </div>
            @if (\Session::has('message'))
                <div class="alert alert-success px-2 py-4">
                    <h4>{{ \Session::get('message') }}</h4>
                </div>
            @endif
            <div class="col-12">
                <table id="optionals-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Prezzo</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($optionals as $optional)
                            <tr>
                                <td>{{ $optional->id }}</td>
                                <td>{{ $optional->name }}</td>
                                <td>{{ $optional->price }} €</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.optionals.show', ['optional' => $optional->id]) }}"
                                            class="mx-1 btn btn-sm btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.optionals.edit', ['optional' => $optional->id]) }}"
                                            class="mx-1 btn btn-sm btn-square btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        {{-- <form class="mx-1" action="{{ route('optionals.destroy', $optional->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Sei sicuro di voler cancellare questo optional?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-square btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form> --}}
                                        <button class="btn btn-sm btn-square btn-danger delete-button"
                                            data-bs-toggle="modal" data-bs-target="#deleteOptional"
                                            data-id="{{ $optional->id }}" data-type="optionals"
                                            data-name="{{ $optional->name }}">
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
    @include('admin.optionals.components.modal_delete')
@endsection
