<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h2>Login do Administrador</h2>

    <form action="{{ route('admin.login.post') }}" method="POST">
        @csrf
        <label>Email:</label>
        <input type="email" name="email">

        <label>Senha:</label>
        <input type="password" name="password">

        <button type="submit">Entrar</button>
    </form>

    @if ($errors->any())
        <div style="color:red">
            {{ $errors->first() }}
        </div>
    @endif
</body>
</html>
