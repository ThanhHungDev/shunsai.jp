<?php 
// Ensure we have session
if(session_id() === ""){
    session_start();
}
class Session {

public static $cookieTime;

public function __construct() {
    $this->cookieTime = strtotime('+30 days');
    // Ensure we have session
}

/**
 * @param $name
 * @param $value
 */
public static function set($name, $value) {
    $_SESSION[$name] = $value;
}

/**
 * @param $base
 * @param $key
 * @param $value
 */
public static function setMulti($base, $key, $value) {
    $_SESSION[$base][$key] = $value;
}

/**
 * @param $name
 * @return mixed
 */
public static function get($name) {
    if (isset($_SESSION[$name])) {
        return $_SESSION[$name];
    }
    return null;
}
/**
 * @param $name
 * @return mixed
 */
public static function getFlash($name) {
    if (isset($_SESSION[$name])) {
        $data = $_SESSION[$name];
        unset($_SESSION[$name]);
        return $data;
    }
    return null;
}

/**
 * @param $base
 * @param $key
 * @return mixed
 */
public static function getMulti($base, $key) {
    if (isset($_SESSION[$base][$key])) {
        return $_SESSION[$base][$key];
    }
    return $_SESSION[$base][$key];
}

/**
 * @param $name
 */
public static function kill($name) {
    unset($_SESSION[$name]);
}

/**
 * Destroy session
 */
public static function killAll() {
    session_destroy();
}

/**
 * @param $name
 * @param $value
 */
public static function setCookie($name, $value) {
    setcookie($name, $value, self::$cookieTime);
}

/**
 * @param $name
 * @return mixed
 */
public static function getCookie($name) {
    return $_COOKIE[$name];
}

/**
 * @param $name
 */
public static function killCookie($name) {
    setcookie($name, null);
}
}