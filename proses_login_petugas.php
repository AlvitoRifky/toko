<?php 

    if($_POST){

        $username=$_POST['username'];

        $password=$_POST['password'];

        if(empty($username)){

            echo "<script>alert('Username tidak boleh kosong');location.href='login2.php';</script>";

        } elseif(empty($password)){

            echo "<script>alert('Password tidak boleh kosong');location.href='login2.php';</script>";

        } else {

            include "toko_online.php";

            $qry_login2=mysqli_query($conn,"select * from petugas where username = '".$username."' and password = '".md5($password)."'");

            if(mysqli_num_rows($qry_login2)>0){

                $dt_login2=mysqli_fetch_array($qry_login2);

                session_start();

                $_SESSION['id_petugas']=$dt_login2['id_petugas'];

                $_SESSION['nama_petugas']=$dt_login2['nama_petugas'];

                $_SESSION['status_login']=true;

                header("location: home2.php");

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='login_petugas.php';</script>";

            }

        }

    }

?>