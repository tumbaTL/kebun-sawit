<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Sihombing Group</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f3f6f1;
        }

        .card {
            width: 100%;
            max-width: 480px;
            padding: 35px;
            background: white;
            border: 1px solid #dce5dc;
            border-radius: 18px;
            box-shadow: 0 10px 35px #153c2512;
        }

        h1 {
            color: #123d25;
            margin-top: 0;
        }

        p {
            color: #66736a;
            line-height: 1.6;
        }

        label {
            display: block;
            margin: 22px 0 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 14px;
            border: 1px solid #d2ddd2;
            border-radius: 9px;
            font-size: 15px;
        }

        button {
            width: 100%;
            margin-top: 20px;
            padding: 15px;
            border: none;
            border-radius: 9px;
            background: #08752b;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: #075c23;
        }

        a {
            display: block;
            margin-top: 22px;
            text-align: center;
            color: #08752b;
            text-decoration: none;
        }

        .message {
            padding: 12px;
            margin-top: 15px;
            border-radius: 8px;
            background: #e8f6eb;
            color: #17652b;
        }

        .error {
            color: #c62828;
            font-size: 13px;
            margin-top: 7px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Lupa Password?</h1>

        <p>
            Masukkan alamat email yang terdaftar.
            Kami akan mengirimkan tautan untuk mengatur ulang password Anda.
        </p>

        @if (session('status'))
            <div class="message">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">Email terdaftar</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="nama@kebun.com"
                required
                autocomplete="email"
            >

            <button type="submit">Kirim Tautan Reset</button>
        </form>

        <a href="{{ route('login') }}">Kembali ke halaman login</a>
    </div>
</body>
</html>
