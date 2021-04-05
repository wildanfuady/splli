<!-- Barang Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Pilih Barang:') !!}
    <select name="barang_id" id="barang_id" class="form-control select2bs4">
        <option value="">Pilih Barang</option>
        @foreach($barangs as $item)
        <option value="{{ $item->id }}" @php echo ($isEdit && $item->id == $stokBarang->barang_id) ? "selected" : "" @endphp>{{ $item->kode_barang.' - '.$item->nama_barang.' - Qty: '.$item->qty_pembelian.' - Harga: Rp'.number_format($item->harga_barang, 0, 0, ".") }}</option>
        @endforeach
    </select>
</div>


<!-- Harga Jual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    {!! Form::text('harga_jual', null, ['class' => 'form-control', 'placeholder' => 0]) !!}
</div>

<!-- Qty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('qty', 'Qty:') !!}
    {!! Form::text('qty', null, ['class' => 'form-control', 'placeholder' => 0]) !!}
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