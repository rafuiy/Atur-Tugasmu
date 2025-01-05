<?php
    include 'koneksi.php';

    if(isset($_POST['aksi'])) {
        // jika aksinya bervalue add maka query insert
        if($_POST['aksi'] == 'add') {

            $nama = $_POST['name'];
            $desc = $_POST['desc'];
            $deadline = $_POST['deadline'];
            $status = $_POST['stats'];

            $query = "INSERT INTO tugas VALUES(null, '$nama', '$desc', '$deadline', '$status')";
            $sql = mysqli_query($connect, $query);
            
            if($sql) {
                header("location: index.php");
            } else {
                echo $query;
            }

            } else if($_POST['aksi'] == 'edit') {
                // jika aksinya bervalue edit maka query update
                $id = $_POST['id'];
                $nama = $_POST['name'];
                $desc = $_POST['desc'];
                $deadline = $_POST['deadline'];
                $status = $_POST['stats'];

                $query = "UPDATE tugas SET title = '$nama', description = '$desc', due_date = '$deadline', status = '$status' WHERE id = '$id';";
                $sql = mysqli_query($connect, $query);
                if($sql) {
                    header("location: index.php");
                } else {
                    echo $query;
                }
        }
    }
    // Jika mengklik hapus maka query delete dan menuju index
    if(isset($_GET['hapus'])) {
        $id = $_GET['hapus'];
        $query = "DELETE FROM tugas WHERE id = '$id';";
        $sql = mysqli_query($connect, $query);
        header("location: index.php");
    } else {
        echo $query;
    }
?>