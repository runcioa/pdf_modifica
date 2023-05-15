<?php



if (isset($_FILES["file1"]) && isset($_FILES["file2"]) ) {
  $file1 = $_FILES["file1"];
  $file2 = $_FILES["file2"];
  
  $file1_name = basename($file1["name"]);
  $file2_name = basename($file2["name"]);
 
  if (move_uploaded_file($file1["tmp_name"],  $file1_name) && move_uploaded_file($file2["tmp_name"],  $file2_name) ) {
    echo "Files uploaded successfully!";
  } else {
    echo "Error uploading files.";
  }
} else {
    echo ('nessun file');
}

?>