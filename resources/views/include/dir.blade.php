<section class="content-header">
    @if(is_active('berandavendor'))
      <h1>
      Dashboard
      <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    @endif

    @if(is_active('ubahpassv'))
      <h1>
      Ubah Password
      <small>Ubah password untuk privasi anda</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Ubah password</li>
      </ol>
    @endif

    @if(is_active('kirimpo'))
      <h1>
      Daftar Kiriman
      <small>Semua histori pengiriman ada disini</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Daftar Kiriman</li>
      </ol>
    @endif

    @if(is_active('kirimbarang'))
      <h1>
      Pengiriman
      <small>Atur pengiriman anda dengan benar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Pengiriman barang</li>
      </ol>
    @endif
</section>