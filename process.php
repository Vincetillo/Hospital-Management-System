<?php

require '../db.php';
session_start();


if (isset($_POST['register_user'])) {
    
    
    $reg_type = $_POST['registration_type'];
    $sn       = $_POST['serial_number']; 
    $fn       = $_POST['firstname'];
    $mn       = !empty($_POST['middle_name']) ? $_POST['middle_name'] : null;   
    $ln       = $_POST['lastname'];
    $addr     = $_POST['address'];
    $contact  = $_POST['contact_number'];
    $purpose  = $_POST['purpose'];

   
    if ($reg_type === 'CIVILIAN') {
        
        $rank           = null;
        $unit           = null;
        $bos            = null; 
        $afpos          = null; 
        $suffix         = null;
        $office         = null; 
    } else {
       
        $rank           = !empty($_POST['rank']) ? $_POST['rank'] : null;
        $unit           = !empty($_POST['unit']) ? $_POST['unit'] : null;
        $bos            = !empty($_POST['BOS']) ? $_POST['BOS'] : null;
        $afpos          = !empty($_POST['AFPOS']) ? $_POST['AFPOS'] : null;
        $suffix         = !empty($_POST['suffix']) ? $_POST['suffix'] : null;
        
        
        if ($unit === 'HSG') {
            $office = !empty($_POST['office']) ? $_POST['office'] : null;
        } else {
            $office = null;
        }
    }

   
    if (empty($sn)) {
        echo "<script>alert('Serial Number is required!'); window.location='../index.php';</script>";
        exit();
    }

    
    $check = $conn->prepare("SELECT serial_number FROM tbl_registration WHERE serial_number = ?");
    $check->bind_param("s", $sn);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Serial Number already registered!'); window.location='../index.php';</script>";
        $check->close();
        exit();
    }
    $check->close();

    
    $conn->begin_transaction();

    try {
        
        $stmt1 = $conn->prepare("INSERT INTO tbl_registration 
            (serial_number, firstname, middle_name, lastname, suffix, rank, BOS, AFPOS, address, contact_number, purpose, unit, registration_type, office) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        
        $stmt1->bind_param("ssssssssssssss", 
            $sn, $fn, $mn, $ln, $suffix, $rank, $bos, $afpos, $addr, $contact, $purpose, $unit, $reg_type, $office
        );
        $stmt1->execute();

        
        $prefix = "";
        if ($reg_type == 'ENLISTED PERSONNEL') {
            $prefix = "E";
        } elseif ($reg_type == 'OFFICER') {
            $prefix = "O";
        } elseif ($reg_type == 'CIVILIAN') {
            $prefix = "C";
        }

        
        $generated_username = $prefix . $sn;
        $default_role = 'PATIENT';

        
        $stmt2 = $conn->prepare("INSERT INTO tbl_users 
            (user_serial_number, firstname, middle_name, lastname, suffix, username, user_type) 
            VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt2->bind_param("sssssss", 
            $sn, $fn, $mn, $ln, $suffix, $generated_username, $default_role
        );
        $stmt2->execute();

       
        $conn->commit();

        echo "<script>alert('Registration Successful! Your Username is: $generated_username'); window.location='../index.php';</script>";

    } catch (Exception $e) {
        
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    if(isset($stmt1)) $stmt1->close();
    if(isset($stmt2)) $stmt2->close();
}


if (isset($_POST['login_user'])) {
    $sn = $_POST['serial_number'];

    
    $stmt = $conn->prepare("SELECT * FROM tbl_registration WHERE serial_number = ?");
    $stmt->bind_param("s", $sn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        $_SESSION['user_sn'] = $user['serial_number'];
        $_SESSION['user_id'] = $user['serial_number']; 
        $_SESSION['reg_type'] = $user['registration_type'];
        
       
        header("Location: ../patient_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Serial Number not found!'); window.location='../index.php';</script>";
    }
    $stmt->close();
}
?>