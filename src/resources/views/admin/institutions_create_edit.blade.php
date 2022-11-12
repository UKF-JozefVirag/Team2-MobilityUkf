@extends('layouts.app')
@section('content')

    <form method="post" action="{{ $institution->exists ? route('admin.institutions.update', $institution->id) : route('admin.institutions.store') }}">
        @csrf
        @if($institution->exists)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nazov" class="form-label">Nazov</label>
            <input type="nazov" value="{{old('nazov', $institution->nazov)}}" name="nazov" class="form-control" id="nazov">
        </div>

        <div class="mb-3">
            <label for="mesto" class="form-label">Mesto</label>
            <input type="mesto" value="{{old('mesto', $institution->last_name)}}" name="mesto" class="form-control" id="mesto">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" value="{{old('email', $institution->email)}}" name="email" class="form-control" id="email">
        </div>

        <div class="mb-3">
            <label for="tel_number" class="form-label">Telephone Number</label>
            <input type="tel_number" value="{{old('tel_number', $customer->tel_number)}}" name="tel_number" class="form-control" id="tel_number" onkeypress="validate(event)" maxlength="10" minlength="10">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>


    </form>

@endsection
