<!-- Tanggal Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::text('tanggal', null, ['class' => 'form-control tanggal', 'placeholder' => 'dd-mm-yyyy hh:mm']) !!}
</div>

<!-- Plat Motor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plat_motor', 'Plat Motor:') !!}
    {!! Form::text('plat_motor', null, ['class' => 'form-control', 'placeholder' => 'Masukan plat nomor']) !!}
</div>

<!-- Nama Konsumen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_konsumen', 'Nama Konsumen:') !!}
    {!! Form::text('nama_konsumen', null, ['class' => 'form-control', 'placeholder' => 'Masukan nama konsumen']) !!}
</div>

<!-- Nama Sparepart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama_sparepart', 'Nama Sparepart:') !!}
    @foreach ($barangs as $item)
    <select name="barang_id" id="barang_id" class="form-control select2bs4" onchange="changeBarangItem(value);">
        <option value="">Pilih Barang</option>
        @foreach($barangs as $item)
        <option value="{{ $item->id }}" @php echo ($isEdit && $item->id == $pembayaran->barang_id) ? "selected" : "" @endphp>{{ $item->kode_barang.' - '.$item->nama_barang }}</option>
        @endforeach
    </select>
    @endforeach
</div>

<!-- Harga Grosir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_grosir', 'Harga Grosir:') !!}
    <small class="text-danger">Dari harga beli di menu barang</small>
    {!! Form::number('harga_grosir', null, ['class' => 'form-control', 'placeholder' => '0','readonly', 'id' => 'harga_grosir']) !!}
</div>

<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    <small class="text-danger">Dari harga jual di menu stok barang</small>
    {!! Form::number('harga_jual', null, ['class' => 'form-control', 'placeholder' => '0', 'readonly', 'id' => 'harga_jual']) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    <small class="text-danger">Tidak boleh melebihi jumlah stok barang. <span id="text_qty"></span></small>
    {!! Form::number('qty', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'qty']) !!}
</div>

<!-- Harga Pasang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_pasang', 'Harga + Pasang:') !!}
    {!! Form::number('harga_pasang', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
</div>

<!-- Jasa Service Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jasa_service', 'Jasa Service:') !!}
    {!! Form::number('jasa_service', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
</div>

<!-- Total Harga Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_harga', 'Total Harga:') !!}
    <small class="text-danger">Hasil = Total harga pasang + Jasa Service</small>
    {!! Form::number('total_harga', null, ['class' => 'form-control', 'placeholder' => '0', 'id' => 'total_harga']) !!}
</div>

<!-- Selisih Field -->
<div class="form-group col-sm-6">
    {!! Form::label('selisih', 'Selisih:') !!}
    <small class="text-danger">Hasil = Total harga - modal</small>
    {!! Form::number('selisih', null, ['class' => 'form-control', 'placeholder' => '0']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tanggal').datetimepicker({
                format: 'DD-MM-YYYY hh:mm',
                useCurrent: true,
                sideBySide: true
            });
            $('.select2bs4').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih Barang'
            });
        });
        function changeBarangItem(i) {
            var url = "{{ url('api/pembayaran/find_barang/') }}";
            console.log(url);
            $.ajax({
                type: 'GET',
                url: url + '/' + i,
                success: function (data) {
                    console.log(data);

                    if(data != null){
                    // clear data
                        $('#harga_grosir').val(' ');
                        $('#harga_jual').val(' ');
                        $('#qty').val(' ');
                        $('#text_qty').val('');

                        // change data
                        $('#harga_grosir').val(data.barang.harga_barang);
                        $('#harga_jual').val(data.harga_jual);
                        $('#qty').attr('max', data.qty);
                        $('#text_qty').html('<b>Saat ini stok barang ada ' + data.qty + ' pcs.</b>');
                    } else {
                        $('#harga_grosir').val(' ');
                        $('#harga_jual').val(' ');
                        $('#qty').val(' ');
                        $('#text_qty').val('');
                    }
                }
            });
        }
        
    </script>
@endpush