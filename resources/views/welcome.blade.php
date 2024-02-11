<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title of the document -->
    <title>Assigment FrontEnd</title>

    <!-- Link to Google Fonts (Nunito) -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="resources\css\app.css">

    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="antialiased">
    <div id="app">
        <example-component></example-component>
    </div>
    <script src="{{mix('js/app.js')}}" type="text/javascript"></script>
</body>

</html>