<!DOCTYPE html>
<html>
<head>
    <title>Input Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    include "connect.php";
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nim=input($_POST["nim"]);
        $nama=input($_POST["nama"]);
        $fakultas=input($_POST["fakultas"]);
        $jurusan=input($_POST["jurusan"]);

        $sql="insert into mahasiswa (nim,nama,fakultas,jurusan) values
		('$nim','$nama','$fakultas','$jurusan')";

        $hasil=mysqli_query($con,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nim:</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan Nim" required />

        </div>
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required/>
        </div>
       <div class="form-group">
            <label>Fakultas :</label>
            <input type="text" name="fakultas" class="form-control" placeholder="Masukan Fakultas" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
        </div>      

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>