<!-- Kode Barang Field -->
<div class="col-sm-12">
    {!! Form::label('kode_barang', 'Kode Barang:') !!}
    <p>{{ $barang->kode_barang }}</p>
</div>

<!-- Tanggal Pembelian Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_pembelian', 'Tanggal Pembelian:') !!}
    <p>{{ $barang->tanggal_pembelian }}</p>
</div>

<!-- Nama Barang Field -->
<div class="col-sm-12">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    <p>{{ $barang->nama_barang }}</p>
</div>

<!-- Harga Barang Field -->
<div class="col-sm-12">
    {!! Form::label('harga_barang', 'Harga Barang:') !!}
    <p>{{ "Rp".number_format($barang->harga_barang, 0, 0, ".") }}</p>
</div>

<!-- Qty Pembalian Field -->
<div class="col-sm-12">
    {!! Form::label('qty_pembalian', 'Qty Pembelian:') !!}
    <p>{{ $barang->qty_pembelian }}</p>
</div>

<!-- Nama Pic Field -->
<div class="col-sm-12">
    {!! Form::label('nama_pic', 'Nama PIC:') !!}
    <p>{{ $barang->nama_pic }}</p>
</div>

