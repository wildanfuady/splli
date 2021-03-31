<!-- Nama Konsumen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_konsumen', 'Nama Konsumen:') !!}
    {!! Form::text('nama_konsumen', null, ['class' => 'form-control']) !!}
</div>

<!-- Hp Konsumen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hp_konsumen', 'Hp Konsumen:') !!}
    {!! Form::text('hp_konsumen', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Tagihan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_tagihan', 'Jumlah Tagihan:') !!}
    {!! Form::text('jumlah_tagihan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jumlah Hutang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jumlah_hutang', 'Jumlah Hutang:') !!}
    {!! Form::text('jumlah_hutang', null, ['class' => 'form-control']) !!}
</div>

<!-- Sisa Hutang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sisa_hutang', 'Sisa Hutang:') !!}
    {!! Form::text('sisa_hutang', null, ['class' => 'form-control']) !!}
</div>

<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>