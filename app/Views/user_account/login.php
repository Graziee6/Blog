<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <title>Login</title>
</head>
<body  class="bg-dark">
  <div class="container">
      <div class="row justify-content-center mt-5 p-5">
        <div class="col-6 border p-5 bg-light">
          <h1>Sign In</h1>
          <?php if(session()->getFlashdata('msg')):?>
            <div class="alert alert-danger"><?=session()->getFlashData('msg')?></div>
          <?php endif;?>
          <form action="/login/auth" method="POST">
            <div class="mb-3">
              <label for="InputForEmail" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email')?>" required>
            </div>
            <div class="mb-3">
              <label for="InputForPassword" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="InputForPassword" value="<?= set_value('email')?>">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
          <a href="http://localhost/Password/">forgot password</a>
        </div>
      </div>
  </div>
   <!-- Popper.js first, then Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>
</html>