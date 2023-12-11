<!-- resources/views/home/index.blade.php -->

@extends('layouts.app')

@section('content')
    {{-- <div class="container-fluid"> --}}
        <div class="card-deck mb-4">    
            <div class="card gradient-1-text shadow-lg">
                <div class="card-header">
                    <h3 class="text-center">Profil User</h3>
                </div>
                <div class="container-fluid">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">Nama</th>
                                <td class="text-center">{{ $userInfo->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">Email</th>
                                <td class="text-center">{{ $userInfo->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">Sebagai</th>
                                <td class="text-center">{{ $userInfo->role }}</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">Sejak</th>
                                <td class="text-center">{{ $userInfo->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="container">
                <div class="card gradient-2-text shadow-lg">
                    <div class="card-header">
                        <h3 class="text-center">Produk yang Sering Dilayani</h3>
                    </div>
                    <div class="card-body">
                        @if(count($produkTerlayani) > 0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nama Produk</th>
                                        <th class="text-center">Jumlah Layanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produkTerlayani as $produk)
                                        <tr>
                                            <td class="text-center">{{ $produk->nama_produk }}</td>
                                            <td class="text-center">{{ $produk->jumlah_layanan }} kali</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p class="text-center text-muted">Belum ada data produk yang dilayani.</p>
                        @endif
                    </div>
                </div>
            </div>            
        </div>
    {{-- </div> --}}
@endsection
