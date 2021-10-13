<?php

namespace Controllers;

use Exception;

session_start();
if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'Home';
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}
include_once 'app/view/layouts/header.php';
include_once 'app/view/layouts/navbar.php';

?>

<?php

try {
    switch ($controller) {
        case "Home":
            include_once 'app/controllers/HomeController.php';
            $objController = new HomeController();
            try {
                switch ($action) {
                    case "index":
                        $objController->index();
                        break;
                    case "create":
                        $objController->create();
                        break;
                    case "edit":
                        $objController->edit();
                        break;
                    case "delete":
                        $objController->delete();
                        break;
                    case "seach":
                        $objController->seach();
                        break;
                    case "view":
                        $objController->view();
                        break;
                    case "sort":
                        $objController->sort();
                        break;
                    default:
                        throw new Exception("invalid action for controller manager !");
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            break;
    }
} catch (Exception $e) {
    include_once 'app/view/404.php';
}
?>
<?php
include_once 'app/view/layouts/footer.php';
?>