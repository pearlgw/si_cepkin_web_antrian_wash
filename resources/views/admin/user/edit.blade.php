@extends('admin.index')

@section('contentsAdmin')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Edit User</h1>
    </div>
    <form action="/users/{{ $userr->id }}" method="POST" style="width: 50%">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                placeholder="Masukan Nama Anda" value="{{ old('name', $userr->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="Masukan email Anda" id="email" value="{{ old('email', $userr->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                placeholder="Masukan Password Anda" id="password" value="{{ old('password', $userr->password) }}">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="no_telp" class="form-label">No Telepon</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">+62</span>
                <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                    placeholder="812345678910" name="no_telp" value="{{ old('no_telp', $userr->no_telp) }}">
                @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role_id" required>
                @foreach ($roles as $role)
                    @if (old('role_id', $userr->role_id) == $role->id)
                        <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Perbarui Data</button>
    </form>
@endsection
