<!-- Pembayaran Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pembayaran_id', 'Pembayaran Id:') !!}
    {!! Form::select('pembayaran_id', ['s' => 's'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Uang Keluar Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uang_keluar_id', 'Uang Keluar Id:') !!}
    {!! Form::select('uang_keluar_id', ['s' => 's'], null, ['class' => 'form-control custom-select']) !!}
</div>


<!-- Keterangan Field -->
<div class="form-group col-sm-6">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    {!! Form::text('keterangan', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Saldo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_saldo', 'Total Saldo:') !!}
    {!! Form::number('total_saldo', null, ['class' => 'form-control']) !!}
</div>