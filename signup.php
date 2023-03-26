<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get the form data
	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	$phone_number = $_POST["phone_number"];
	$date_of_birth = $_POST["date_of_birth"];
	$occupation = $_POST["occupation"];
	$annual_income = $_POST["annual_income"];
	$bank_account_holder_name = $_POST["bank_account_holder_name"];
	$bank_name = $_POST["bank_name"];
	$bank_account_number = $_POST["bank_account_number"];
	$ifsc_code = $_POST["ifsc_code"];
	$pan_card_number = $_POST["pan_card_number"];
	$aadhar_card_number = $_POST["aadhar_card_number"];
	$voter_id_number = $_POST["voter_id_number"];
	 $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["voter_id_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["voter_id_photo"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["voter_id_photo"]["size"] > 5000000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["voter_id_photo"]["tmp_name"], $target_file)) {
            // File uploaded successfully
        } else {
            // File upload failed
        }
    } else {
        // Invalid file
    }
    
    // Redirect the user to a success page
    header("Location: success.php");
    exit();
}
}
?>
