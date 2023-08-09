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
    <section>
        <h2>PHP Sessions</h2>
        <?php
        require_once('config.php');
        require_once('session-control.php');
        ?>
      </section>
      
      <section>
          <h2>Checkout</h2>
          <p>Review your selected items or, empty your cart.</p>
          <?php
            echo "<h3>Your Cart</h3>";
            require_once('add-to-cart.php');
            require_once('display-cart.php');
            ?>
        <form method='POST' action="add-to-cart.php">
            <input type="submit" name="empty" value="Empty Cart" />
        </form>
      </section>
    </main>

    <footer>
      <p>Made by a monkey. 2023</p>
    </footer>
  </body>
</html>
