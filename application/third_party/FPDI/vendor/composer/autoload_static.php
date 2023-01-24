<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2df837b78b46e1e395eb3a1e278264df
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2df837b78b46e1e395eb3a1e278264df::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2df837b78b46e1e395eb3a1e278264df::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2df837b78b46e1e395eb3a1e278264df::$classMap;

        }, null, ClassLoader::class);
    }
}
