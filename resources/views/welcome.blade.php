@extends('vistas.fondoinicio')
<div class="log"></div>
<div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h1 class="login-heading mb-4">Inicio de sesión</h1>

              <!-- Sign In Form -->
              <form action="login" method="POST">
              @csrf
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="nempleado">
                  <label for="floatingInput">E-mail o Número de empleado</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                  <label for="floatingPassword">Contraseña</label>
                </div>

                <div class="form-check mb-3">
                  <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                  <label class="form-check-label" for="rememberPasswordCheck">
                    Recordar contraseña
                  </label>
                </div>

                <div class="d-grid">
                  <button type="submit" class="btn btn-lg btn-danger btn-login text-uppercase fw-bold mb-2" type="submit">Ingresar</button>
                  
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <footer></footer>
    </body>
</html>