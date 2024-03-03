<div class="container mt-5" style="max-width: 500px;">
  <div class="card p-3">
    <h2 class="mb-3 text-center">Login Form</h2>
    <form method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Email</label>
        <input type="text" class="form-control" id="username" name="email" >
      </div>
      
      <div class="text-center">
      <?php
            checkerro();
        ?>   
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
  </div>
</div>