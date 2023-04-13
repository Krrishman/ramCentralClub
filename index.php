
<?php

include('Home.php');
include('postgres.php');




require_once 'vendor/autoload.php'; // Load Supabase PHP SDK

use Supabase\SupabaseClient;

// Create Supabase client
$supabaseUrl = 'https://albvpiascovyowczwqez.supabase.co';
$supabaseKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImFsYnZwaWFzY292eW93Y3p3cWV6Iiwicm9sZSI6ImFub24iLCJpYXQiOjE2NzcwNDk1MzcsImV4cCI6MTk5MjYyNTUzN30.GPMlnXEDxeIjFcPw9IrJTkxzSc8QhC4kbwWXJpeaPPQ';
$supabase = new SupabaseClient($supabaseUrl, $supabaseKey);

// Check if image file was submitted
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imageFile = $_FILES['image']['tmp_name']; // Temporary file path on the server
    $storagePath = 'pic/'; // Storage path in Supabase bucket
    $storageFilename = $_FILES['image']['name']; // Filename in the storage bucket
  
    // Upload image file to Supabase storage
    $result = $supabase->storage()->uploadFile($storagePath, $storageFilename, $imageFile);
  
    // Check if upload was successful
    if (!$result['error']) {
      // Retrieve metadata of the uploaded image
      $imageUrl = $result['data']['url']; // URL of the uploaded image
      $imageSize = $result['data']['size']; // Size of the uploaded image
  

      }
  

  // Insert image metadata into the database
  $query = "INSERT INTO images (file_name, file_url) VALUES ('$image_name', '$image_url')";
  $result = pg_query($conn, $query);

  // Check if insert was successful
  if ($result) {
    echo "Image uploaded and metadata inserted into database successfully.";
  } else {
    echo "Failed to insert image metadata into database: " . pg_last_error();
  }
} else {
  echo "Failed to upload image to Supabase storage: " . $result['message'];
}

?>

<!DOCTYPE html>
<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="image" id="image">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>