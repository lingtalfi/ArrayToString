<?php

namespace ArrayToString;


use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;

class ArrayToStringTool
{

    public static function toPhpArray(array $array)
    {
        return ArrayToStringUtil::create()->setSymbolManager(new PhpArrayToStringSymbolManager())->toString($array);
    }

}
