@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div>
                        <h2>Elenco brands</h2>
                    </div>
                    <div>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.brands.create') }}">Aggiungi brand</a>
                    </div>
                </div>
            </div>
            @if (\Session::has('message'))
                <div class="alert alert-success px-2 py-4">
                    <h4>{{ \Session::get('message') }}</h4>
                </div>
            @endif
            <div class="col-12">
                <table id="brands-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Nome</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>
                                    <div class="table-img-ctn">
                                        @if (str_contains($brand->logo, 'https'))
                                            <img src="{{ $brand->logo }}" width="100px">
                                        @else
                                            <img src="{{ asset('/storage/' . $brand->logo) }}" alt="">
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        {{-- <a href="{{ route('brands.show', ['brand' => $brand->id]) }}"
                                            class="mx-1 btn btn-sm btn-primary">
                                            <i class="fa-solid fa-eye"></i>
                                        </a> --}}
                                        <a href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}"
                                            class="mx-1 btn btn-sm btn-square btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button class="btn btn-sm btn-square btn-danger delete-button"
                                            data-bs-toggle="modal" data-bs-target="#deleteBrand"
                                            data-id="{{ $brand->id }}" data-type="brands"
                                            data-name="{{ $brand->name }}">
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
    @include('admin.brands.components.modal_delete')
@endsection
