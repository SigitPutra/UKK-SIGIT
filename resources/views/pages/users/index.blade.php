@extends('main')
@section('title', '| User')
@section('breadcrumb1', 'User')
@section('breadcrumb2', 'User')

@section('content')
<div class="row">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @if($users->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data user.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://45.64.100.26:88/ukk-kasir/public/plugins/swal2.js"></script>
<script>
    function notif(type, msg) {
        Swal.fire({
            icon: type,
            text: msg
        })
    }
    @if(session('success'))
        notif('success', "{{ session('success') }}")
    @endif
    @if(session('error'))
        notif('error', "{{ session('error') }}")
    @endif
</script>
@endsection
