<div class="modal-body">
    <form method="POST" action="{{ $user->exists ? route('admin.users.update', $user->id) : route('admin.users.store') }}">
        @csrf
        @if($user->exists)
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Meno používateľa</label>
            <input type="text" value="{{old('name', $user->name)}}" name="name" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email používateľa</label>
            <input type="email" value="{{old('email', $user->email)}}" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rola používateľa</label>
            <input type="text" value="{{old('role', $user->role)}}" name="role" class="form-control" id="role">
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <button type="submit" class="btn btn-primary">Zmeniť údaje</button>
            </div>
        </div>
    </form>
</div>

