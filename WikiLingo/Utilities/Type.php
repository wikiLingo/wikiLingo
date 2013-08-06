<?php
namespace WikiLingo\Utilities;

class Type
{
    public static function normalize($type)
    {
        return str_replace('WikiLingo\\\\Expression\\\\', '', $type);
    }
}