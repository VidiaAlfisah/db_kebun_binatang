<!DOCTYPE html>
<html>
<head>
    <!-- 1. DIUBAH DI SINI (Tab Browser) -->
    <title>Login - AquaPark Zoo</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap');

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url('src/bg3.jpg');
            background-size: 100% 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Quicksand', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
        }

        /* Kotak Pembungkus Judul */
        .header-box {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            padding: 12px 35px;
            margin-bottom: 85px; /* Ditambah jadi 85px agar foto besar tidak bertabrakan */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .header-box h1 {
            color: #ffffff;
            text-align: center;
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }

        fieldset {
            margin: 0 auto;
            width: 380px;
            padding: 55px 35px 35px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            background: rgba(15, 23, 42, 0.75) !important;
            backdrop-filter: blur(10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6);
            position: relative;
        }

        legend {
            margin: 0 auto;
            padding: 0;
            line-height: 0;
            position: absolute;
            top: -60px; /* Disesuaikan agar posisi foto besar pas di tengah border atas */
            left: 50%;
            transform: translateX(-50%);
        }

        legend img {
            border-radius: 50%;
            border: none !important; /* MENGHILANGKAN BORDER BIRU */
            object-fit: cover;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5); /* Efek bayangan halus pengganti border */
            display: block;
        }

        p.judul-login {
            color: #f0f9ff;
            font-size: 22px;
            font-weight: 700;
            text-align: center;
            margin: 10px 0 25px;
            letter-spacing: 1px;
        }

        input#input {
            margin: 10px 0;
            padding: 12px 18px;
            width: 100%;
            height: 48px;
            border: 1px solid #7dd3fc;
            border-radius: 12px;
            font-size: 15px;
            background-color: #f0f9ff;
            box-sizing: border-box;
            color: #0f172a;
            font-family: inherit;
        }

        input#input:focus {
            background: #ffffff;
            border-color: #38bdf8;
            outline: none;
            box-shadow: 0 0 12px rgba(56, 189, 248, 0.7);
        }

        input#submit {
            margin-top: 20px;
            width: 100%;
            height: 48px;
            color: #ffffff;
            background: linear-gradient(135deg, #0284c7, #0369a1) !important;
            border: none !important;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(2, 132, 199, 0.4);
            transition: all 0.3s ease;
        }

        input#submit:hover {
            background: linear-gradient(135deg, #0369a1, #075985) !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(2, 132, 199, 0.6);
        }

        p.alert-error {
            color: #f87171;
            background: rgba(127, 29, 29, 0.6);
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            margin: 0 0 15px;
            border: 1px solid #ef4444;
        }
    </style>
</head>
<body>

    <!-- Kotak Pembungkus Judul -->
    <div class="header-box">
        <!-- 2. DIUBAH DI SINI (Judul Halaman Utama) -->
        <h1> AQUAPARK ZOO </h1>
    </div>

    <form action="login_validasi.php" method="post">
        <fieldset>
            <legend align="center">
                <!-- Ukuran foto diperbesar ke 110px x 110px -->
                <img src="src/patrick2.jpg" width="110" height="110" alt="Profile">
            </legend>

            <p class="judul-login">HALLO</p>

            <?php
            if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"){
                echo "<p class='alert-error'>Username dan Password tidak sesuai !</p>";
            }
            ?>

            <table border="0" width="100%">
                <tr>
                    <td><input name="username" type="text" placeholder="Username" id="input" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td><input name="password" type="password" placeholder="Password" id="input" required></td>
                </tr>
                <tr>
                    <td><input name="login" type="submit" value="LOGIN" id="submit"></td>
                </tr>
            </table>
        </fieldset>
    </form>

</body>
</html>