<?php
if($_POST){
$id_pelanggan=$_POST['id_pelanggan'];
$nama=$_POST['nama'];

$alamat=$_POST['alamat'];

$telp=$_POST['telp'];

if(empty($_POST['nama'])){

    echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tampil_pelanggan.php';</script>";


} elseif(empty($_POST['alamat'])){

    echo "<script>alert('alamat tidak boleh kosong');location.href='tampil_pelanggan.php';</script>";

} elseif(empty($_POST['telp'])){
    
    echo "<script>alert('telpon  tidak boleh kosong');location.href='tampil_pelanggan.php';</script>";
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
                
                $update=mysqli_query($conn,"update pelanggan set nama='".$nama."',alamat='".$alamat."', telp='".$telp."',foto_pelanggan='".basename($_FILES["foto_pelanggan"]["name"])."' where id_pelanggan = '".$id_pelanggan."' ") ;
                if($update){
                    echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
                } else {
                    echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php';</script>";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";

            }

        }

}
 

} 

?>