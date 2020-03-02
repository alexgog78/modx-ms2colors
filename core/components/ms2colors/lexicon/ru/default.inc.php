<?php

$prefix = 'ms2colors.';

$_lang['ms2colors'] = 'ms2Colors';
$_lang[$prefix . 'management'] = 'Цвета товаров';

$files = scandir(dirname(__FILE__));
foreach ($files as $file) {
    if (strpos($file, '.inc.php')) {
        @include_once $file;
    }
}

