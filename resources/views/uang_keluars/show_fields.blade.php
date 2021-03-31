<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $uangKeluar->id }}</p>
</div>

<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $uangKeluar->tanggal }}</p>
</div>

<!-- Qty Field -->
<div class="col-sm-12">
    {!! Form::label('qty', 'Qty:') !!}
    <p>{{ $uangKeluar->qty }}</p>
</div>

<!-- Harga Field -->
<div class="col-sm-12">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{{ $uangKeluar->harga }}</p>
</div>

<!-- Total Harga Field -->
<div class="col-sm-12">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    <p>{{ $uangKeluar->total_harga }}</p>
</div>

