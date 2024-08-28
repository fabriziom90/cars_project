@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Dettaglio optional</h2>
            </div>
            <div class="col-12">
                <ul class="list-unstyled">
                    <li><strong>Nome: </strong>{{ $optional->name }}</li>
                    <li><strong>Prezzo: </strong>{{ $optional->price }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection
