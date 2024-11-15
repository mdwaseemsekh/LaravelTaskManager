<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload Test</title>
</head>
<body>
    @if(session()->has('upload-success'))
    <h4>{{session('upload-success')}} </h4>
    @endif
    <form action="/savefile" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="" accept="jpg">
        <input type="submit" value="Submit">
    </form>
</body>
</html>