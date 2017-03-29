<!DOCTYPE html>
<html>
<head>
    <title>Lab Framwork</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
            margin-top: -50px;
            font-weight: 600;
        }
        .line {
            font-size:40px ;
            margin-top: 20px;
            color: black;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Alpaca Admin</div>
        <span class="line"><b>{$name}</b></span>
    </div>
</div>
</body>
</html>