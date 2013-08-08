<?php
namespace WikiLingo\Utilities;

class Type
{
    public static function normalize($type)
    {
        $type = str_replace('WikiLingo\\\\Expression\\\\', '', $type);
        return $type;
    }
}