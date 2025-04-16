@extends('main')
@section('title', '| Dashboard')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Selamat Datang, Administator!</h4>
                            </div>
                        </div>
                        <!-- Chart Container -->
                        <canvas id="salesChart" style="height: 350px;"></canvas>
                        <!-- Chart.js Script -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script>
                            const ctx = document.getElementById('salesChart').getContext('2d');
                            const salesChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['08 February 2025', '09 February 2025', '10 February 2025', '11 February 2025'],
                                    datasets: [{
                                        label: 'Jumlah Penjualan',
                                        data: [5, 15, 75, 60],  // Replace this with dynamic data if needed
                                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                        <script src="http://45.64.100.26:88/ukk-kasir/public/plugins/swal2.js"></script>
                        <script>
                            function notif(type, msg) {
                                Swal.fire({
                                    icon: type,
                                    text: msg
                                })
                            }
                            @if (session('success'))
                                notif('success', "{{ session('success') }}")
                            @endif
                            @if (session('error'))
                                notif('error', "{{ session('error') }}")
                            @endif
                        </script>
                        
                        @else
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Selamat Datang, Petugas!</h3>
                                        <div class="card d-block text-center" style="max-width: 100%; margin: auto;">
                                            <div class="card-header">
                                                Total Penjualan Hari Ini
                                            </div>
                                            <div class="card-body">
                                                <h3 class="card-title font-weight: 20px">31</h3> <!-- Adjusted the number to match your screenshot -->
                                                <p class="card-text">Jumlah total penjualan yang terjadi hari ini.</p>
                                            </div>
                                            <div class="card-footer text-muted">
                                                Terakhir diperbarui: 11 Feb 2025 14:24
                                            </div>
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
                            @if (session('success'))
                                notif('success', "{{ session('success') }}")
                            @endif
                            @if (session('error'))
                                notif('error', "{{ session('error') }}")
                            @endif
                        </script>
                </div>
            </div>
        </div>
    </div>

@endsection
