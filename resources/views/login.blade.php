<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Kebun Sawit</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }


        body {

            height: 100vh;

            background: #f7f7f7;

            display: flex;

            justify-content: center;

            align-items: center;

        }


        /* CONTAINER */

        .container {

            width: 950px;

            height: 720px;

            background: white;

            display: flex;

            box-shadow: 0 5px 25px rgba(0, 0, 0, .1);

            border-radius: 8px;

            overflow: hidden;

        }


        /* LEFT */

        .left {

            width: 35%;

            background:
                linear-gradient(rgba(0, 50, 15, .55),
                    rgba(0, 50, 15, .55)),
                url('{{ asset("images/sawit.jpg") }}');


            background-size: cover;

            background-position: center;


            display: flex;

            flex-direction: column;

            justify-content: center;

            align-items: center;

            color: white;

            text-align: center;

        }



        .logo {

            width: 110px;

            height: 110px;

            background: white;

            border-radius: 50%;

            display: flex;

            justify-content: center;

            align-items: center;

            overflow: hidden;

            margin-bottom: 40px;

        }


        .logo img {

            width: 80%;

            height: 80%;

            object-fit: contain;

        }



        .left p {

            font-size: 18px;

            font-weight: 600;

            line-height: 1.6;

            letter-spacing: 0.3px;

            max-width: 260px;

            text-shadow:
                0 2px 5px rgba(0, 0, 0, .5);

        }



        /* RIGHT */

        .right {

            width: 65%;

            padding: 70px 90px;

        }


        /* TITLE */

        h2 {

            font-size: 20px;

            font-weight: 600;

            margin-bottom: 10px;

        }



        .subtitle {

            font-size: 14px;

            color: #666;

            margin-bottom: 35px;

        }



        label {

            display: block;

            font-size: 14px;

            margin-bottom: 8px;

        }



        /* INPUT */


        input[type="email"],
        input[type="password"] {


            width: 100%;

            height: 55px;

            border: 1px solid #ccc;

            border-radius: 10px;

            padding: 0 20px;

            font-size: 15px;

            margin-bottom: 25px;

        }



        /* CHECKBOX */


        .remember {

            display: flex;

            align-items: center;

            gap: 10px;

            margin-bottom: 30px;

        }



        .remember input {

            width: 18px;

            height: 18px;

        }



        .remember label {

            margin: 0;

        }



        /* BUTTON */


        button {

            width: 100%;

            height: 55px;

            background: #08751b;

            border: none;

            color: white;

            border-radius: 10px;

            font-size: 16px;

            cursor: pointer;


            display: flex;

            justify-content: center;

            align-items: center;

        }



        button:hover {

            background: #066414;

        }



        /* FORGOT */


        .forgot {

            text-align: center;

            margin-top: 35px;

            color: #08751b;

            font-size: 14px;

        }



        /* FOOTER */


        .footer {

            text-align: center;

            margin-top: 45px;

            color: #888;

            font-size: 13px;

        }
    </style>


</head>



<body>



    <div class="container">



        <div class="left">


            <div class="logo">

                <img src="{{ asset('images/logo-sg.png') }}" alt="logo">

            </div>



            <p>

                Sistem Manajemen Presisi<br>

                Untuk Pertumbuhan<br>

                Berkelanjutan

            </p>


        </div>





        <div class="right">


            <h2>

                LOGIN

            </h2>



            <div class="subtitle">

                Sudah memiliki akun?

                <span style="color:#08751b">

                    Silakan masuk.

                </span>


            </div>





            <form method="POST" action="/login">


                @csrf

                <label>

                    Username

                </label>


                <input type="email" name="email" placeholder="Masukkan username Anda">



                <label>

                    Password

                </label>


                <input type="password" name="password" placeholder="••••••••">




                <div class="remember">


                    <input type="checkbox" id="remember">


                    <label for="remember">

                        Ingat username

                    </label>



                </div>





                <button type="submit">

                    Masuk →

                </button>



            </form>





            <div class="forgot">

                Lupa nama pengguna dan kata sandi?

            </div>




            <div class="footer">

                © Sihombing Group

            </div>



        </div>


    </div>



</body>


</html>