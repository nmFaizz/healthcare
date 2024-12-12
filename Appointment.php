<?php 
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_appointment'])) {
    
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $waktu = $_POST['time'];


    if (empty($user_id) || empty($name) || empty($email) || empty($department) || empty($waktu)) {
        die("All fields are required. User ID: $user_id, Name: $name, Email: $email, Department: $department, Time: $waktu");
    }

  
    $time = str_replace('T', ' ', $waktu);

  
    $sql = "INSERT INTO appointment (user_id, nama, email, department, waktu) VALUES (?, ?, ?, ?, ?)";

  
    $stmt = mysqli_prepare($db, $sql);
    if ($stmt) {
        
        mysqli_stmt_bind_param($stmt, "issss", $user_id, $name, $email, $department, $time);

      
        if (mysqli_stmt_execute($stmt)) {
            
            header("Location: Service.php?success=1");
            exit;
        } else {
            // Log and display error if the execution fails
            echo "Error executing query: " . mysqli_error($db);
        }
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Log and display error if statement preparation fails
        echo "Failed to prepare the SQL statement.";
    }
}
?>
