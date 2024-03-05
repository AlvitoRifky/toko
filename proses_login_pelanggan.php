<?php 

    if($_POST){

        $username=$_POST['username'];

        $password=$_POST['password'];

        if(empty($username)){

            echo "<script>alert('Username tidak boleh kosong');location.href='login_pelanggan.php';</script>";

        } elseif(empty($password)){

            echo "<script>alert('Password tidak boleh kosong');location.href='login_pelanggan.php';</script>";

        } else {

            include "toko_online.php";

            $qry_login2=mysqli_query($conn,"select * from pelanggan where username = '".$username."' and password = '".$password."'");

            if(mysqli_num_rows($qry_login2)>0){

                $dt_login2=mysqli_fetch_array($qry_login2);

                session_start();

                $_SESSION['id_pelanggan']=$dt_login2['id_pelanggan'];

                $_SESSION['nama']=$dt_login2['nama'];

                $_SESSION['status_login']=true;

                header("location: home2.php");

            } else {

                echo "<script>alert('Username dan Password tidak benar');location.href='login_pelanggan.php';</script>";

            }

        }

    }

?>