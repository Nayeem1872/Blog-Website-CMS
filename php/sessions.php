<?php
    session_start();
    function ErrorMessage(){
        if(isset($_SESSION["ErrorMessage"]))
        {
            $output ="<div class=\"alert alert-danger\">";
            $output .= htmlentities($_SESSION["ErrorMessage"]);
            $output .="</div>";
            $_SESSION["ErrorMessage"]=null;
            return $output;

        }
    }
    function SuccessMessage(){
        if(isset($_SESSION["SuccessMessage"]))
        {
            $output ="<div class=\"alert alert-success\">";
            $output .=htmlentities($_SESSION("SuccessMessage"));
            $output .="</div>";
            $_SESSION["SuccessMessage"]=null;
            return $output;

        }
    }

?>
<?php

class Session
{

    public static function init()
    {
        session_start();
    }

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    // Session Check for Faculty
    public static function checkSession()
    {
        if (self::get("login") == false) {
            self::destroy();
            header("Location:index.php");
        }
    }

    // Login Check for Faculty
    public static function checkLogin()
    {
        if (self::get("login") == true) {
            header("Location:login.php");
        }
    }
    

    // Session Destroy
    public static function destroy()
    {
        session_destroy();
        session_unset();
    }
}
?>
