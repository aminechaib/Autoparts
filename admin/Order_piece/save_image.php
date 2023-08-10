<?php
if (isset($_POST["imageData"]) && isset($_POST["extension"])) {
  $imageData = $_POST["imageData"];
  $fileExtension = $_POST["extension"];
  // Remove the data URI scheme and decode the base64-encoded image data
  $imageData = str_replace('data:image/' . $fileExtension . ';base64,', '', $imageData);
  $imageData = str_replace(' ', '+', $imageData);
  $imageData = base64_decode($imageData);
  // Create the "images" folder if it doesn't exist
  $folderPath = "../uploads/";
  if (!file_exists($folderPath)) {
    mkdir($folderPath, 0777, true);
  }
  // Generate a unique filename
  $filename = uniqid() . "." . $fileExtension;
  // Save the image to the "images" folder
  $filepath = $folderPath . "/" . $filename;
  file_put_contents($filepath, $imageData);
setcookie("img_name",$filename);
header("location: add_piece.php");

  echo "Image saved successfully.";
} else {
  echo "Image data not received.";
}
?>

