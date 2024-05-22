<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alquiler +</title>
    <!-- TODO: Mover estos estilos a una hoja separada -->
    <style>
        .header {
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            margin-left: 20px;
        }
        .logo img {
            height: 50px;
        }
        .precios {
            text-align: center;
        }
        .login {
            margin-right: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }
        .footer {
            background-color: #f2f2f2;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">
        <a href="index.php">
            <img src="logo.png" alt="Alquiler+">
        </a>
    </div>
    <div class="precios">
        <a href="precios.php">Precios</a>
    </div>
    <div class="login">
        <a href="login.php">Login</a>
    </div>
</div>


