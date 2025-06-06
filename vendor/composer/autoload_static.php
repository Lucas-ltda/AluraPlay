<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit439f387977167014c7d636e7a11e08a6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Mvc\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Mvc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit439f387977167014c7d636e7a11e08a6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit439f387977167014c7d636e7a11e08a6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit439f387977167014c7d636e7a11e08a6::$classMap;

        }, null, ClassLoader::class);
    }
}
