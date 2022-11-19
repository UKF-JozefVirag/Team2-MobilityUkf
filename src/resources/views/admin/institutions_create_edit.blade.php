<div class="modal-body">
    <form method="POST" action="{{ $institution->exists ? route('admin.institutions.update', $institution->id) : route('admin.institutions.store') }}" enctype="multipart/form-data">
        @csrf
        @if($institution->exists)
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="nazov" class="form-label">Názov inštitúcie</label>
            <input type="text" value="{{old('nazov', $institution->nazov)}}" name="nazov" class="form-control" id="nazov">
        </div>
        <div class="mb-3">
            <label for="mesto" class="form-label">Mesto</label>
            <input type="text" value="{{old('mesto', $institution->mesto)}}" name="mesto" class="form-control" id="mesto">
        </div>
        <div class="mb-3">
            <label for="zmluva_od" class="form-label">Zmluva s univerzitou od</label>
            <input type="date" value="{{old('zmluva_od', $institution->zmluva_od)}}" name="zmluva_od" class="form-control" id="zmluva_od">
        </div>
        <div class="mb-3">
            <label for="zmluva_do" class="form-label">Zmluva s univerzitou do</label>
            <input type="date" value="{{old('zmluva_do', $institution->zmluva_do)}}" name="zmluva_do" class="form-control" id="zmluva_do">
        </div>
        <div class="mb-3">
            <label for="url_fotka" class="form-label">Obrázok</label>
{{--            <input type="text" value="{{old('url_fotka', $institution->url_fotka)}}" name="url_fotka" class="form-control" id="url_fotka">--}}
            <input type="file" accept="image/jpeg, image/png" name="url_fotka" class="form-control" id="url_fotka">

        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="krajina_idkrajina">Krajina</label>
                <select class="custom-select custom-select-md" id="krajina_idkrajina" name="krajina_idkrajina">
                    @unless ($institution->exists)
                        <option selected></option>
                    @endunless
                    @foreach($countries as $country)
                            @if($institution->krajina_idkrajina == $country->idkrajina)
                                <option selected value="{{ $country->idkrajina }}"{{ $country->idkrajina === old('krajina_idkrajina',$institution->country->idkrajina ?? '')}}>
                                    {{ $country->nazov }}
                                </option>
                            @else
                                <option value="{{ $country->idkrajina }}"{{ $country->idkrajina === old('krajina_idkrajina',$institution->country->idkrajina ?? '') ? 'selected="selected"' : '' }}>
                                    {{ $country->nazov }}
                                </option>
                            @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="typ_institucie_id">Typ inštitúcie</label>
                <select class="custom-select custom-select-md" id="typ_institucie_id" name="typ_institucie_id" style="width: 100%">
                    @unless ($institution->exists)
                        <option selected></option>
                    @endunless
                    @foreach($types as $type)
                            @if($institution->typ_institucie_id == $type->id)
                                <option selected value="{{ $type->id }}"{{ $type->id === old('typ_institucie_id',$institution->type->id ?? '')}}>
                                    {{ $type->nazov }}
                                </option>
                            @else
                                <option value="{{ $type->id }}"{{ $type->id === old('typ_institucie_id',$institution->type->id ?? '') ? 'selected' : '' }}>
                                    {{ $type->nazov }}
                                </option>
                            @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-primary">Zmeniť údaje</button>
            </div>
        </div>
    </form>
</div>

