<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function bulan_indo($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
   
    return $bulan[ (int)$pecahkan[1] ];
  }

  function bulan_tahun($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
   
    return $bulan[ (int)$pecahkan[1] ]. ' ' . $pecahkan[2];
  }
  
  function tgl_indo($tanggal){
    $bulan = array (
      1 =>   'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
    );
    $pecahkan = explode('-', $tanggal);
   
    return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
  }
  
  function tgl_bulan_indo($tanggal){
    $bulan = array (
      1 =>   'Jan',
      'Feb',
      'Mar',
      'Apr',
      'Mei',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Okt',
      'Nov',
      'Des'
    );
    $pecahkan = explode('-', $tanggal);
   
    return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ];
  }

  function namahari($tanggal){
    //fungsi mencari namahari
    //format $tgl YYYY-MM-DD
    //format tgl dd-mm-yyyy
    //harviacode.com
    $tgl=substr($tanggal,0,2);
    $bln=substr($tanggal,3,2);
    $thn=substr($tanggal,6,4);
    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
    switch($info){
        case '0': return "Minggu"; break;
        case '1': return "Senin"; break;
        case '2': return "Selasa"; break;
        case '3': return "Rabu"; break;
        case '4': return "Kamis"; break;
        case '5': return "Jumat"; break;
        case '6': return "Sabtu"; break;
    };
}