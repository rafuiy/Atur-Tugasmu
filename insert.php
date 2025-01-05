<?php
  include 'koneksi.php';
    $id = '';
    $nama = '';
    $desc = '';
    $deadline = '';
    $stats = '';

  if(isset($_GET["ubah"])) {
    $id = $_GET["ubah"];

    $query = "SELECT * FROM tugas WHERE id = '$id';";
    $sql = mysqli_query($connect, $query); 

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['title'];
    $desc = $result['description'];
    $deadline = $result['due_date'];
    $stats = $result['status'];
  }
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

    <div class="container mt-1 w-50 p-3">
      <form method="POST" action="proses.php">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <?php
          if(isset($_GET["ubah"])) {
        ?>
        <!-- Jika klik ubah -->
            <h2 class="mt-5"><center>Ubah Tugas</center></h2>
        <?php
            } else {
        ?>
        <!-- Jika klik Tambah -->
            <h2 class="mt-5"><center>Tambahkan Tugas</center></h1>
        <?php
            }
        ?>
        <!-- Isi Form -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input required type="text" name="name" class="form-control" id="nama" value="<?php echo $nama?>"/>
          </div>

          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Tugas</label>
            <textarea required name="desc" class="form-control" id="deskripsi" rows="3"><?php echo $desc ?></textarea>
          </div>

          <div class="mb-3">
            <label for="tanggal" class="form-label">Deadline</label>
            <input required type="date" name="deadline" class="form-control" id="tanggal" value="<?php echo $deadline?>">
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status Tugas</label>
            <select required name="stats" class="form-select" id="status">
                <option <?php if($stats == 'pending') {echo "selected";} ?> value="pending">Belum Selesai</option>
                <option <?php if($stats == 'completed') {echo "selected";} ?> value="completed">Selesai</option>
            </select>
          </div>

          <div class="mb-3 row">
            <div class="col">
              <?php
                if(isset($_GET["ubah"])) {
              ?>
              <!-- Tombol jika ubah -->
                  <button type="submit" name="aksi" value="edit" class="btn btn-primary">Simpan Perubahan</button>
              <?php  
                  } else {
              ?>
              <!-- Tombol Jika tambah -->
                    <button type="submit" name="aksi" value="add" class="btn btn-primary">Tambahkan</button>
              <?php
                  }
                ?>
                <!-- Tombol Batal -->
                <a href="index.php" class="btn btn-danger">Batal</a>
            </div>
          </div>  
      </form>  
    </div>
</body>
</html>