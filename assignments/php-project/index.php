<?php

ob_start();
session_start();

require "models/db.php";
require "models/users.php";
require "models/artwork.php";
require "models/item.php";

/*include views*/
include "views/header.php";

/*get action and sanitize the string*/
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

/*use switch statements to determine which page to load based on action*/
switch ($action) {
    case "home":
        include "views/home.php";
        break;
    
    case "artwork":
        include 'views/art.php';

        $dspl = filter_input(INPUT_GET,'dspl',FILTER_SANITIZE_STRING);

        $display = display($dspl);
        echo $display;

        break;

    case "item":
    	include 'views/art.php';

    	$itemId = filter_input(INPUT_GET,'id',FILTER_SANITIZE_STRING);
    	$display = itemDisplay($itemId);

    	echo $display;

    	break;
    
    case "contact":
        include "views/contact.php";
        break;
    
    case "login":
        include "views/login.php";        
        break;

    case "loginUser":
    	signIn();
    	break;

    case "logout":
    	session_destroy();

    	header("location: index.php");
    	break;

    case "signup":
    	include "views/signup.php";
    	break;

    case "createUser":
    	createUser();
    	break;

    default:
        include "views/home.php";
}

?>
	</main>
	</body>
</html>