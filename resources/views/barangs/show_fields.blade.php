<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $barang->id }}</p>
</div>

<!-- Tanggal Pembelian Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal_pembelian', 'Tanggal Pembelian:') !!}
    <p>{{ $barang->tanggal_pembelian }}</p>
</div>

<!-- Kode Barang Field -->
<div class="col-sm-12">
    {!! Form::label('kode_barang', 'Kode Barang:') !!}
    <p>{{ $barang->kode_barang }}</p>
</div>

<!-- Nama Barang Field -->
<div class="col-sm-12">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    <p>{{ $barang->nama_barang }}</p>
</div>

<!-- Harga Barang Field -->
<div class="col-sm-12">
    {!! Form::label('harga_barang', 'Harga Barang:') !!}
    <p>{{ $barang->harga_barang }}</p>
</div>

<!-- Qty Pembalian Field -->
<div class="col-sm-12">
    {!! Form::label('qty_pembalian', 'Qty Pembalian:') !!}
    <p>{{ $barang->qty_pembalian }}</p>
</div>

<!-- Nama Pic Field -->
<div class="col-sm-12">
    {!! Form::label('nama_pic', 'Nama Pic:') !!}
    <p>{{ $barang->nama_pic }}</p>
</div>

