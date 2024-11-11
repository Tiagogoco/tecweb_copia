<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit168707fa292c639d9e64cee83dcd8371
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TECWEB\\MYAPI\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TECWEB\\MYAPI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/myapi',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit168707fa292c639d9e64cee83dcd8371::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit168707fa292c639d9e64cee83dcd8371::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit168707fa292c639d9e64cee83dcd8371::$classMap;

        }, null, ClassLoader::class);
    }
}