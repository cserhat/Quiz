<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quiz Time | Scoreboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <body>
  <?php include 'Includes/header.php';?>

  <div class="container">
  <table class="table">
  <tbody>
    <tr>
      <td>Usernmae</td>
      <td>Date</td>
      <td>Score</td>
    </tr>
    <tr>
      <td><?php
      if(isset( $_SESSION['username']))
      {
       echo $_SESSION['username'];
      }
      else
      { 
        echo 'Login to see!!';
      }?>
      </td>
      <td>
      <?php
      if(isset( $_SESSION['username']))
      {
        date_default_timezone_set('UTC');
        echo date('l jS \of F Y h:i:s A');
      }
      else
      { 
        echo 'Login to see!!!';
      }?>
      </td>
      <td><?php
      if(isset( $_SESSION['username']))
      {

       if(isset( $_SESSION['score']))
       {
        $result = $_SESSION['score'] * 100 ;
            $resultfinal = $result / 24;
            echo intval($resultfinal);
       }
       else{
        echo 'Play to see!!!';
       }
      }
      else
      { 
        echo 'Login to see!!!';
      }
      ?></td>
    </tr>
  </tbody>
</table>
  </div>
  <?php include 'Includes/footer.php';?>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js+bootstrap.min.js+main.js.pagespeed.jc.7FwlHfkurm.js"></script><script>eval(mod_pagespeed_CBBWm0kOYU);</script>
<script>eval(mod_pagespeed_c2TcxvXVLy);</script>
<script>eval(mod_pagespeed_IMbO7EYY06);</script>
<script defer="" src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon="{&quot;rayId&quot;:&quot;7556141868830ff6&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2022.8.1&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>