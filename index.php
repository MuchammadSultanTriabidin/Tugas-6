<?php 
include('library.php');
$lib = new Library();
$data_siswa = $lib->show();

if(isset($_GET['hapus_siswa']))
{
    $id = $_GET['hapus_siswa'];
    $status_hapus = $lib->delete($id);
    if($status_hapus)
    {
        header('Location: index.php');
    }
}
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Data Mahasiswa</h3>
            </div>
            <div class="card-body">
                <a href="form_add.php" class="btn btn-success">Tambah</a>
                <hr/>
                <table class="table table-bordered" width="60%">
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama Mahasiswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($data_siswa as $row)
                    {
                        echo "<tr>";
                        echo "<td>".$no."</td>";
                        echo "<td>".$row['nim']."</td>";
                        echo "<td>".$row['namamhs']."</td>";
                        echo "<td>".$row['jk']."</td>";
                        echo "<td>".$row['alamat']."</td>";
                        echo "<td>".$row['kota']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td><img src='foto/".$row['foto']."' width='30%'></td>";
                        echo "<td><a class='btn btn-info' href='form_edit.php?id=".$row['id']."'>Update</a>
                        <a class='btn btn-danger' href='index.php?hapus_siswa=".$row['id']."'>Hapus</a></td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>
</html>