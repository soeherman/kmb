<div id="loadingkendaraan" align="center">
    Proses...
</div>
<div id="kendaraan" class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="table-ikut" class="table table-condensed table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis</th>
                        <th>Nama</th>
                        <th>Plat</th>
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
                            <td>{{$d->jeniskendaraan}}</td>
                            <td>{{$d->namakendaraan}}</td>
                            <td>{{$d->plat}}</td>
                            <td>
                                <a href="#" data-id="{{$d->idkendaraan}}" class="hapusdatak">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Tidak ada data!</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        @if($kirim == "Mengatur" || $kirim == "Ditolak Gudang")
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#daftarkendaraan">
            Tambah Kendaraan
        </button>
        @endif
    </div>
</div>
<div class="modal" id="daftarkendaraan" class="daftarkendaraan" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Form Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="" enctype="multipart/form-data" class="form-horizontal" id="formkendaraan">
                <input type="hidden" name="idkirim" value="{{$id}}">
                <input type="hidden" name="jenis" value="{{$jenis}}">
                <input type="hidden" name="idkendaraan" class="idkendaraan">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-12 col-sm-12 col-xs-12">Pilih data pembawa<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="radio" name="hiskend" id="" value="baru" checked> Kendaraan Baru
                        <input type="radio" name="hiskend" id="" value="pernah"> Kendaraan Lama
                    </div>
                </div>
                <div class="form-group hidden historikend">
                    <label class="col-md-12 col-sm-12 col-xs-12">Pilih Kendaraan<code>*</code></label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <select name="idpembawa" id="" class="form-control select2" style="width: 100%;">
                            <option>Pilih Kendaraan</option>
                            @foreach ($historikend as $itemkend)
                                <option value="{{ $itemkend->idkendaraan }}">{{ $itemkend->namakendaraan }}[{{ $itemkend->plat }}]</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group jp">
                    <div class="col-md-4">
                    <label>Jenis kendaraan<code>*</code></label>
                    <select name="jenisk" class="form-control jenisk">
                        <option>Pilih</option>
                        <option value="Motor">Motor</option>
                        <option value="Pick up">Pick up</option>
                        <option value="Truck">Truck</option>
                        <option value="Box">Box</option>
                        <option value="Kontainer">Kontainer</option>
                    </select>
                    </div>
                    <div class="col-md-4">
                    <label>Nama Kendaraan<code>*</code></label>
                    <input type="text" name="namak" class="form-control namak" placeholder="Dino A4, L300, NMAX">
                    </div>
                    <div class="col-md-4">
                    <label>Plat Nomor<code>*</code></label>
                    <input type="text" name="plat" class="form-control plat" placeholder="P 09 JB">
                    </div>
                </div>
                </form>
                </div>           
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary simpankendaraan">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
</div>
@include('vendor.include.konfirmasihapusk')
<script>
    $(document).ready(function(){
        var url_local = window.location.protocol+'//'+window.location.host;
        // Simpan barang
        var urlkendaraan = url_local+"/kmb/public/simpankendaraan";
        var urldatak = url_local+"/kmb/public/datakendaraan/{{$jenis}}/{{$id}}";
        var urlsa = url_local+"/kmb/public/ketsamping/{{$id}}";
        var urlhk = url_local+"/kmb/public/hapuskendaraan/";
        var urlhik = url_local+"/kmb/public/carihistorikend/";

        $('.select2').select2();

        $(".hapusdatak").click(function(){
            var id = $(this).data('id');
            $(".iddatak").val(id);
            $("#deleteModalk").modal();
        });

        $("#btn-deletek").click(function(){
            var id = $(".iddatak").val();
            var urlhapus = urlhk + id;
            $.ajax({
                type : 'GET',
                url : urlhapus,
                data : id,
                dataType: 'json',
                beforeSend: function(){
                    setVisible('#kendaraan',true);
                    setVisible("#loadingkendaraan",false);
                },
                success: function(data){
                    $(".iddatak").val("");
                    $('.dkendaraan').load(urldatak);  
                    $('.ketsamping').load(urlsa);
                    $("#deleteModalk").modal('hide');
                },
                error: function(data){
                    
                }
            });
        });

        $(".simpankendaraan").click(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            })

            var formData = new FormData($('#formkendaraan')[0]);
            var type = "POST";
            var my_url = urlkendaraan;

            $.ajax({
                type : type,
                url : my_url,
                data : formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function(){
                    setVisible('#kendaraan',true);
                    setVisible("#loadingkendaraan",false);
                },
                success: function(data){
                    $('#formkendaraan').trigger("reset");
                    $('.dkendaraan').load(urldatak);  
                    $('.ketsamping').load(urlsa);
                    $("#daftarkendaraan").modal('hide');
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        $('input:radio[name=hiskend]').change(function() {
            if (this.value == 'baru') {
                $('.historikend').addClass('hidden');
            }
            else if (this.value == 'pernah') {
                $('.historikend').removeClass('hidden');
            }
        });

        $('.select2').on('select2:select', function (e) {
            var id = $(this).val();
            $.get(urlhik+id, function(data){
                console.log(data);
                $('.jenisk').val(data['jeniskendaraan']);
                $('.namak').val(data['namakendaraan']);
                $('.plat').val(data['plat']);
                $('.idkendaraan').val(data['idkendaraan']);

            })
        });
    });
</script>
<script>
    onReady(function() {
        setVisible('#kendaraan', true);
        setVisible('#loadingkendaraan', false);
    });
</script>