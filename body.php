<body class="text-center">
 <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-12">
        <div class="card rounded-3 p-5 text-black d-flex gradient-custom-2">

          <div class="text-center">
            <h4 class="mt-1 mb-3 pb-1 program-head text-white">COCKFIGHTING REGISTRATION SYSTEM</h4>
          </div>

          <hr class="mb-5">
          <form id="login">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" name="username" id="floatingInput" placeholder="name@example.com" required>
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
              <label for="floatingPassword">Password</label>
            </div>
            <div>                
              <button class="btn btn-primary btn-block fa-lg gradient-custom-3 mb-3 form-control"  type="submit">Login</button>
            </div>
          </form>
          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>                  
          <div class="d-flex flex-column">
            <!--<p class="mb-0 me-2 text-white">Don't have an account?</p>-->
            <button type="button" class="btn btn-danger text-white mb-3" onclick="window.location.href='register.php'">Create new</button>
            <button type="button" class="btn btn-success text-white" onclick="window.location.href='modules/ticket_scan/'"> Procced to Ticket Scanning</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>