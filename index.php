<?php
  include 'koneksi.php';
  $query = "SELECT * FROM tugas;";
  $sql = mysqli_query($connect, $query);
  $num = 0
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Atur Tugas</title>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            Selamat Datang di Atur Tugasmu
          </a>
        </div>
    </nav>

    <div class="container">
        <!-- Judul -->   
        <h1 class="mt-5"><center>Daftar Tugas</center></h1>
        <!-- Button -->
        <a href="insert.php" type="button" class="btn btn-primary mt-3">Tambah Tugas</a>
        <!-- Judul Tabel -->
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                    <th><center>No</center></th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
              </thead>
              <!-- Isi Tabel -->
              <tbody>
              <?php
              // selama ada data maka menampilkan
              while($result = mysqli_fetch_assoc($sql)) {
              ?>
                <tr>
                    <td><center>
                      <?php echo ++$num; ?>.
                    </center></td>
                    <td><?php echo $result['title']; ?></td>
                    <td><?php echo $result['description']; ?></td>
                    <td><?php echo $result['due_date']; ?></td>
                    <td><?php echo $result['status']; ?></td>
                    <td>
                        <a href="insert.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-outline-warning">Ubah</a>
                        <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="btn btn-outline-danger" onClick="return confirm('Apakah anda yakin ingin menghapus tugas tersebut?')">Hapus</a>
                    </td>
                </tr>
              <?php
                }
              ?>
              </tbody>
            </table>
          </div>
    </div>   
</body>
</html>