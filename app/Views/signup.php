<div class="container mt-5 " style="max-width: 500px;">
  <div class="card p-3 my-sm-4 mx-sm-4 ">
    <h2 class="mb-4 text-center">Registration Form</h2>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control" id="firstName" name="firstName">
      </div>
      <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lastName" name="lastName">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">IMG</label>
        <input type="file" class="form-control" id="password" name="img">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="terms" name="terms">
        <label class="form-check-label" for="terms">I agree to the terms and conditions</label>
      </div>
      
     
      <div class="text-center">
      <?php
            checkerro();
        ?> 
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
  </div>
</div>