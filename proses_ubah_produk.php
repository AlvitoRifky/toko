<?php
if($_POST){
$id_produk=$_POST['id_produk'];
$nama_produk=$_POST['nama_produk'];

$deskripsi=$_POST['deskripsi'];

$harga=$_POST['harga'];

if(empty($_POST['nama_produk'])){

    echo "<script>alert('nama produk tidak boleh kosong');location.href='tampil_produk.php';</script>";


} elseif(empty($_POST['deskripsi'])){

    echo "<script>alert('deskripsi tidak boleh kosong');location.href='tampil_produk.php';</script>";

} elseif(empty($_POST['harga'])){
    
    echo "<script>alert('harga  tidak boleh kosong');location.href='tampil_produk.php';</script>";
} 
  else {

    include "toko_online.php";

   
        // upload image
        $target_dir= "foto/";
        $target_file = $target_dir .basename($_FILES["foto_produk"]["name"]);
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
            if (move_uploaded_file($_FILES["foto_produk"]["tmp_name"], $target_file)) {
                //echo "The file " .htmlspecialchars( basename( $_FILES["foto_produk"]["name"])). " has been uploaded.";
                
                $update=mysqli_query($conn,"update produk set nama_produk='".$nama_produk."',deskripsi='".$deskripsi."', harga='".$harga."',foto_produk='".basename($_FILES["foto_produk"]["name"])."' where id_produk = '".$id_produk."' ") ;
                if($update){
                    echo "<script>alert('Sukses update produk');location.href='tampil_produk.php';</script>";
                } else {
                    echo "<script>alert('Gagal update produk');location.href='ubah_produk.php';</script>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";

            }

        }

}
 

} 

?>