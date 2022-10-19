<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <?php include 'Includes/header.php';?>
<div class="container">
    <h1>Quiz Time</h1>
    <br>
    <div class="card">
  <div class="card-header">
    About Quiz Time
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>This is a quiz game with no rule. You can check my social network and follow me.</p>
      <footer class="blockquote-footer">Nothing to say <cite title="Source Title">Enjoy</cite></footer>
    </blockquote>
  </div>
</div>
<br>
    <?php if(isset($_SESSION['username'])){

        echo '<h1>Welcome Gamer '.$_SESSION['username'].'</h1>
        <form method="POST">
        <button type="submit" id="big" name="deconnexion" class="btn btn-danger btn-lg btn-block">Déconnexion</button>
        </form>
        <hr>
        <form method="POST">
        <button type="submit" id="big" name="reset" class="btn btn-warning btn-lg btn-block">Reset</button>
        </form>
        ';
    } else

    echo '
    <h1>Take your nickname</h1>
    <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" required placeholder="Username">
    <small id="emailHelp" class="form-text text-muted">Best gamer forever.</small>
  </div>
  <button type="submit" id="big" name="submit" class="btn btn-primary">Submit</button>
    </form>'
?>

<?php 

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $_SESSION['username'] = $username;
        header('location:/home');
    }
    if(isset($_POST['deconnexion']))
    {
        session_unset();
        session_destroy();
        header('location:/home');
    }
    if(isset($_POST['reset']))
    {
        session_reset();
        header('location:/home');
    }
?>

<?php include 'Includes/footer.php';?>
</div>
</body>
</html>