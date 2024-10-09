<?php

$hostname = "localhost";
$nama_anggota = "root";
$pass = "";
$dbname = "angkatan3";

$koneksi = mysqli_connect($hostname, $nama_anggota, $pass, $dbname);

if (!$koneksi) {
  die("Koneksi gagal ");
}
// select user

//insert user 

if (isset($_POST['simpan'])) {
  $nama_anggota = $_POST['nama_anggota'];
  $no_telepon = $_POST['no_telepon'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];

  $input = "INSERT INTO anggota (nama_anggota, no_telepon,email,alamat) VALUES ('$nama_anggota', '$no_telepon','$email','$alamat')";

  $result = mysqli_query($koneksi, $input);

  if ($result) {
    header("Location: index.php?tambah=berhasil");
  } else {
    echo "Gagal menyimpan data";
  }
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $hapus = mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$id'");
  header('location:index.php?hapus=berhasil');
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $dataEdit = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'");
  $rowEdit = mysqli_fetch_assoc($dataEdit);
}
if (isset($_POST['edit'])) {
  $nama_anggota = $_POST['nama_anggota'];
  $no_telepon = $_POST['no_telepon'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $id = $_GET['edit'];


  $update = mysqli_query($koneksi, "UPDATE anggota SET nama_anggota='$nama_anggota',no_telepon='$no_telepon', email='$email', alamat='$alamat' WHERE id='$id'");
  header("location:index.php?update=berhasil");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <?php include 'layout/header.html' ?>
    <div class="row">
      <div class="col-8 offset-2">
        <div class="card my-5 shadow p-3 mb-5 bg-body-tertiary rounded" border border-primary">
          <div class="card-reader p-4">
            <h1><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Pengguna</h1>
            <form action="" method="POST">
              <div class="form-grup mb-3">
                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                <input type="text" id="nama_anggota" name="nama_anggota" class="form-control"
                  value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_anggota'] : '' ?>" required>
              </div>
              <div class="form-grup mb-3">
                <label for="number" class="form-label">Nomor Telepon</label>
                <input type="number" id="no_telepon" name="no_telepon" class="form-control"
                  value="<?php echo isset($_GET['edit']) ? $rowEdit['no_telepon'] : '' ?>" required>
              </div>
              <div class="form-grup mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control"
                  value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" required>
              </div>
              <div class="form-grup mb-3">
                <label for="text" class="form-label">Alamat Rumah</label>
                <input type="text" id="alamat" name="alamat" class="form-control"
                  value="<?php echo isset($_GET['edit']) ? $rowEdit['alamat'] : '' ?>" required>
              </div>
              <br>
              <button class="btn btn-outline-primary" type="submit"
                name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>