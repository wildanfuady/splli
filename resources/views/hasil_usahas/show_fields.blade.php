<!-- Tanggal Field -->
<div class="col-sm-12">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    <p>{{ $hasilUsaha->tanggal }}</p>
</div>

<!-- Total Saldo Field -->
<div class="col-sm-12">
    {!! Form::label('uang_masuk', 'Total Saldo:') !!}
    <p>{{ "Rp".number_format($hasilUsaha->uang_masuk,0,0,".") }}</p>
</div>

<!-- Total Saldo Field -->
<div class="col-sm-12">
    {!! Form::label('uang_keluar', 'Total Saldo:') !!}
    <p>{{ "Rp".number_format($hasilUsaha->uang_keluar,0,0,".") }}</p>
</div>

<!-- Total Saldo Field -->
<div class="col-sm-12">
    {!! Form::label('total_saldo', 'Total Saldo:') !!}
    <p>{{ "Rp".number_format($hasilUsaha->total_saldo,0,0,".") }}</p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $hasilUsaha->keterangan }}</p>
</div>