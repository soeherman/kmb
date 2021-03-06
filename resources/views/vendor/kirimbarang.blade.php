@extends('index')
@section('konten')
<style type="text/css">
.no-border {
    border: 0;
    box-shadow: none; /* You may want to include this as bootstrap applies these styles too */
}
</style>
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
<div class="row">
  <div class="col-md-12">
    @if($jenis == "po")
      <div class="callout callout-danger">
            <h4><i class="icon fa fa-ban"></i> Pengiriman Barang PO</h4>
                - Isi tiap tab minimal dengan satu data <br>
                - Tombol kirim akan muncul jika data sudah lengkap<br>
      </div>
    @else
    <div class="callout callout-warning">
          <h4><i class="icon fa fa-ban"></i> Pengiriman Barang Non PO</h4>
              - Isi tiap tab minimal dengan satu data <br>
              - Tombol kirim akan muncul jika data sudah lengkap<br>
    </div>
    @endif
    
  </div>
</div>
<div class="row">
    <div class="col-md-3 ketsamping">
        
    </div>
    <!-- /.col -->
    <div class="col-md-9">
    <input type="hidden" name="idkirim" value="{{$id}}">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li><a href="#tbarang" data-toggle="tab">Barang</a></li>
          <li><a href="#tpembawa" data-toggle="tab">Pembawa barang</a></li>
          <li><a href="#tkendaraan" data-toggle="tab">Kendaraan</a></li>
          <li><a href="#ttujuan" data-toggle="tab">Tujuan</a></li>

        </ul>
        <div class="tab-content">
          {{-- Barang --}}
          <div class="active tab-pane dbarang" id="tbarang">
            
          </div>

          {{-- Pembawa barang --}}
          <div class="tab-pane dpembawa" id="tpembawa">
            
          </div>

          {{-- Tujuan dan kendaraan --}}
          <div class="tab-pane dkendaraan" id="tkendaraan">
            
          </div>

          {{-- Tujuan dan kendaraan --}}
          <div class="tab-pane dtujuan" id="ttujuan">
            
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
@section('scripts')
    @parent
    {!! Html::script('plugins/select2/dist/js/select2.full.min.js')!!}
    {!! Html::script('js/fungsiloading.js')!!}
    {!! Html::script('js/sweetalert.min.js')!!}
    <script>
      $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        var urlpo = url_local+"/kmb/public/databarangpo/{{$jenis}}/{{$id}}";
        var urlpa = url_local+"/kmb/public/datapembawa/{{$jenis}}/{{$id}}";
        var urltu = url_local+"/kmb/public/datatujuan/{{$jenis}}/{{$id}}";
        var urlke = url_local+"/kmb/public/datakendaraan/{{$jenis}}/{{$id}}";
        var urlsa = url_local+"/kmb/public/ketsamping/{{$jenis}}/{{$id}}";

        // Simpan barang
        $('.dbarang').load(urlpo);
        $('.dpembawa').load(urlpa);
        $('.dtujuan').load(urltu);
        $('.dkendaraan').load(urlke);
        $('.ketsamping').load(urlsa);
      });
    </script>
@stop