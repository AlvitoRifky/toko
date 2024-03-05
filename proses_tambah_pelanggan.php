<?php
if($_POST){

//$nama=$_POST['nama'];

//$alamat=$_POST['alamat'];

//$telp=$_POST['telp'];

if(empty($_POST['nama'])){

    echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";


} elseif(empty($_POST['alamat'])){

    echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";

} elseif(empty($_POST['telp'])){
    
    echo "<script>alert('telpon  tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
} 
  else {

    include "toko_online.php";

   
        // upload image
        $target_dir= "pelanggan/";
        $target_file = $target_dir .basename($_FILES["foto_pelanggan"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, & PNG files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0 ){
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto_pelanggan"]["tmp_name"], $target_file)) {
                //echo "The file " .htmlspecialchars( basename( $_FILES["foto_produk"]["name"])). " has been uploaded.";
                
                $insert=mysqli_query($conn,"insert into pelanggan (nama, alamat, telp , username, password, foto_pelanggan) value ('".$_POST['nama']."','".$_POST['alamat']."','".$_POST['telp']."','".$_POST['username']."','".$_POST['password']."','".basename($_FILES["foto_pelanggan"]["name"])."')");
                if($insert == !false){
                    echo "<script>alert('Sukses menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
                } else {
                    echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";

            }

        }

}
 

} 

?>