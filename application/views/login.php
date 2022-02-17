<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.css'; ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
<a class="navbar-brand" href="#">Login Form</a>
</nav>

  <div class="container">
    

    <div class="container">
      <form action="<?php echo base_url() . 'main/login' ?>" name="login" id="login" method="post">

      <div class="container">
          <p class="card-text">Please fill your detail here</p>
          <div class="form-group">
            <label for="name">UserName</label>
            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" class="form-control" <?php echo strip_tags(form_error('username') != "") ? 'is-invalid' : ''; ?> placeholder="First Name">
            <p class="invalid-feedback"> <?php echo strip_tags(form_error('username')); ?></p>
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" name="password" id="password" value="<?php echo set_value('password') ?>" class="form-control" placeholder="password">
            <p class="invalid-feedback"> <?php echo form_error('password'); ?></p>
          </div><br>

          <div class="form-group">
            <button class="btn btn-block btn-primary">Login</button>
           
          </div>
        </div>
    </div>
    </form>
  </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>