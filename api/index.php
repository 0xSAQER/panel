<?php
// Include config file
require_once "config.php";

// Include main application files (adapt paths as needed)
if (file_exists("../Brhom/Brhom/logout.php")) {
    require_once "../Brhom/Brhom/logout.php";
}

// Check if the request is for another PHP file
$requestUri = $_SERVER['REQUEST_URI'];
$parts = explode('?', $requestUri);
$path = $parts[0];

if ($path !== '/' && $path !== '/index.php' && file_exists("../Brhom/Brhom" . $path)) {
    // Include the requested file
    include "../Brhom/Brhom" . $path;
    exit;
}

// Default to including the main index.php content
if (file_exists("../Brhom/Brhom/index.php")) {
    // Extract just the PHP code, not the PHP tags
    $content = file_get_contents("../Brhom/Brhom/index.php");
    $content = preg_replace('/^<\?php/', '', $content);
    $content = preg_replace('/\?>$/', '', $content);
    
    // Replace any references to config.php, etc.
    $content = str_replace('require_once "config.php";', '', $content);
    $content = str_replace('require_once "logout.php";', '', $content);
    $content = str_replace('require_once "header.php";', 'require_once "../Brhom/Brhom/header.php";', $content);
    
    // Execute the content
    eval($content);
} else {
    echo "Main application file not found.";
}
?> 