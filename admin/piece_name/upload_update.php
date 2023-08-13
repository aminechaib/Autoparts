<?php
session_start();

if(isset($_POST['image'])) {
    $data = $_POST['image'];
    $data = str_replace('data:image/jpeg;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $decodedData = base64_decode($data);

    $filename = 'uploads/' . time() . '.jpg'; // Generate a unique filename based on timestamp

    if(file_put_contents($filename, $decodedData)) {
        $_SESSION['uploaded_filename'] = $filename; // Store the filename in a session variable
        echo "Image uploaded and saved as: $filename";
    } else {
        echo "Failed to save image.";
    }
    exit(); // Make sure to exit the script after handling the upload
}
?>

<?php 
require_once("../includes/app_foot.php");
?>

