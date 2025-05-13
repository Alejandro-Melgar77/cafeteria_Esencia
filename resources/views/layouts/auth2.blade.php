<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión - La Esencia</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('images/la_esencia_full_page.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #6b4f3b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: red;
            text-align: center;
            display: none;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body style="background-color: #6b4f3b">

    @yield('content')

    <script>
        function validateLogin() {
            const user = document.getElementById('username').value;
            const pass = document.getElementById('password').value;
            const error = document.getElementById('errorMsg');

            if (user === 'admin@gmail.com' && pass === 'password') {
                window.location.href = 'index.html';
            } else {
                error.style.display = 'block';
            }
        }
    </script>
</body>

</html>
