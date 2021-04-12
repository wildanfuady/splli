<!-- Tanggal Pembelian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_pembelian', 'Tanggal Pembelian:') !!}
    {!! Form::text('tanggal_pembelian', null, ['class' => 'form-control', 'id' => 'tanggal_pembelian', 'placeholder' => 'dd-mm-yyyy']) !!}
</div>

<!-- Kode Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kode_barang', 'Kode Barang:') !!}
    {!! Form::text('kode_barang', null, ['class' => 'form-control', 'placeholder' => 'Masukan kode barang']) !!}
</div>

<!-- Nama Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_barang', 'Nama Barang:') !!}
    {!! Form::text('nama_barang', null, ['class' => 'form-control', 'placeholder' => 'Masukan nama barang']) !!}
</div>

<!-- Harga Barang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_barang', 'Harga Barang:') !!}
    {!! Form::number('harga_barang', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
</div>

<!-- Qty Pembalian Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty_pembelian', 'Qty Pembelian:') !!}
    {!! Form::number('qty_pembelian', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
</div>

<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    {!! Form::number('harga_jual', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
</div>

<!-- Nama Pic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_pic', 'Nama PIC:') !!}
    {!! Form::text('nama_pic', null, ['class' => 'form-control', 'placeholder' => 'Masukan nama PIC']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#tanggal_pembelian').datetimepicker({
            format: 'DD-MM-YYYY',
            useCurrent: true,
            sideBySide: true
        });
    </script>
@endpush