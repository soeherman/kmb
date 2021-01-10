<?php 
  use App\Http\Controllers\controlNotifMenu;
?>
<!-- Sidebar user panel -->
<div class="user-panel">
  <div class="pull-left image">
    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p>{{session('nama')}}</p>
    <a href="#"><i class="fa fa-circle text-success"></i> {{session('jabatan')}}</a>
  </div>
</div>
<!-- sidebar menu: : style can be found in sidebar.less -->
@if(session('level') == "Karyawan")
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="active treeview">
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Master</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="{{url('daftarvendor')}}"><i class="fa fa-circle-o"></i> Vendor</a></li>
      <li><a href="{{url('daftarjabatan')}}"><i class="fa fa-circle-o"></i> Jabatan</a></li>
      <li><a href="{{url('daftarkaryawan')}}"><i class="fa fa-circle-o"></i> Karyawan</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-gears"></i> <span>Pengaturan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{url('daftarpengaturanapprover')}}"><i class="fa fa-circle-o"></i> Approver</a></li>
      <li><a href="{{url('aturhak')}}"><i class="fa fa-circle-o"></i> Hak</a></li>
    </ul>
  </li>

  <!-- Untuk Gudang -->
  <li class="treeview">
    <a href="#">
      <i class="fa fa-save"></i> <span>Penerimaan</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        <small class="label pull-right bg-yellow">{{ controlNotifMenu::jmlvendor() }}</small>
        <small class="label pull-right bg-green">{{ controlNotifMenu::jmlkiriman() }}</small>
      </span>
    </a>
    <ul class="treeview-menu">
      <li>
        <a href="{{url('requestvendor')}}"><i class="fa fa-circle-o"></i> Vendor
          <span class="pull-right-container">
            <span class="label bg-yellow">{{ controlNotifMenu::jmlvendor() }}</span>
          </span>
        </a>
      </li>
      <li>
        <a href="{{url('requestkiriman')}}"><i class="fa fa-circle-o"></i> Kiriman
          <span class="pull-right-container">
            <span class="label bg-green">{{ controlNotifMenu::jmlkiriman() }}</span>
          </span>
        </a>
      </li>
    </ul>
  </li>

  <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Ubah Password</span></a></li>
  <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
</ul>
@endif

@if(session('level') == "Vendor")
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li><a href="{{url('berandavendor')}}"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-paper-plane"></i> <span>Pengiriman</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="{{url('kirimpo')}}"><i class="fa fa-circle-o"></i> Barang PO</a></li>
      <li><a href="{{url('tools')}}"><i class="fa fa-circle-o"></i> Tools</a></li>
      <li><a href="{{url('kirimnonpo')}}"><i class="fa fa-circle-o"></i> Barang Non PO</a></li>
    </ul>
  </li>
  <li><a href="{{url('ubahpassv')}}"><i class="fa fa-book"></i> <span>Ubah Password</span></a></li>
  <li><a href="{{url('keluarvendor')}}"><i class="fa fa-sign-out"></i> <span>Keluar</span></a></li>
</ul>
@endif