<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelMasterVendor;
use App\Models\modelBlokir;
use Mail;

class controlDaftar extends Controller
{
    public function index(){
        return view('vendor.daftar');
    }

    public function postDaftar(Request $r){
        $email = $r->email;
        $vendor = $r->vendor;
        $tlp = $r->tlp;
        $alamat = $r->alamat;
        $cek = modelBlokir::where('email',$email)->get()->count();
        if($cek > 0){
            return redirect('errorblokir');
        }else{
            $cari = modelMasterVendor::where('email',$email)->count();
            if($cari > 0){
                return redirect('terdaftar');
            }else{
                $s = new modelMAsterVendor();
                $s->namavendor = $vendor;
                $s->email = $email;
                $s->telepon = $tlp;
                $s->alamat = $alamat;
                $s->save();

                \Alert::success('Berhasil', 'Info')->autoClose(2000);
                return redirect('daftarsukses');
            }
            
        }
        
    }

    public function sukses(){
        return view('vendor.berhasil');
    }

    public function terdaftar(){
        return view('vendor.terdaftar');
    }

    public function blokir(){
        return view('vendor.blokir');
    }

    public function lupapassword(){
        return view('vendor.lupapassword');
    }

    public function kirimemaillupa(Request $r){
        $email = $r->email;
        $password = acak(4);
        Mail::send('email.lupapassword', array('password' => $password) , function($m) use($email){
            $m->from(env('MAIL_USERNAME','coba6464.ku@gmail.com'),'PT PJB UBJOM PLTU Paiton');
            $m->to($email,'Verifikasi')->subject('Reset Password KMBarang');
            
        });
        $simpan = modelMasterVendor::where('email',$email)->first();
        $simpan->password = md5($password);
        $simpan->save();
        return redirect('infolupaspassword');
    }

    public function infolupapassword(){
        return view('vendor.infolupa');
    }

    
}
