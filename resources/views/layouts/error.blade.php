<!DOCTYPE html>
<html>
<head prefix="og: http://ogp.me/ns#">
    @include('layouts.includes.head')
    <link href="https://fonts.googleapis.com/css?family=Roboto:400" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Roboto';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
            width: 100%;
        }

        .container a {
            text-decoration: none;
            color: #0f7b9f;
            transition: .3s ease-in-out;
        }

        .container a:hover {
            color: #000;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
@yield('content')
</body>
</html>
