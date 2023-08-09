      <!DOCTYPE html>
      <html lang="en">
        <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link rel="stylesheet" href="css/normalize-fwd.css" />
          <link rel="stylesheet" href="css/style.css" />
          <title>Sessions</title>
        </head>
        <body>
          <header>
            <div class="title">
              <h1>Let's PHP</h1>
            </div>

            <div class="navigation">
              <nav>
                <ul>
                  <li class="navigation-li"><a href="gears.php">Gears</a></li>
                  <li class="navigation-li"><a href="brushes.php">Brushes</a></li>
                  <li class="navigation-li"><a href="wrenches.php">Wrenches</a></li>
                  <li class="navigation-li"><a href="checkout.php">Checkout</a></li>
                  <li class="navigation-li"><a href="logout.php">Logout</a></li>
                </ul>
              </nav>
            </div>
          </header>
          
          <main>
            <h2>PHP Sessions</h2>
            <section>
              <h2>Logout Screen</h2>

              <?php

              session_start();
              require_once('config.php');

              // OUTPUT ERRORS //
              
              if (isset($_SESSION['error-messages'])) {
                // LOGOUT WITH ERRORS //
              
                echo "<h3>Errors:</h3>" . "<ul>";
                foreach ($_SESSION['error-messages'] as $error) {
                  echo "<li>$error</li>";
                }
                echo "</ul>";

                // Clear all session variables, and end session
                $_SESSION = array();
                session_destroy();

                // Lead user back to login
                echo LINK_TO_FORM;
                die();
              } else {
                // NORMAL LOGOUT //
              
                if (isset($_SESSION['timeLoggedIn'])) {
                  $_SESSION['timeLoggedOut'] = time();
                  $timeLoggedOut = $_SESSION['timeLoggedOut'];
                  $totalTime = $timeLoggedOut - $_SESSION['timeLoggedIn'];

                  echo "<p>You have been logged in for $totalTime seconds.</p>";
                }

                echo "<p>You are logged out.</p>";
                echo "<p>Thank you for visiting!</p>";
                echo LINK_TO_FORM;

                // Clear session and end session
                $_SESSION = array();
                session_destroy();
              }

              ?>
      </section>
    </main>

    <footer>
      <p>Made by a monkey. 2023</p>
    </footer>
  </body>
</html>
