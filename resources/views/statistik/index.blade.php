@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Statistik</h1>

        <div class="row">
            <div class="col-md-6">
                <h2>Penjualan</h2>
                <canvas id="chartPenjualan"></canvas>
            </div>

            <div class="col-md-6">
                <h2>Produk Terlaris</h2>
                <ul>
                    @foreach ($data['produkTerlaris'] as $produk)
                        <li>{{ $produk->nama_menu }} - Terjual: {{ $produk->terjual }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <h2>Pendapatan</h2>
                <ul>
                    <li>Makanan: Rp {{ number_format($data['pendapatanMakanan'], 2) }}</li>
                    <li>Minuman: Rp {{ number_format($data['pendapatanMinuman'], 2) }}</li>
                </ul>
            </div>

            <div class="col-md-6">
                <h2>Kinerja User</h2>
                <ul>
                    @foreach ($data['kinerjaUser'] as $user)
                        <li>{{ $user->nama }} - Pesanan diambil: {{ $user->pesanan_diambil }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script>        const ctx = document.getElementById('chartPenjualan').getContext('2d');
        const labels = ['Harian', 'Mingguan', 'Bulanan'];
        const data = {
          labels: labels,
          datasets: [{
            label: 'Penjualan',
            data: [100, 200, 300],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
              'rgb(255, 206, 86)'
            ],
            borderWidth: 1
          }]
        };
        
        const myChart = new Chart(ctx, {
          type: 'bar',
          data: data,
          options: {
            title: {
              text: 'Statistik Penjualan'
            },
            legend: {
              position: 'bottom'
            },
            tooltips: {
              enabled: true,
              callbacks: {
                title: function(tooltipItem) {
                  return tooltipItem.dataset.label;
                },
                label: function(tooltipItem) {
                  return tooltipItem.yLabel;
                }
              }
            }
          }
        }); </script>
@endsection