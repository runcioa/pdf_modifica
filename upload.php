<?php



if (isset($_FILES["file3"]) ) {
  $file1 = $_FILES["file3"];
  
  $file1_name = basename($file1["name"]);
 
  if (move_uploaded_file($file1["tmp_name"],  $file1_name)) {
    echo "Files uploaded successfully!";
  } else {
    echo "Error uploading files.";
  }
} else {
    echo ('nessun file');
}

?>