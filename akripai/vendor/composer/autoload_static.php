<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad24c7143e8b9a3a0c561457c3bbbf83
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad24c7143e8b9a3a0c561457c3bbbf83::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad24c7143e8b9a3a0c561457c3bbbf83::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
