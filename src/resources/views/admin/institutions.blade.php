@extends('layouts.app')
@section('content')
    <br><br><br><br><br><br><br><br>
    <h1 class="text-center py-5">institutions dashboard</h1>
    <div class="container">

        <div class="d-flex">
            <div class="p-2">
                <a class="btn btn-md btn-primary" href="{{ route('admin.institutions.create') }}">Create</a>
            </div>
            <div class="ms-auto p-2">
                <button id="export-btn" class="btn btn-sm btn-success">Export to xlsx <i class="bi bi-file-spreadsheet"></i>
                </button>
            </div>
            <div class="p-2">
                <button id="export-btn-csv" class="btn btn-sm btn-success">Export to csv <i
                        class="bi bi-file-earmark-spreadsheet"></i></button>
            </div>
            <div class="p-2">
                <button id="export-btn-pdf" class="btn btn-sm btn-danger">Export to pdf <i
                        class="bi bi-file-earmark-pdf"></i></button>
            </div>
        </div>


        <table class="table table-image">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">Country</th>
                <th scope="col">Contract from</th>
                <th scope="col">Contract to</th>
                <th scope="col">Type</th>
            </tr>
            </thead>
            <tbody>
            @foreach($institutions as $institution)
                <tr>
                    <th>{{ $institution->id }}</th>
                    <td class="w-25 align-middle">
                        <img src="{{ $institution->url_fotka }}" class="img-fluid img-thumbnail" alt="Institution photo">

                    </td>
                    <td class="align-middle">{{ $institution->nazov }}</td>
                    <td class="align-middle">{{ $institution->mesto }}</td>
{{--                    <td>{{ $institution->krajina }}</td>--}}
                    <td class="align-middle">Slovensko</td>
                    <td class="align-middle">{{ $institution->zmluva_od }}</td>
                    <td class="align-middle">{{ $institution->zmluva_do }}</td>
                    <td class="align-middle">Lorem</td>
{{--                    <td>{{ $institution->institucia }}</td>--}}
                    <td class="align-middle">
                        <a class="btn btn-sm btn-outline-success" href="{{ url('admin.institutions.edit/'.$institution->id) }}">E</a>
                        <form method="post"  class="d-inline-block" action="{{ route('admin.institutions.destroy', $institution->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">X</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br><br><br><br><br><br><br><br>
@endsection
