<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header">

            <h3>Upload Image Untuk di Kompresi</h3>
        </div>
        <div class="card-body">
            <form action="{{route('compress')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" class="form-control" name="image">
                <input type="submit" class="btn btn-primary mt-3">
            </form>

        </div>
    </div>
</div>

</body>
</html>
