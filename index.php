<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica PDF</title>
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <script src="src/js/bootstrap.bundle.min.js"></script>
    <style>
        input {
            width: 500px;
            height: auto;
            /* display: block;
            margin: 10px;
            border: 1px solid black;
            content: "scegli file"; */
        }
    </style>
</head>

<body>
    <div class="container p-3">
        <div class="card p-3">
            <div class="card-title">
                <h1>Unione PDF per protocollo</h1>
            </div>
           
            <form action="eliminare_pagina_1.php" method="post" enctype="multipart/form-data">
                <div class="row py-3 ">
                    <div class="col-12">
                        <label class="form-label" for="file1">Scegli o trascina il primo file quello con solo la prima pagina</label>
                        <input class="form-control" type="file" name="file2">
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-12">
                        <label for="file2" class="form-label">Scegli o trascina il secondo file quello a cui verrà tolta la prima pagina e unito con il primo file</label>
                        <input type="file" name="file1" class="form-control">
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-6">

                        <button class="btn btn-primary" type="submit">Invia</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>



</body>

</html>