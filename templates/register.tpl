{include file="header.tpl"}



<div class="login_fondo">
    <div class="login-box">

        <h1>Registrarse</h1>
        <form action="registrar" method="POST">
            <label for="username">Username</label>
            <input name="username" type="text" placeholder="Enter Username">
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Enter Password">
            <input type="submit" value="Registrarse">
            {if $error}
                <div class="error_login">
                    *{$error}
                </div>
            {/if}
        </form>
        <a class="btn btn-light btn-circle btn-md" href="home">Home
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
      <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
    </svg>
    </a>
    </div>
</div>


<div class="img-container" >
    <img src="imagenes/resto unicen3.jpg" width=300px>

    </div>
