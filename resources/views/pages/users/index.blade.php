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
                        <a href="#" class="btn btn-primary">Tambah User</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
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