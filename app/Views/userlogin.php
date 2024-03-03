
<div class="container mt-5" style="max-width: 500px;">
  <div class="card p-3">
    <h2 class="mb-3 text-center">Rest Password</h2>
    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input type="text" class="form-control" id="username" name="email" >
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="pass" >
      </div>
      <div class="text-center">
      <?php
            checkerro();
        ?>   
        <button type="submit" class="btn btn-primary">Login</button>
        <a  class="btn btn-primary" href="<?=APP_URL?>User/forgotpass"></a>
      </div>
    </form>
  </div>
</div>