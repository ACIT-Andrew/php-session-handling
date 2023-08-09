<?php
@session_start();
require_once('add-to-cart.php');

// Check the status of the session 'products' array 
if (!isset($_SESSION['products'])) {
    // Products array is not set, let's set it
    $_SESSION['products'] = array();

    foreach (PRODUCT_LIST as $item) {
        // Initialize session product qty to 0 if not already set
        $_SESSION['products'][$item] = 0;
    }
}

// 
if (isset($_SESSION['products'])) {
    // Check if cart is empty 
    $emptyCart;
    foreach ($_SESSION['products'] as $qty) {
        if ($qty == 0) {
            $emptyCart = true;
        } elseif ($qty > 0) {
            $emptyCart = false;
            break;
        }
    }

    // If empty, display this message
    if ($emptyCart) {
        echo "<p>Your cart is empty.</p>";
    } else {
        // Array not empty
        echo "<ul>";
        foreach ($_SESSION['products'] as $item => $qty) {
            // Iterate through product list to display quantity of items in cart
            if ($qty > 0) {
                echo "<li>$qty " . ucfirst($item) . "</li>";
            }
        }
        echo "</ul>";
    }
}



?>