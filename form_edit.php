<?php 
include('library.php');
$lib = new Library();
if(isset($_GET['id'])){
    $id = $_GET['id']; 
    $data_mahasiswa = $lib->get_by_id($id);
}
else
{
    header('Location: index.php');
}

if(isset($_POST['tombol_ubah'])){
    $id = $_POST['id'];
    $nim = $_POST['nim']; 
    $namamhs = $_POST['namamhs'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $email = $_POST['email'];
    $foto = $_FILES['foto'];
    $tmp_foto = $_POST['tmp_foto'];
    $status_update = $lib->update($id,$nim,$namamhs,$jk,$alamat,$kota,$email,$foto,$tmp_foto);
    if($status_update)
    {
        header('Location:index.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Update Data Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data_mahasiswa['id']; ?>"/>
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="nim" class="form-control" id="nim" required value="<?php echo $data_mahasiswa['nim']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namamhs" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" name="namamhs" class="form-control" id="namamhs" required value="<?php echo $data_mahasiswa['namamhs']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk">
                            <option value="L" <?php if($data_mahasiswa['jk'] == 'L') echo 'selected'; ?>>Laki-laki</option>
                            <option value="P" <?php if($data_mahasiswa['jk'] == 'P') echo 'selected'; ?>>Peremuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">                        
                        <textarea class="form-control" name="alamat" id="alamat" required><?php echo $data_mahasiswa['alamat']?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" name="kota" class="form-control" id="kota" required value="<?php echo $data_mahasiswa['kota']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" required value="<?php echo $data_mahasiswa['email']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="foto" id="foto">
                        <input type="hidden" name="tmp_foto"  value="<?php echo $data_mahasiswa['foto']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-md-2">
                        <img src="foto/<?php echo $data_mahasiswa['foto']?>" width='30%'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <a href="index.php" class="btn btn-warning">Kembali</a>
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" name="tombol_ubah" class="btn btn-primary" value="Ubah">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>