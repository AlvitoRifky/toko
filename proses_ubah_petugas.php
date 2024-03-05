<?php

if($_POST){

    $id_petugas=$_POST['id_petugas'];

    $nama=$_POST['nama_petugas'];

    $username=$_POST['username'];
    $level=$_POST['level'];
    
    



    if(empty($nama)){

        echo "<script>alert('nama  tidak boleh kosong');location.href='tambah_petugas.php';</script>";


    } elseif(empty($username)){

        echo "<script>alert('usename tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    }elseif(empty($level)){

        echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    
    } else {

        include "toko_online.php";

        $update=mysqli_query($conn,"update petugas set nama_petugas='".$nama."', username='".$username."', level='".$level."' where id_petugas = '".$id_petugas."'") or die(mysqli_error($conn));
        
            if($update){

                echo "<script>alert('Sukses update petugas');location.href='tampil_petugas.php';</script>";

            } else {

                echo "<script>alert('Gagal update petugas');location.href='ubah_petugas.php?id_petugas=".$id_petugas."';</script>";

            }

        }

       

    }

    

?>