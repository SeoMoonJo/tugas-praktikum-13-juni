<?php
session_start();
include('dbconnect.php');

if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== TRUE) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['urut'])) {
    $id = $_GET['urut'];
    $rs = $k->query("SELECT * FROM users WHERE id='$id'");
    if ($rs->num_rows == 1) {
        $user = $rs->fetch_assoc();
    } else {
        echo "User tidak ditemukan.";
        exit();
    }
} else {
    echo "ID user tidak diset.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="edit_process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br><br>
        <label for="nama">Nama Lengkap:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
        <label for="paswd">Password (biarkan kosong jika tidak ingin mengubah):</label>
        <input type="password" id="paswd" name="paswd"><br><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

