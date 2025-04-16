@extends('main')
@section('title', '| Produk')
@section('breadcrumb1', 'Produk')
@section('breadcrumb2', 'Produk')

@section('content')
    <div class="row">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <!-- Conditional check for role (if not 'petugas') -->
                    @if(Auth::user()->role == 'admin')
                        <div class="d-flex justify-content-end mb-3">
                            <a href="#" class="btn btn-primary">Tambah Produk</a>
                        </div>
                    @endif              
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td style="width:100px"><img src="{{ asset('storage/img/' . $product->img) }}"
                                            alt="" width="100%"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @if (Auth::user()->role == 'admin')
                                            
                                        <a href="#" class="btn btn-sm" 
                                            style="background-color: #fbc02d; color: white;">Edit</a>
                                            <button type="button" class="btn btn-sm" style="background-color: #039be5; color: black;" 
                                            data-bs-toggle="modal" data-bs-target="#updateStockModal{{ $product->id }}">
                                            Update Stok
                                        </button>
                                        <form action="#" method="POST" style="display: inline;" 
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" style="background-color: #ff5252; color: black;">Hapus</button>
                                        </form>
                                    </td>                                    
                                </tr>
                                @endif
                                <!-- Modal harus ada di dalam looping -->
                                <div class="modal fade" id="updateStockModal{{ $product->id }}" tabindex="-1"
                                    aria-labelledby="updateStockLabel{{ $product->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateStockLabel{{ $product->id }}">Update
                                                    Stok</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="#" method="POST">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
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
