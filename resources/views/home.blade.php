@extends('layouts.app')

@section('third_party_stylesheets')
    @include('layouts.datatables_css')
@endsection

@section('content')
<div class="content px-3">
    <div class="row pt-3">
        <!-- Small boxes (Stat box) -->

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $jumlahPembelianBarang }}</h3>

                    <p>Jumlah Pembelian Barang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ "Rp".number_format($jumlahUangKeluar, 0, 0, ".") }}</h3>

                    <p>Jumlah Uang Keluar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ "Rp".number_format($jumlahUangDiluar, 0, 0, ".") }}</h3>

                    <p>Jumlah Uang Diluar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        
    </div>
    <div class="clearfix"></div>
    <div class="card">
        <div class="card-header">
            <h5>Informasi Stok Barang</h5>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Jumlah Barang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stokBarangs as $key => $stok)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $stok->barang->kode_barang }}</td>
                        <td>{{ $stok->barang->nama_barang }}</td>
                        <td>{{ "Rp".number_format($stok->barang->harga_barang, 0, 0, ".") }}</td>
                        <td>{{ "Rp".number_format($stok->harga_jual, 0, 0, ".") }}</td>
                        <td>{!! $stok->cekStok($stok->qty) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row mt-3 float-right">
                <div class="col-md-12">
                    {{ $stokBarangs->links() }}
                </div>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="card">
        <div class="card-header">
            <h5>Informasi Login</h5>
        </div>
        <div class="card-body p-3">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>IP Address</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($logs as $key => $log)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $log->user->name }}</td>
                        <td>{{ $log->ip }}</td>
                        <td>{{ date('d-m-Y H:i', strtotime($log->created_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
@push('third_party_scripts')
    @include('layouts.datatables_js')
@endpush
