<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8866b7d93ea1eb2eb83edfc9a27612a4
{
    public static $files = array (
        'd1892bf1251f331c3fca628dcea389ac' => __DIR__ . '/../..' . '/App/Helpers/Functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8866b7d93ea1eb2eb83edfc9a27612a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8866b7d93ea1eb2eb83edfc9a27612a4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8866b7d93ea1eb2eb83edfc9a27612a4::$classMap;

        }, null, ClassLoader::class);
    }
}
