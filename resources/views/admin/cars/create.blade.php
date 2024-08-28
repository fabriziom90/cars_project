@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <h2>Aggiungi nuova auto</h2>
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
        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row gy-3">
                <div class="col-4">
                    <label for="model_name" class="control-label">Nome</label>
                    <input type="text" name="model_name" id="model_name" placeholder="Nome"
                        class="form-control form-control-sm" value="{{ old('model_name') }}">
                    @error('model_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="control-label">Marca</div>
                    <select name="brand_id" id="brand_id" class="form-select form-select-sm" required>
                        <option value="">Seleziona un brand per l'auto</option>
                        {{-- ciclo i brand per visualizzare le options della select --}}
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @selected($brand->id == old('brand_id'))>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="image_path" class="control-label">Immagine copertina</label>
                    <input type="file" name="image_path" id="image_path" class="form-control form-control-sm">
                    @error('image_path')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="price" class="control-label">Prezzo</label>
                    <input type="number" min="0" placeholder="Prezzo" name="price" id="price"
                        class="form-control form-control-sm" value="{{ old('price') }}">
                    @error('price')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <div class="mt-3">
                        <input class="form-check-input " type="checkbox" value="1" id="used" name="used">
                        <label class="form-check-label" for="used">
                            Usata
                        </label>

                        @error('used')
                            <div class="text-danger">{{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <label for="km" class="control-label">Km</label>
                    <input type="number" min="0" placeholder="Km" id="km" name="km"
                        class="form-control form-control-sm" value="{{ old('km') }}">
                    @error('km')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="ports_number" class="control-label">Numero di porte</label>
                    <input type="number" min="0" max="5" placeholder="N° Porte" id="ports_number"
                        name="ports_number" class="form-control form-control-sm" value="{{ old('ports_number') }}">
                    @error('ports_number')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="cubic_capacity" class="control-label">Cilindrata</label>
                    <input type="number" min="0" placeholder="Cilindrata" id="cubic_capacity" name="cubic_capacity"
                        class="form-control form-control-sm" value="{{ old('cubic_capacity') }}">
                    @error('cubic_capacity')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="transmission" class="control-label">Tipologia di cambio</label>
                    <select name="transmission" id="transmission" class="form-select">
                        <option value="">Seleziona tipologia di cambio</option>
                        <option value="1">Manuale</option>
                        <option value="2">Automatico</option>
                    </select>

                    @error('cubic_capacity')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="power_supply" class="control-label">Alimentazione</label>
                    <select name="power_supply" id="power_supply" class="form-select">
                        <option value="">Seleziona alimentazione</option>
                        <option value="benzina">Benzina</option>
                        <option value="diesel">Diesel</option>
                        <option value="ibrido">Ibrido</option>
                        <option value="elettrico">Elettrico</option>
                    </select>

                    @error('cubic_capacity')
                        <div class="text-danger">{{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    @foreach ($optionals as $optional)
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox" id="optional-{{ $optional->id }}"
                                name="optionals[]" value="{{ $optional->id }}" @checked(is_array(old('optionals')) && in_array($optional->id, old('optionals')))>
                            <label class="form-check-label" for="inlineCheckbox1">{{ $optional->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <button class="btn btn-sm btn-success mt-4">Salva</button>
                </div>
            </div>
        </form>
    </div>
@endsection
