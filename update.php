<!DOCTYPE html>
<html>
<head>
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
    if (isset($_GET['nim'])) {
        $nim=input($_GET["nim"]);

        $sql="select * from mahasiswa where nim=$nim";
        $hasil=mysqli_query($con,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nim=htmlspecialchars($_POST["nim"]);
        $nama=input($_POST["nama"]);
        $fakultas=input($_POST["fakultas"]);
        $jurusan=input($_POST["jurusan"]);

        $sql="update mahasiswa set
			nim='$nim',
			nama='$nama',
			fakultas='$fakultas',
			jurusan='$jurusan'
            where nim=$nim";

        $hasil=mysqli_query($con,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
        <div class="form-group">
            <label>Jurusan:</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required/>
        </div>

        <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>