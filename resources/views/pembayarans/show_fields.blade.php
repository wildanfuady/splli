<!-- Id Po Field -->
<div class="col-sm-12">
    {!! Form::label('id_po', 'Id Po:') !!}
    <p>{{ $pembayaran->id_po }}</p>
</div>

<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ date('d-m-Y H:i', strtotime($pembayaran->tanggal)) }}</p>
</div>

<!-- Plat Motor Field -->
<div class="col-sm-12">
    {!! Form::label('plat_motor', 'Plat Motor:') !!}
    <p>{{ $pembayaran->plat_motor }}</p>
</div>

<!-- Nama Konsumen Field -->
<div class="col-sm-12">
    {!! Form::label('nama_konsumen', 'Nama Konsumen:') !!}
    <p>{{ $pembayaran->nama_konsumen }}</p>
</div>

<!-- Nama Sparepart Field -->
<div class="col-sm-12">
    {!! Form::label('nama_sparepart', 'Nama Sparepart:') !!}
    <p>{{ $pembayaran->barang->nama_barang }}</p>
</div>

<!-- Harga Grosir Field -->
<div class="col-sm-12">
    {!! Form::label('harga_grosir', 'Harga Grosir:') !!}
    <p>{{ "Rp".number_format($pembayaran->harga_grosir,0,0,".") }}</p>
</div>

<!-- Harga Jual Field -->
<div class="col-sm-12">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    <p>{{ "Rp".number_format($pembayaran->harga_jual,0,0,".") }}</p>
</div>

<!-- Qty Field -->
<div class="col-sm-12">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $pembayaran->qty }}</p>
</div>

<!-- Harga Pasang Field -->
<div class="col-sm-12">
    {!! Form::label('harga_pasang', 'Harga Pasang:') !!}
    <p>{{ "Rp".number_format($pembayaran->harga_pasang,0,0,".") }}</p>
</div>

<!-- Jasa Service Field -->
<div class="col-sm-12">
    {!! Form::label('jasa_service', 'Jasa Service:') !!}
    <p>{{ "Rp".number_format($pembayaran->jasa_service,0,0,".") }}</p>
</div>

<!-- Total Harga Field -->
<div class="col-sm-12">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    <p>{{ "Rp".number_format($pembayaran->total_harga,0,0,".") }}</p>
</div>

<!-- Selisih Field -->
<div class="col-sm-12">
    {!! Form::label('selisih', 'Selisih:') !!}
    <p>{{ "Rp".number_format($pembayaran->selisih,0,0,".") }}</p>
</div>