<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
   
    <h1>Upload</h1>
    <input type="file" name="file1" id="file1">
    <input type="file" name="file2" id="file2">

    <button id="upload-button" onclick="upload()"> Upload </button>



    <script>
        async function upload() {

            const formData = new FormData();
            const fileField1 = document.getElementById("file1");
            const fileField2 = document.getElementById("file2");

            //Deve essere il nome del file che si trova nel $_FILES del php
            formData.append("file1", fileField1.files[0]);
            formData.append("file2", fileField2.files[0]);

            try {
                const response = await fetch("/upload.php", {
                    method: "POST",
                    body: formData,
                });
                const result = await response
                console.log("Success:", result);
            } catch (error) {
                console.error("Error:", error);
            }
        }


       
    </script>



</body>

</html>