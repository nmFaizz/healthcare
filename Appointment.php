<?php 
include('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_appointment'])) {
    
    $user_id = $_POST['user_id'];
    $dokter_id = $_POST['doctor_id'];
    $name = $_POST['name'];
    $umur = $_POST['age'];
    $disease = $_POST['disease'];
    $waktu = $_POST['time'];

    if (!isset($_SESSION['id'])) {
        echo "<script>window.location.href = 'FormLogin.php';</script>";
    }
    
    if (empty($user_id) || empty($name) || empty($umur) || empty($disease) || empty($waktu)) {
        die("All fields are required. User ID: $user_id, Name: $name, Umur: $umur, Disease: $disease, Time: $waktu");
    }

  
    $time = str_replace('T', ' ', $waktu);

  
    $sql = "INSERT INTO appointment (user_id, dokter_id, nama, umur, disease, waktu, approve) VALUES (?, ?, ?, ?, ?, ?, ?)";

  
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
        $false = 0;        
        mysqli_stmt_bind_param($stmt, "iissssi", $user_id, $dokter_id, $name, $umur, $disease, $time, $false);

      
        if (mysqli_stmt_execute($stmt)) {
            
            header("Location: history.php");
            exit;
        } else {
            echo "Error executing query: " . mysqli_error($db);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the SQL statement.";
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_appointment'])) {
    $id = $_POST['id'];
    $dokter_id = $_POST['doctor_id'];
    $name = $_POST['name'];
    $umur = $_POST['age'];
    $disease = $_POST['disease'];
    $waktu = $_POST['time'];

    $formatted_time = str_replace('T', ' ', $waktu);

    $sql = "UPDATE appointment 
            SET dokter_id = ?, nama = ?, umur = ?, disease = ?, waktu = ? 
            WHERE id = ?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "isissi", $dokter_id, $name, $umur, $disease, $formatted_time, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo "Appointment updated successfully.";
            
            header("Location: history.php");
            exit();
        } else {
            echo "Error executing query: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($db);
    }
}
?>
