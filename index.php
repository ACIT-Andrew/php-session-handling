<?php
require_once('config.php');

?>
      
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
    </header>

    <main>
      <h2>PHP Sessions</h2>
      <section>
        <h2>Store Login</h2>
        <?php
        session_start();

        // echo "<h3>Suggested Usernames:</h3>";
        // echo "<ul>";
        // foreach(REGISTERED_USERS as $name){
        //   echo "<li>$name</li>";
        // }
        // echo "</ul><br>";
        
        // OUTPUT ERRORS //

        if (isset($_SESSION['error-messages'])) {
          //then there are error messages, display them
          echo "<h3>Errors:</h3>"."<ul>";
          foreach ($_SESSION['error-messages'] as $error) {
            echo "<li>$error</li>";
          }
          echo "</ul>";

          // Clear error messages
          unset($_SESSION['error-messages']);
        }

        ?>
        <form action="process-form.php" method="post">
          <fieldset>
            <legend>Login</legend>
            <div>
              <label for="username">Username: </label>

              <input
                type="text"
                name="username"
                id="username"
              />
            </div>
            <div>
              <label for="password">Password: </label>

              <input
                type="password"
                name="password"
                id="password"
              />
            </div>

            <input type="submit" value="Submit" />
          </fieldset>
        </form>
      </section>
    </main>

    <footer>
      <p>Made by a monkey. 2023</p>
    </footer>
  </body>
</html>
