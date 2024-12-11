<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrasi'])) {
    $username = $_POST['nama'];
    $pwd = md5($_POST['pwd']);
    $email = $_POST['email'];
    $umur = $_POST['umur'];
    $jeniskelamin = $_POST['gender'];
    $roles = $_POST['roles'];

    $sql = "INSERT INTO user (nama, pwd, email, umur, jenis_kelamin, roles) 
            VALUES ('$username', '$pwd', '$email', '$umur', '$jeniskelamin', '$roles')";

    $query = mysqli_query($db, $sql);

    if ($query) {
        header("Location: FormLogin.php?message=success");
    } else {
        $message = "Registrasi gagal: " . mysqli_error($db);
    }
}
?>
