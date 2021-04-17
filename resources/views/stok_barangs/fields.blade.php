<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Nama Barang:') !!}
    {!! Form::text('barang_id', $stokBarang->barang->nama_barang, ['class' => 'form-control', 'placeholder' => 'Masukan nama barang', 'disabled']) !!}
</div>


<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    {!! Form::text('harga_jual', null, ['class' => 'form-control', 'placeholder' => 0]) !!}
</div>

<div class="form-group col-sm-12">
<h4>Update Stok</h4>
<hr>
<div class="alert alert-info">
    <p>Tidak perlu diisi sama sekali jika hanya ingin mengubah harga jual saja. Namun, silahkan pilih salah satu kolom di bawah ini jika ingin mengubah jumlah stok:</p>
    <ol>
        <li>Isi bagian tambah stok jika ingin menambah jumlah stok.</li>
        <li>Isi bagian stok keluar jika ingin mengurangi stok.</li>
        <li>Tidak boleh mengisi kolom tambah stok dan stok keluar secara bersamaan.</li>
        <li>Jika stok keluar diisi, tidak boleh lebih dari jumlah stok saat ini.</li>
    </ol>
</div>
</div>
<!-- Jumlah Stok Saat Ini Field -->
<div class="form-group col-sm-4">
    {!! Form::label('qty', 'Jumlah Stok Saat Ini:') !!}
    {!! Form::number('qty', null, ['class' => 'form-control', 'placeholder' => 0, 'disabled']) !!}
</div>

<!-- Tambah Jumlah Stok Field -->
<div class="form-group col-sm-4">
    {!! Form::label('tambah_stok', 'Stok Masuk:') !!}
    {!! Form::number('tambah_stok', null, ['class' => 'form-control', 'placeholder' => 0]) !!}
</div>

<!-- Kurangi Jumlah Stok Field -->
<div class="form-group col-sm-4">
    {!! Form::label('keluar_stok', 'Stok Keluar:') !!}
    {!! Form::number('keluar_stok', null, ['class' => 'form-control', 'placeholder' => 0, 'max' => $stokBarang->qty]) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih Barang'
            });
        });
    </script>
@endpush