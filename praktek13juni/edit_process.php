<?php
include('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['nama']) && isset($_POST['email'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = isset($_POST['paswd']) ? $_POST['paswd'] : '';

        if ($password == '') {
            // Update tanpa mengubah password
            $sql = "UPDATE users SET username='$username', nama='$nama', email='$email' WHERE id='$id'";
        } else {
            // Update dengan mengubah password
            $hashed_password = md5(sha1($password));
            $sql = "UPDATE users SET username='$username', nama='$nama', email='$email', paswd='$hashed_password' WHERE id='$id'";
        }

        if ($k->query($sql) === TRUE) {
            echo "Update berhasil. <a href='main.php'>Kembali</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $k->error;
        }
    } else {
        echo "Form tidak lengkap.";
    }
} else {
    header("Location: main.php");
    exit();
}
?>