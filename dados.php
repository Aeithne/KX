<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Welcome - KX - クラシックX</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style2.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Poiret+One|Quicksand&display=swap" rel="stylesheet">
</head>
<body>

  <div class="row ">
    <div class="col-2 menu ">
      <img src="https://66.media.tumblr.com/c2e924b17e951a709c0061c8db6378f2/tumblr_put8w1rFi81vivwuao1_r1_100.png" class="avatar rounded">

      <!-- Table  -->
    <table class="table">
      <thead>
        <tr>
          <th><i class="fas fa-home mr-2 black-text" aria-hidden="true"></i><a href="welcome.html">Home</a> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><i class="fas fa-users mr-2 black-text" aria-hidden="true"></i>Profiles</td>
        </tr>
        <tr>
          <td><i class="fas fa-video mr-2 black-text" aria-hidden="true"></i><a href="filmes.html">Movies</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-film mr-2 black-text" aria-hidden="true"></i><a href="indie.html">Indies</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-user-circle mr-2 black-text" aria-hidden="true"></i><a href="functions.php?acao=exibir">Account</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-question-circle mr-2 black-text" aria-hidden="true"></i><a href="#help" data-toggle="modal" data-target="#help">Help</a></td>
        </tr>
        <tr>
          <td><i class="fas fa-door-open mr-2 black-text" aria-hidden="true"></i><a href="KX-PAGINAINICIAL.html">Logoff</a></td>
        </tr>
      </tbody>
      <!-- Table body -->
    </table>
</div>

    <?php
    
        session_start();

        isset($_SESSION['nome']) ? $nomeUser = $_SESSION['nome'] : $nomeUser  = NULL;
        isset($_SESSION['email']) ? $emailUser = $_SESSION['email'] : $emailUser  = NULL;
        isset($_SESSION['tipo']) ? $tipoUser  = $_SESSION['tipo'] :$tipoUser   = NULL;
        isset($_SESSION['user']) ? $userUser = $_SESSION['user'] : $userUser  = NULL;

        #print_r($_SESSION);
        
        echo "<div class='col-8 filmes'>
        <div class='text-center welcome'>
          <h1>YOUR ACCOUNT</h1>
                <div class='row'><div class='col-2'>Name:</div> <div class='col-6'>$nomeUser </div></div>
                <div class='row'><div class='col-2'>Email:</div> <div class='col-6'>$emailUser </div></div>
                <div class='row'><div class='col-2'>Type:</div> <div class='col-6'>$tipoUser </div></div>
                <div class='row'><div class='col-2'>User:</div> <div class='col-6'>$userUser </div></div>
            </div>
        </div>";

    ?>

    
  </div>
  
  <div class="modal fade" id="help" tabindex="-1" role="dialog" aria-labelledby="help"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Help</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3 modal-text">
        <div class="md-form mb-5">
          <h5 class="text-center subtitle">Frequently Questions</h5>
         <p> How do profiles work on my KX account? </p>
          The profiles allow the residents of your residence to have a personal and individualized experience in KX from the movies they like best. You can have up to five different profiles in a single KX account.
          <br>
          <br>
         <p> How do I enable or disable subtitles, captions, and alternate songs on my device? </p>

          KX lets you enable or disable subtitles, closed captions, and alternate audio for multiple movies. Choose which audio and subtitle option in your preferred language.
          <br>
          <br>
         <p> Why is not KX working? </p>

          If the KX is not working, the reason may be a network connection problem, a problem with the device, or a problem with the KX application or account. To re-watch, first check if there is a code or error message on the screen. Specific instructions for your problem will be displayed.
          <br>
          <br>
         <p> KX is in the wrong language. </p>

          If your KX audio, subtitles, or profile is in a completely wrong language, or if your preferred language is not available in a title, this may indicate that there is a problem with your profile or device settings. Follow the on-screen instructions to adjust the language settings.
          <br>
          <br>
         <p> How do I find series and movies available on KX? </p>

         KX uses a variety of methods to help you find series and movies to watch. You can find them in the "Recommendations", using the search or browsing the categories.
          <br>
          <br>
          <p>Can I watch KX titles on Ultra HD?</p>
          
          KX Ultra HD broadcasts are now available on multiple 4k devices.

          What do I need to watch KX in Ultra HD?

          A 60 Hz computer monitor compatible with the KX Ultra HD transmission.

          From a plan compatible with Ultra HD transmission.

          A stable Internet connection with a speed of 25 megabits per second or higher.

          Transmission quality set to Automatic (Auto) or High (High). For more information, see the video quality settings in the Playback Settings article.
        </div>

      </div>

    </div>
  </div>
</div>

      
  <footer>
    <div class="footer">
        <div class="footer-end text-end">
            © KX - クラシックX
        </div>
    </div>
</footer>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>        