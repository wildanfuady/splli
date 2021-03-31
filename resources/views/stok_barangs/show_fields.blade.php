<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $stokBarang->id }}</p>
</div>

<!-- Barang Id Field -->
<div class="col-sm-12">
    {!! Form::label('barang_id', 'Barang Id:') !!}
    <p>{{ $stokBarang->barang_id }}</p>
</div>

<!-- Harga Jual Field -->
<div class="col-sm-12">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    <p>{{ $stokBarang->harga_jual }}</p>
</div>

<!-- Qty Field -->
<div class="col-sm-12">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $stokBarang->qty }}</p>
</div>

