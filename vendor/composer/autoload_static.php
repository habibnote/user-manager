<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit650775015a4382f1a56fe0e4661f1423
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Habib\\WPLibrarySystem\\Trait\\' => 28,
            'Habib\\WPLibrarySystem\\Classes\\' => 30,
            'Habib\\WPLibrarySystem\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Habib\\WPLibrarySystem\\Trait\\' => 
        array (
            0 => __DIR__ . '/../..' . '/trait',
        ),
        'Habib\\WPLibrarySystem\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
        'Habib\\WPLibrarySystem\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit650775015a4382f1a56fe0e4661f1423::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit650775015a4382f1a56fe0e4661f1423::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit650775015a4382f1a56fe0e4661f1423::$classMap;

        }, null, ClassLoader::class);
    }
}
