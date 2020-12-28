<?php

require_once __DIR__ . '/update.class.php';
require_once dirname(dirname(__DIR__)) . '/helpers/gridupdate.trait.php';

class ms2colorsColorUpdateFromGridProcessor extends ms2colorsColorUpdateProcessor
{
    use ms2ColorsProcessorHelperGridUpdate;
}

return 'ms2colorsColorUpdateFromGridProcessor';
