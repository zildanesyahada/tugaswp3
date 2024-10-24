<!DOCTYPE html>
<html>
<head>
    <title>{{$judul}}</title>
</head>
<body>
    <h1>Registrasi</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Kata Sandi:</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Konfirmasi Kata Sandi:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <label for="hp">No HP:</label>
        <input type="text" id="hp" name="hp" required>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
