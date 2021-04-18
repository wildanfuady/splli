<!-- Nama Konsumen Field -->
<div class="col-sm-12">
    {!! Form::label('nama_konsumen', 'Nama Konsumen:') !!}
    <p>{{ $uangDiluar->nama_konsumen }}</p>
</div>

<!-- Hp Konsumen Field -->
<div class="col-sm-12">
    {!! Form::label('hp_konsumen', 'Hp Konsumen:') !!}
    <p>{{ $uangDiluar->hp_konsumen }}</p>
</div>

<!-- Jumlah Tagihan Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah_tagihan', 'Jumlah Tagihan 1:') !!}
    <p>{{ "Rp".number_format($uangDiluar->jumlah_tagihan,0,0,".") }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('jumlah_tagihan2', 'Jumlah Tagihan 2:') !!}
    <p>{{ "Rp".number_format($uangDiluar->jumlah_tagihan2,0,0,".") }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('jumlah_tagihan3', 'Jumlah Tagihan 3:') !!}
    <p>{{ "Rp".number_format($uangDiluar->jumlah_tagihan3,0,0,".") }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('jumlah_tagihan4', 'Jumlah Tagihan 4:') !!}
    <p>{{ "Rp".number_format($uangDiluar->jumlah_tagihan4,0,0,".") }}</p>
</div>

<div class="col-sm-12">
    {!! Form::label('jumlah_tagihan5', 'Jumlah Tagihan 5:') !!}
    <p>{{ "Rp".number_format($uangDiluar->jumlah_tagihan5,0,0,".") }}</p>
</div>

<!-- Jumlah Hutang Field -->
<div class="col-sm-12">
    {!! Form::label('jumlah_hutang', 'Jumlah Hutang:') !!}
    <p>{{ "Rp".number_format($uangDiluar->jumlah_hutang,0,0,".") }}</p>
</div>

<!-- Sisa Hutang Field -->
<div class="col-sm-12">
    {!! Form::label('sisa_hutang', 'Sisa Hutang:') !!}
    <p>{{ "Rp".number_format($uangDiluar->sisa_hutang,0,0,".") }}</p>
</div>

<!-- Keterangan Field -->
<div class="col-sm-12">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{{ $uangDiluar->keterangan }}</p>
</div>

