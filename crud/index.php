<?php

$hostname = "localhost";
$username = "root";
$pass = "";
$dbname = "angkatan3";

$koneksi = mysqli_connect($hostname, $username, $pass, $dbname);

if (!$koneksi) {
  die("Koneksi gagal ");
}
// select user

$sql = mysqli_query($koneksi, "SELECT * FROM anggota ORDER BY id DESC");
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
      <div class="col-md-10 my-4 offset-1">
        <div class="card border border-primary shadow p-3 mb-5 bg-body-tertiary rounded">
          <div class="card-body">
            <h1>Data Anggota </h1>
            <?php if (isset($_GET['tambah'])) { ?>
              <div class="alert-warning">Data Berhasil ditambahkan</div>
            <?php } ?>
            <div align="right" style="margin-bottom: 2rem;">
              <a href=" anggota.php" class="btn btn-outline-primary">Tambah Data Anggota</a>
            </div>
            <table width=" 100%" border="1" cellpadding="5" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Anggota</th>
                  <th>email</th>
                  <th>Nomor Telpon</th>
                  <th>alamat</th>
                  <th>Keterangan</th>
                </tr>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                while ($row = mysqli_fetch_assoc($sql)) { ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['nama_anggota'] ?></td>
                    <td><?php echo $row['no_telepon'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td>
                      <a href="anggota.php?edit=<?php echo $row['id'] ?>">edit</a> |
                      <a onclick="return confirm('Yakin mau hapus bro?')"
                        href="anggota.php?delete=<?php echo $row['id'] ?>">delete</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- scrtipt -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>