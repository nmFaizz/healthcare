<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrasi'])) {
    $username = $_POST['nama'];
    $pwd = md5($_POST['pwd']);
    $email = $_POST['email'];
    $umur = $_POST['umur'];
    $jeniskelamin = $_POST['gender'];

    $sql = "INSERT INTO pasien (nama, pwd, email, umur, jenis_kelamin) 
            VALUES ('$username', '$pwd', '$email', '$umur', '$jeniskelamin')";

    $query = mysqli_query($db, $sql);

    if ($query) {
        header("Location: FormLogin.php?message=success");
    } else {
        $message = "Registrasi gagal: " . mysqli_error($db);
    }
}
?>
