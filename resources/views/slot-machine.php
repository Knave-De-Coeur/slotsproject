<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lumen Slot Machine</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">


</head>
<body>
<div class="container">
    <h1>Welcome to Slots!</h1>
    <div class="info">
        <p>The rules are simple, place your bet of 1 Euro (100 cents), click slot, then wait view the results in the table.</p>
        <p>The results are thus; </p>
        <ul>
            <li>3 symbols in a row = 20% of bet </li>
            <li>4 symbols in a row = 200% of bet </li>
            <li>All (5) symbols in a row = 1000% of bet </li>
        </ul>
        <p>Press below to start playing</p>
        <a href="<?php echo $route; ?>">Play!</a>
    </div>
</div>
</body>
</html>
