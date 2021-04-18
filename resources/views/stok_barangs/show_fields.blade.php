<!-- Barang Id Field -->
<div class="col-sm-12">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    <p>{{ $stokBarang->barang->nama_barang }}</p>
</div>

<!-- Harga Jual Field -->
<div class="col-sm-12">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    <p>{{ "Rp".number_format($stokBarang->harga_jual,0,0,".") }}</p>
</div>

<!-- Qty Field -->
<div class="col-sm-12">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $stokBarang->qty }}</p>
</div>

