@extends('vistas.fondoinicio')
<link href="{!! asset('estilo/css/inicio-de-sesion.css') !!}" rel="stylesheet">
        <form action="login" method="POST">
             @csrf
             <br></br>
                <br></br>
                    <p class="titulo">Ingresar</p>
                <br></br>
                <center>
                    <div class="contenedor"> 
                         <div>
                             <img src="/icon/person2.svg" width="40" height="40" alt="Usuario">
                             <input type="text" name="nempleado" id="" placeholder="Número de empleado o email">
                         </div>
                         <br></br>
                         <div>
                             <img src="/icon/key.svg" width="40" height="40" alt="Contraseña">
                             <input type="password" name="password" id="" placeholder="Contraseña">
                         </div>
                         <div>
                            <button type="submit" class="btn btn-2"><p class="btntext">Iniciar sesión</p></button>
                         </div>
                    </div>
                </center>
        </form>
    </body>
</html>