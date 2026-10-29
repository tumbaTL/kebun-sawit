<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Sihombing Group</title>

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
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #d2ddd2;
            border-radius: 9px;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 15px;
            border: none;
            border-radius: 9px;
            background: #08752b;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            color: #c62828;
            margin-top: 12px;
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Buat Password Baru</h1>
        <p>Gunakan password baru minimal 8 karakter.</p>

        @if ($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required
                autocomplete="email">

            <label for="password">Password baru</label>
            <input type="password" id="password" name="password" required minlength="8" autocomplete="new-password">

            <label for="password_confirmation">Konfirmasi password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8"
                autocomplete="new-password">

            <button type="submit">Simpan Password Baru</button>
        </form>
    </div>
</body>

</html>