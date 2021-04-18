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
    <p>{{ "Rp".number_format($uangKeluar->harga,0,0,".") }}</p>
</div>

<!-- Total Harga Field -->
<div class="col-sm-12">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    <p>{{ "Rp".number_format($uangKeluar->total_harga,0,0,".") }}</p>
</div>

