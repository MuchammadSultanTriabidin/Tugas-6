<?php
date_default_timezone_set('Asia/Jakarta');
class Library
{
    public function __construct()
    {
        $host = "localhost";
        $dbname = "tugas";
        $username = "root";
        $password = "";
        $this->db = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
    }
    public function add_data($nim,$namamhs,$jk,$alamat,$kota,$email,$foto)
    {
        $data = $this->db->prepare('INSERT INTO tbl_mhs (nim,namamhs,jk,alamat,kota,email,foto) VALUES (?,?,?,?,?,?,?)');
       
        $date = strtotime("now");

        // file extension
        $file_extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
              
        $file_extension = strtolower($file_extension);

        // File name
        $filename = 'foto'.$nim.'_'.$date.'.'.$file_extension;
       
        // Location
        $target_file = 'foto/'.$filename;

        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");
       
        if(in_array($file_extension, $valid_extension)) {
   
            // Upload file
            if(move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                $target_file)
            ) {
  
                // Execute query
                $data->execute(array($nim, $namamhs, $jk, $alamat, $kota, $email, $filename));
            }
        }

        return $data->rowCount();
    }
    public function show()
    {
        $query = $this->db->prepare("SELECT * FROM tbl_mhs");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

    public function get_by_id($id){
        $query = $this->db->prepare("SELECT * FROM tbl_mhs where id=?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query->fetch();
    }

    public function update($id,$nim,$namamhs,$jk,$alamat,$kota,$email,$foto,$tmp_foto){
        $data = $this->db->prepare('UPDATE tbl_mhs set nim=?,namamhs=?,jk=?,alamat=?,kota=?,email=?,foto=? where id=?');
        
        $date = strtotime("now");

        if($_FILES['foto']['name'] == "") {
            $data->execute(array($nim, $namamhs, $jk, $alamat, $kota, $email, $tmp_foto,$id));
        }
        else
        {
            // file extension
            $file_extension = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
                  
            $file_extension = strtolower($file_extension);

            // File name
            $filename = 'foto'.$nim.'_'.$date.'.'.$file_extension;
           
            // Location
            $target_file = 'foto/'.$filename;
           
            // Valid image extension
            $valid_extension = array("png","jpeg","jpg");
           
            if(in_array($file_extension, $valid_extension)) {
       
                // Upload file
                if(move_uploaded_file(
                    $_FILES['foto']['tmp_name'], $target_file)
                ) {
      
                    // Execute query
                    $data->execute(array($nim, $namamhs, $jk, $alamat, $kota, $email, $filename, $id));
                }
            }
        }
        return $data->rowCount();
    }

    public function delete($id)
    {
        $query = $this->db->prepare("DELETE FROM tbl_mhs where id=?");

        $query->bindParam(1, $id);

        $query->execute();
        return $query->rowCount();
    }

}
?>