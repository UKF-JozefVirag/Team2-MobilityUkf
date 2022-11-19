@extends('layouts.app')
@section('content')

    <section class="section-dashboard-title">
        <div class="container">
            <h1 class="text-center py-5">Dashboard administrátora</h1>
        </div>
    </section>
    <section class="section-dashboard-table-users">
        <div class="container container-table py-3 px-5">
            <div class="container container-table-title px-0 pb-2">
                <div class="row">
                    <div class="col-md-6" style="text-align: left">
                        <h3>Používatelia</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        <button id="btn-export-xlsx" class="btn btn-dark btn-export" onclick="ExportToExcel('xlsx')">Export do xlsx</button>
                    </div>
                    <div class="col-md-2 text-center">
                        <button id="btn-export-csv" class="btn btn-dark btn-export" onclick="ExportToCsv('csv')">Export do csv</button>
                    </div>
                    <div class="col-md-2 text-left">
                        <button id="btn-export-pdf" class="btn btn-dark btn-export" onclick="ExportToPDF()"  >Export do pdf</button>
                    </div>
{{--                    <div class="col-lg-3" style="text-align: right">--}}
{{--                        <a id="new-institution" type="button" class="btn btn-dark" data-toggle=modal">Vytvoriť nového používateľa</a>--}}
{{--                    </div>--}}
                </div>
            </div>

            <table class="table" id ="pouzivateliaExport">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Meno</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rola</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form method="POST"  class="d-inline-block" action="{{ route('admin.users.destroy', $user->id) }}">
                                <a data-toggle="modal" data-target="#editUserModal" id="editUserButton" data-attr="{{ route('admin.users.edit', $user->id) }}">
                                    <i class="fa fa-pencil fa-2x"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background: transparent" onclick="return confirm('Naozaj chcete vymazať daného používateľa?')"><i class="fa fa-trash fa-2x"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <section id="institution-table" class="section-dashboard-table-users my-5">
        <div class="container container-table py-3 px-5">
            <div class="container container-table-title px-0 pb-2">
                <div class="row">
                    <div class="col-md-3" style="text-align: left">
                        <h3>Inštitúcie</h3>
                    </div>
                    <div class="col-md-2 text-right">
                        <button id="btn-export-xlsx" class="btn btn-dark btn-export" onclick="ExportToExcel('tblExport','xlsx')">Export do xlsx</button>
                    </div>
                    <div class="col-md-2 text-center">
                        <button id="btn-export-csv" class="btn btn-dark btn-export" onclick="ExportToCsv('tblExport','csv')">Export do csv</button>
                    </div>
                    <div class="col-md-2 text-left">
                        <button id="btn-export-pdf" class="btn btn-dark btn-export" onclick="ExportToPDF('tblExport')"  >Export do pdf</button>
                    </div>
                    <div class="col-md-3" style="text-align: right">
                        <a id="new-institution" type="button" class="btn btn-dark" data-toggle=modal">Vytvoriť novú inštitúciu</a>
                    </div>
                </div>
            </div>
            <table class="table" id ="tblExport">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fotka</th>
                    <th scope="col">Názov</th>
                    <th scope="col">Mesto</th>
                    <th scope="col">Krajina</th>
                    <th scope="col">Typ</th>
                    <th scope="col">Od</th>
                    <th scope="col">Do</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($institutions as $institution)
                    <tr>
                        <th scope="row">{{ $institution->id }}</th>
                        <td>
                            <img src="{{ asset('institucie/'.$institution->url_fotka) }}" alt="fotka" width="150px;" />
                        </td>
                        <td>{{ $institution->nazov }}</td>
                        <td>{{ $institution->mesto }}</td>
                        <td>{{ $institution->krajina->nazov}}</td>
                        <td>{{ $institution->typ_institucie->nazov}}</td>
                        <td>{{ $institution->zmluva_od }}</td>
                        <td>{{ $institution->zmluva_do }}</td>
                        <td>
                            <form method="POST"  class="d-inline-block" action="{{ route('admin.institutions.destroy', $institution->id) }}">
                                <a data-toggle="modal" data-target="#editInstitutionModal" id="editInstitutionButton" data-attr="{{ route('admin.institutions.edit', $institution->id) }}">
                                    <i class="fa fa-pencil fa-2x"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background: transparent" onclick="return confirm('Naozaj chcete vymazať danú výzvu?')"><i class="fa fa-trash fa-2x"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Add new institution modal -->
    <div class="modal fade" id="new-institution-modal" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Pridať novú výzvu</strong></h5>
                </div>
                <div class="modal-body">
                    <form name="userForm" action="{{ route('admin.institutions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nazov" class="form-label">Názov inštitúcie</label>
                            <input type="text" name="nazov" class="form-control" id="nazov">
                        </div>
                        <div class="mb-3">
                            <label for="mesto" class="form-label">Mesto</label>
                            <input type="text" name="mesto" class="form-control" id="mesto">
                        </div>
                        <div class="mb-3">
                            <label for="zmluva_od" class="form-label">Zmluva s univerzitou od</label>
                            <input type="date" name="zmluva_od" class="form-control" id="zmluva_od">
                        </div>
                        <div class="mb-3">
                            <label for="zmluva_do" class="form-label">Zmluva s univerzitou do</label>
                            <input type="date" name="zmluva_do" class="form-control" id="zmluva_do">
                        </div>
                        <div class="mb-3">
                            <label for="url_fotka" class="form-label">Url adresa obrázka</label>
                            <input type="text" name="url_fotka" class="form-control" id="url_fotka">
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="typ_institucie_id">Typ inštitúcie</label>
                                <select class="custom-select custom-select-md" id="typ_institucie_id" name="typ_institucie_id" style="width: 100%">
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">
                                            {{ $type->nazov }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="krajina_idkrajina">Krajina</label>
                                <select class="custom-select custom-select-md" id="krajina_idkrajina" name="krajina_idkrajina">
                                    @foreach($countries as $country)
                                        <option value="{{ $country->idkrajina }}">
                                            {{ $country->nazov }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn">Uložiť</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit modal institutions -->
    <div class="modal fade" id="editInstitutionModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Zmeniť záznam inštitúcie</strong></h5>
                </div>
                <div class="modal-body" id="editInstitutionBody">
                    <!-- everything what is in institutions_create_edit.blade -->
                </div>
            </div>
        </div>
    </div>

    <!-- Edit modal users -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Zmeniť záznam používateľa</strong></h5>
                </div>
                <div class="modal-body" id="editUserBody">
                    <!-- everything what is in users_create_edit.blade -->
                </div>
            </div>
        </div>
    </div>
@endsection
