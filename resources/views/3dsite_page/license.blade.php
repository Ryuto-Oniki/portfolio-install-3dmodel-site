<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>License</h1>

<form action="{{ route('install3dmodelsite.areaindex') }}" method="get">
    @csrf
    <button type="submit">Confirm License</button>
</form>
    
</body>
</html>