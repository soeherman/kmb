@extends('index')
@section('konten')
<!-- Main content -->
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-danger">
            <h4><i class="icon fa fa-info"></i> Info!</h4>
                - Klik nama pengiriman untuk mengatur kiriman <br>
                - Daftar dibawah adalah daftar pengeluaran barang dari barang yang ditolak<br>
        </div>
    </div>
    <div class="col-xs-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Daftar Pengeluaran Barang</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive daftarkiriman">
                
            </div>
        </div>
        </div>
    </div>
</div>

</section>
@endsection
@section('scripts')
    @parent
    {!! Html::script('js/fungsiloading.js')!!}
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var url = url_local+"/kmb/public/permintaankeluar/data";
        $(".daftarkiriman").load(url);
	});
</script>
@stop