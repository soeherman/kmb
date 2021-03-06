@extends('index')
@section('konten')
<!-- Main content -->
<?php 
  use App\Http\Controllers\controlEtc;
?>
<section class="content">
<div class="row">
	<div class="col-md-12">
		@include('include.flash_message')
	</div>
</div>
	<div class="row">
		<div class="col-xs-12">
			<!-- /.box -->

			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Data Pengiriman</h3>
					<div class="box-tools pull-right">
			            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			        </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="table-responsive">
					<table id="example1" class="table table-condensed table-striped">
						<thead>
							<tr>
								<th>#</th>
                                <th>Nama vendor</th>
								<th>No PO</th>
								<th>Keperluan</th>
								<th>Tanggal Kirim</th>
                                <th>Approver Barang</th>
                                <th>Approver Simip</th>
                                <th>Cetak</th>
							</tr>
						</thead>
						<tbody>
							@php
								$i = 1;
							@endphp
							@if (count($kiriman) > 0)
							@foreach ($kiriman as $d)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$d->namavendor}}</td>
								<td><b>{{$d->nopo}}</b></td>
								<td>{{$d->keperluan}}</td>
                                <td>{{$d->tglkirim}}</td>
                                <td>
                                    <div class="approver">
                                        <span class="label label-primary">{{controlEtc::approverbarang($d->idapprove, $d->idpengaturan)}}</span>
                                    </div>
                                </td>
								<td>
									@if($d->areakhusus == 'Y')
									<div class="approver">
                                        <span class="label label-primary">{{controlEtc::approversimip($d->kodekirim)}}</span>
                                    </div>
									@endif
								</td>
                                <td>
									@if($d->areakhusus == 'T')
										@if(controlEtc::approverbarang($d->idapprove, $d->idpengaturan) == "Selesai")
											<a target="_blank" href="{{url('cetakpengiriman/'.$d->kodekirim)}}"><i class="fa fa-print"></i></a>
										@else
											<span class="text-danger"><i class="fa fa-clock-o"></i></span>
										@endif
									@endif

									@if($d->areakhusus == 'Y')
										@if(controlEtc::approverbarang($d->idapprove, $d->idpengaturan) == "Selesai" && controlEtc::approversimip($d->kodekirim) == "Selesai")
											<a target="_blank" href="{{url('cetakpengiriman/'.$d->kodekirim)}}"><i class="fa fa-print"></i></a>
										@else
											<span class="text-danger"><i class="fa fa-clock-o"></i></span>
										@endif
									@endif
								</td>
							</tr>
							@endforeach
							@else
							<tr>
								<td colspan="7">Belum ada permintaan kiriman</td>
							</tr>
							@endif
						</tbody>
						<tfoot>
							<tr>
                                <th>#</th>
                                <th>Nama vendor</th>
								<th>No PO</th>
								<th>Keperluan</th>
								<th>Tanggal Kirim</th>
                                <th>Approver Barang</th>
                                <th>Cetak</th>
							</tr>
						</tfoot>
					</table>
				</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
<!-- /.content -->
@endsection