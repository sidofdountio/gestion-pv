
<?php

// DISPLAY ERROR IN DEVELOPMENT MODE.
error_reporting(-1);
ini_set("display_errors",1);

// CALLBACK MESSAGE
$my_handler_error = function(int $errType,string $errMessage, string $errFile,int $errLine){

    
    switch($errType){

        case E_USER_ERROR:
            echo "ERROR ".$errMessage. "WAS HANDLER ON FILE ".$errFile. "AT LINE ".$errLine;
            break;
        case E_USER_WARNING:
            echo "ERROR ".$errMessage. "WAS HANDLER ON FILE ".$errFile. "AT LINE ".$errLine;
            break;
        
        case E_USER_NOTICE:
            echo "ERROR ".$errMessage. "WAS HANDLER ON FILE ".$errFile. "AT LINE ".$errLine;
            break;
        default:
            echo "ERROR ".$errMessage;
            break;
    }
};

set_error_handler($my_handler_error);
//
 


function init_php_session():bool{
    if(!session_id()){
        session_start();
        session_regenerate_id();
        return true;
    }
    return false;
}

function destroy_php_session():void{
    session_unset();
    session_destroy();
}
function is_logged():bool{
    if(isset($_SESSION['email'])){
        
        return true;
    }
    else{
        header('Location: http://localhost/gestion-pv/pages/auth/login.php') ;
    }
  
    return false;
}


function getChoriste():string{
    
    // $SQL_NUMBEROFFEMALE = "SELECT COUNT(*) FROM choriste WHERE sexe='female' ";
  
    return 0;
}

?>