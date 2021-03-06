@extends('index')
@section('css')
    @parent
        {!! Html::style('css/paper-bootstrap-wizard.css') !!}
    @stop
@section('konten')
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <!--      Wizard container        -->
            <div class="box box-primary wizard-container">
            <div class="box-body">
                <div class="wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="" id="formtamu">

                        <div class="wizard-header text-center">
                            <h3 class="wizard-title">Form Tamu</h3>
                            <p class="category">Masukkan data diri dan keperluan anda.</p>
                        </div>

                        <div class="wizard-navigation">
                            <div class="progress-with-circle">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                            </div>
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        Data diri
                                    </a>
                                </li>
                                <li>
                                    <a href="#account" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        Kendaraan
                                    </a>
                                </li>
                                <li>
                                    <a href="#address" data-toggle="tab">
                                        <div class="icon-circle">
                                            <i class="fa fa-map"></i>
                                        </div>
                                        Keperluan
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <div class="row">
                                    <h5 class="info-text"> Masukkan data diri anda.</h5>
                                    <div class="col-sm-4">
                                        <div class="picture-container">
                                            <div class="col-md-12">
                                                <input type="hidden" id="namafoto" class="namafoto"  name="namafoto" value="">
                                                <div id="camera">Foto</div>
                                                
                                                <div id="webcam" style="margin: 10px" align="center">
                                                    <input type=button value="Ambil Foto" onClick="preview()">
                                                </div>

                                                <div id="simpan" style="display:none; margin: 10px;" align="center">
                                                    <input type=button value="Ambil Ulang" onClick="batal()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="namb">Pilih data tamu<code>*</code></label>
                                                <input type="radio" name="baru" id="" value="baru" checked> Tamu Baru
                                                <input type="radio" name="baru" id="" value="pernah"> Pernah Berkunjung
                                            </div>
                                        </div>

                                        <div class="col-sm-12 historinya hidden">
                                            <div class="form-group">
                                                <select class="caritamu form-control select2" style="width:100%;" name="caritamu"></select>
                                            </div>
                                            <input type="hidden" name="iddetailtamu" class="iddetailtamu">
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis Pengenal <small><code>*</code></small></label>
                                                <select name="pengenal" id="" class="form-control jenisp">
                                                    <option>Pilih pengenal</option>
                                                    <option value="KTP">KTP</option>
                                                    <option value="SIM">SIM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No. Pengenal <small><code>*</code></small></label>
                                                <input name="nopengenal" type="text" class="form-control nop" placeholder="No. KTP, SIM, Dll">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nama <small><code>*</code></small></label>
                                                <input name="nama" type="text" class="form-control namap" placeholder="Andrew...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Pekerjaan <small><code>*</code></small></label>
                                                <input name="pekerjaan" type="text" class="form-control jabp" placeholder="Manager...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Telepon <small><code>*</code></small></label>
                                                <input name="telp" type="text" class="form-control kontakp" placeholder="081234567898">
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Alamat <small><code>*</code></small></label>
                                                <input name="alamat" type="text" class="form-control alamatp" placeholder="Alamat tamu...">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h5 class="info-text"> Kendaraan anda? </h5>
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis <small><code>*</code></small></label>
                                                <input name="jenisk" type="text" class="form-control" placeholder="Vario, Smash, Beat">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No Plat <small><code>*</code></small></label>
                                                <input name="noplat" type="text" class="form-control" placeholder="N 09 PJB">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="info-text"> Kepentingan? </h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Bertemu dengan ? <small><code>*</code></small></label>
                                            <select class="carikaryawan form-control select2" style="width:100%;" name="carikaryawan"></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Dengan janji <small><code>*</code></small></label><br>
                                            <select name="janji" class="form-control">
                                                <option value="Y"> Ya </option>
                                                <option value="N"> Tidak </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Perusaahaan <small><code>*</code></small></label>
                                            <input name="perusahaan" type="text" class="form-control" placeholder="UBJOM U 9...">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Kepentingan <small><code>*</code></small></label>
                                            <input name="kepentingan" type="text" class="form-control" placeholder="New York...">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>B <small><code>*</code></small></label>
                                            <input name="nopass" type="text" class="form-control" placeholder="40">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                                <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd' name='finish' value='Finish' />
                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>

            </div> <!-- wizard container -->
        </div>
    </div>
</section>
@endsection
@section('scripts')
    @parent
    {!! Html::script('plugins/select2/dist/js/select2.full.min.js')!!}
    {!! Html::script('plugins/webcamjs-master/webcam.min.js')!!}
    {!! Html::script('js/jquery.bootstrap.wizard.js')!!}
    {!! Html::script('js/paper-bootstrap-wizard.js')!!}
    {!! Html::script('js/jquery.validate.min.js')!!}
    {!! Html::script('js/webcam.js')!!}
    <script>
        $(document).ready(function(){
            var url_local = window.location.protocol+'//'+window.location.host;
            var urlcp = url_local+"/kmb/public/tamupernahmasuk";
            var urlck = url_local+"/kmb/public/karyawantamu";
            var urltamu = url_local+"/kmb/public/simpantamu";
            var url = url_local+"/kmb/public/tamupernahmasuk/";
            var urlcetak = url_local+"/kmb/public/cetaktamu/";

            $('input:radio[name=baru]').change(function() {
                if (this.value == 'baru') {
                    $('.historinya').addClass('hidden');
                }
                else if (this.value == 'pernah') {
                    $('.historinya').removeClass('hidden');
                }
            });

            $('.caritamu').select2({
                placeholder: 'Cari...',
                ajax: {
                url: urlcp,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (item) {
                        return {
                        text: item.namatamu,
                        id: item.iddetailtamu
                        }
                    })
                    };
                },
                cache: true
                }
            });

            $('.carikaryawan').select2({
                placeholder: 'Cari...',
                ajax: {
                url: urlck,
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                    results:  $.map(data, function (item) {
                        return {
                        text: item.namaKaryawan,
                        id: item.idKaryawan
                        }
                    })
                    };
                },
                cache: true
                }
            });

            $('.caritamu').on('select2:select', function (e) {
                var id = $(this).val();
                $.get(url+id, function(data){
                    console.log(data);
                    $('.jenisp').val(data['pengenal']);
                    $('.nop').val(data['nopengenal']);
                    $('.namap').val(data['namatamu']);
                    $('.jabp').val(data['jabatan']);
                    $('.kontakp').val(data['notlptamu']);
                    $('.alamatp').val(data['alamattamu']);
                    $('.iddetailtamu').val(data['iddetailtamu']);

                })
            });

            $(".btn-finish").click(function(){
                $.ajaxSetup({
                    headers:{
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    }
                })

                var formData = new FormData($('#formtamu')[0]);
                var type = "POST";
                var my_url = urltamu;

                $.ajax({
                    type : type,
                    url : my_url,
                    data : formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function(){
                        
                    },
                    success: function(data){
                        console.log(data);
                        window.open(url_local+"/kmb/public/cetaktamu/"+data);
                        window.location = url_local+"/kmb/public/daftartamu";
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });
        });
    </script>
@stop