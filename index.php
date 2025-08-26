<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

require_once __DIR__ . '/src/cg_bestcategories.php';

function autoload($class_name) {
    $file = __DIR__ . '/src/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

spl_autoload_register('autoload');

$module = new CgBestCategories();
$module->run();
?>