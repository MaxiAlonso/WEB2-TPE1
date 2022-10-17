{include 'templates/header.tpl'}

    <div class="containerLogin">
        <div class="login">
            <h1>Login</h1>
            <form class="formlogin" method="POST" action="login/verificarLogin">
                <label for="email">Email: </label>
                <input type="text" name="email" value="">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" value="">
                <input class="boton" type="submit" name="iniciarSesion" value="Iniciar Sesión">
                <p>{$msg}</p>
            </form>
        </div>
    </div>
