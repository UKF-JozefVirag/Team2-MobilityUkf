@extends('layouts.app')
@section('content')
<br><br><br><br><br><br><br><br>
    <h1 class="text-center py-5">users dashboard</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-success" href="{{ url('admin.dashboard.edit/'.$user->id) }}">E</a>
                        <form method="post"  class="d-inline-block" action="{{ route('admin.dashboard.destroy', $user->id) }}">
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
<br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
