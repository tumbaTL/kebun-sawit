<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Kebun Sawit</title>


    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }


        body{
            height:100vh;
            background:#f7f7f7;
            display:flex;
            justify-content:center;
            align-items:center;
        }


        .container{

            width:950px;
            height:720px;

            background:white;

            display:flex;

            box-shadow:0 5px 25px rgba(0,0,0,.1);

            border-radius:5px;

            overflow:hidden;

        }



        .left{

            width:35%;

            background:
            linear-gradient(
                rgba(0,70,20,.4),
                rgba(0,70,20,.4)
            ),
            url('/images/sawit.jpg');


            background-size:cover;

            background-position:center;


            display:flex;

            flex-direction:column;

            justify-content:center;

            align-items:center;

            color:white;

            text-align:center;

        }



        .logo{

            width:110px;

            height:110px;

            background:white;

            border-radius:50%;

            display:flex;

            justify-content:center;

            align-items:center;

            color:#126b28;

            font-size:45px;

            font-weight:bold;

            overflow:hidden;

            margin-bottom:40px;

        }

         .logo img{
                width:80%;
                height:80%;
                object-fit:contain;
        }

        .right{

            width:65%;

            padding:70px 90px;

        }


        h2{

            font-size:18px;

            font-weight:500;

            margin-bottom:10px;

        }




        .subtitle{

            font-size:14px;

            margin-bottom:35px;

            color:#666;

        }




        label{

            display:block;

            font-size:14px;

            margin-bottom:8px;

        }




        /* INPUT USERNAME DAN PASSWORD */

        input[type="email"],
        input[type="password"]{


            width:100%;

            height:55px;

            border:1px solid #ccc;

            border-radius:10px;

            padding:0 20px;

            font-size:15px;

            margin-bottom:25px;

        }





        /* CHECKBOX */

        .remember{

            display:flex;

            align-items:center;

            gap:10px;

            font-size:14px;

            margin-bottom:30px;

        }



        .remember input[type="checkbox"]{

            width:16px;

            height:16px;

            margin:0;

            padding:0;

        }



        .remember label{

            margin:0;

            line-height:16px;

        }





        button{

            width:100%;

            height:55px;

            background:#08751b;

            border:none;

            color:white;

            border-radius:10px;

            font-size:16px;

            cursor:pointer;

        }




        .forgot{

            text-align:center;

            margin-top:30px;

            color:#08751b;

            font-size:14px;

        }





        .footer{

            position:absolute;

            bottom:40px;

            color:#888;

            font-size:13px;

        }


    </style>


</head>



<body>



<div class="container">



    <div class="left">


        <div class="logo">

            <img src="{{ asset('images/logo-sg.png') }}" alt="logo SG">    

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



            <input

                type="email"

                name="email"

                placeholder="Masukkan username Anda"

            >





            <label>
                Password
            </label>



            <input

                type="password"

                name="password"

                placeholder="••••••••"

            >





            <div class="remember">


                <input

                    type="checkbox"

                    id="remember"

                >



                <label for="remember">

                    Ingat username

                </label>



            </div>







            <button>

                Masuk →

            </button>



        </form>





        <div class="forgot">

            Lupa nama pengguna dan kata sandi?

        </div>



    </div>



</div>






<div class="footer">

© Sihombing Group

</div>



</body>


</html>