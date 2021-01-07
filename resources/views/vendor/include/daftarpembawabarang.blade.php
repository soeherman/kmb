<div id="loadingpembawa" align="center">
    Proses...
</div>
<div id="pembawa"">
    <div class="box box-widget no-border">
        <div class="box-header">
            <h3 class="box-title">Form Identitas pengantar</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-xs simpanpembawa">Simpan</button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="progress" style="height: 2px;">
            <div class="progress-bar" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="" enctype="multipart/form-data" class="form-horizontal" id="formpembawa">
                <input type="hidden" name="idkirim" value="{{$id}}">
                {{ csrf_field() }}
                <input type="hidden" name="idikutan" class="idikutan" value="">
                <div class="form-group jp">
                    <div class="col-md-4">
                    <label>Jenis Pengenal</label>
                    <select name="jenisp" class="form-control jenisp">
                        <option>Pilih</option>
                        <option value="KTP">KTP</option>
                        <option value="SIM">SIM</option>
                        <option value="SIM">Ekspedisi</option>
                    </select>
                    </div>
                    <div class="col-md-8">
                    <label>Nomor pengenal / No Resi</label>
                    <input type="text" name="nomorp" class="form-control nomorp" placeholder="Masukkan nomor">
                    </div>
                </div>

                <div class="form-group nap">
                    <div class="col-md-4">
                    <label>Nama pengikut / Ekspedisi</label>
                    <input type="text" name="namap" class="form-control namap" placeholder="Masukkan nama">
                    </div>

                    <div class="col-md-4">
                    <label>Jabatan</label>
                    <input type="text" name="jabp" class="form-control jabp" placeholder="Masukkan nama">
                    </div>

                    <div class="col-md-4">
                    <label>No Hp/Telp</label>
                    <input type="text" name="kontakp" class="form-control kontakp" placeholder="Masukkan Kontak">
                    </div>
                </div>

                <div class="form-group ap">
                    <div class="col-md-12">
                    <label>Alamat</label>
                    <textarea class="form-control alamatp" name="alamat"></textarea>
                    </div>
                </div>
                </form>
                </div>           
            </div>
        </div>
        <div class="box-footer">
        * Wajib diisi
        </div>
    </div>

    <h4>Pengantar barang</h4>
    <div class="progress" style="height: 2px;">
        <div class="progress-bar progress-bar-danger" role="progressbar" style="width: 8%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="table-responsive">
        <table id="table-ikut" class="table table-condensed table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Identitas</th>
                    <th>Nama</th>
                    <th>Foto</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php
                $i = 1;
            @endphp
            @if(!empty($data))
                @foreach($data as $d)
                    <tr>
                        <td><?=$i++?></td>
                        <td>{{$d->pengenal}} - {{$d->nopengenal}}</td>
                        <td>{{$d->namatamu}}</td>
                        <td>Lihat</td>
                        <td>{{$d->notlptamu}}</td>
                        <td>{{$d->alamattamu}}</td>
                        <td>{{$d->jabatan}}</td>
                        <td>
                            Hapus
                            Ubah
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">Tidak ada data!</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlbarangpo = url_local+"/kmb/public/simpanpembawa";
        var urlpembawa = url_local+"/kmb/public/datapembawa/{{$id}}";
        var urlsa = url_local+"/kmb/public/ketsamping/{{$id}}";

        $(".simpanpembawa").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formpembawa')[0]);
            var type = "POST";
            var my_url = urlbarangpo;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    setVisible('#pembawa',true);
                    setVisible("#loadingpembawa",false);
                },
                success: function(data){
                    $('#formpembawa').trigger("reset");
                    $('.dpembawa').load(urlpembawa);  
                    $('.ketsamping').load(urlsa);
                    // 
                },
                error: function(data){
                    
                }
            });
        });
    });
</script>
<script>
    onReady(function() {
        setVisible('#pembawa', true);
        setVisible('#loadingpembawa', false);
    });
</script>