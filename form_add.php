<?php 
include('library.php');
$lib = new Library();
if(isset($_POST['tombol_tambah'])){
    $nim = $_POST['nim']; 
    $namamhs = $_POST['namamhs'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $email = $_POST['email'];
    $foto = $_FILES['foto'];


    $add_status = $lib->add_data($nim,$namamhs,$jk,$alamat,$kota,$email,$foto);
    if($add_status){
    header('Location: index.php');
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
                <h3>Tambah Data Mahasiswa</h3>
            </div>
            <div class="card-body">
            <form method="post" action="" class="was-validated" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" name="nim" class="form-control" id="nim" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namamhs" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" name="namamhs" class="form-control" id="namamhs" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select name="jk">
                            <option value="L">Laki-laki</option>
                            <option value="P">Peremuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">                        
                        <textarea class="form-control" name="alamat" id="alamat" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" name="kota" class="form-control" id="kota" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control-file" name="foto" id="foto">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <a href="index.php" class="btn btn-warning">Kembali</a>
                    </div>
                    <div class="col-sm-10">
                        <input type="submit" name="tombol_tambah" class="btn btn-primary" value="Tambah">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    </body>
</html>