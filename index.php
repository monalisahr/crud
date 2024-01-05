<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <br>
    <h4><center>Nama Mahasiswa</center></h4>
<?php

    include "connect.php";
    if (isset($_GET['nim'])) {
        $nim=htmlspecialchars($_GET["nim"]);

        $sql="delete from mahasiswa where nim='$nim' ";
        $hasil=mysqli_query($con,$sql);
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger">
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered">
            <tr class="table-primary">           
            <th>Nim</th>
            <th>Nama</th>
            <th>Fakultas</th>
            <th>Jurusan</th>
            <th colspan='2'>Aksi</th>
            
        </tr>
        </thead>

        <?php
        include "connect.php";
        $sql="select * from mahasiswa order by nim desc";

        $hasil=mysqli_query($con,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $data["nim"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["fakultas"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td>
                    <a href="update.php?nim=<?php echo htmlspecialchars($data['nim']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?nim=<?php echo $data['nim']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
