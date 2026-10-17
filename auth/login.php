<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Literaline</title>

    <!-- Font Literaline -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background-image:
                linear-gradient(
                    rgba(51, 37, 31, 0.45),
                    rgba(90, 31, 43, 0.45)
                ),
                url('../assets/images/ratu/login-bg.jpg');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            font-family: 'Poppins', sans-serif;
            color: #33251F;
        }

        .login-box {

            width: 500px;
            padding: 45px 40px;

            background: rgba(255, 249, 240, 0.96);

            border: 1px solid #B08D57;
            border-radius: 20px;

            box-shadow: 0 10px 30px rgba(51, 37, 31, 0.15);

        }



        .logo {
            text-align: center;
            font-family: 'Great Vibes', cursive;
            font-size: 55px;
            color: #5A1F2B;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            color: #7A3543;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;

            font-size: 14px;
            font-weight: 600;
            color: #5A1F2B;
        }

        input {
            width: 100%;
            padding: 13px 15px;

            border: 1px solid #D8BFA8;
            border-radius: 10px;

            background-color: #FDF8F2;

            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #33251F;
        }

        input:focus {
            outline: none;
            border-color: #B08D57;
        }

        button {
            width: 100%;
            padding: 13px;

            margin-top: 5px;

            border: none;
            border-radius: 10px;

            background-color: #5A1F2B;
            color: #FFF9F0;

            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;

            cursor: pointer;
        }

        button:hover {
            background-color: #7A3543;
        }
    </style>
</head>

<body>

    <div class="login-box">

        <div class="logo">
            Literaline
        </div>

        <div class="subtitle">
            A Digital Space Where Stories Come Alive
        </div>

        <form action="proses_login.php" method="POST">

            <div class="form-group">
                <label for="username">Username</label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit">
                Login
            </button>

        </form>

    </div>

</body>
</html>