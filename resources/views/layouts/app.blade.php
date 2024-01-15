<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../node_modules/flowbite/dist/flowbite.min.css">

</head>
<body>
    @yield('content')
</body>
<script src="https://kit.fontawesome.com/9ed7f141a6.js" crossorigin="anonymous"></script>
<script src="../../../node_modules/flowbite/dist/flowbite.min.js"></script>
</html>
