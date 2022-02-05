<?php 

if(isset($_POST['login']) && $_POST['login'] == 1) {
    $cantidad = $db->count("select * from users where username = '$_POST[documento]' and password = '$_POST[password]'");
    if($cantidad == 1) {
        $_SESSION['admin']['activado'] = true;
        $_SESSION['admin']['db'] = $db->fetch("select * from users where username = '$_POST[documento]' and password = '$_POST[password]'");
        $_SESSION['admin']['time'] = time() + 3600;
        header('Location: index.php');
        die();
    } else {
        $error = "login";
    }
}

if(!isset($_SESSION['admin']['activado']) || $_SESSION['admin']['activado'] == false) {
    
    session_destroy();
    session_start();

    if(isset($error) && $error == 'login') {$_SESSION['errores'] = 'login';}

    $_SESSION['admin']['activado'] = false;
    armar_vista("log");
    die();

} elseif($_SESSION['admin']['activado'] == true) {
    /**
     * Calcular estado temporal de la session: 1 hora -> 3600
     */
    if($_SESSION['admin']['time'] < time()) {
        $_SESSION['admin']['activado'] = false;
        header('Location: index.php');
        die();
    }

}