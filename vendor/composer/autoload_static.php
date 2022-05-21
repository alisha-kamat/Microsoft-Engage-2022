<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8ea0b8025ebf6475632072e475db58a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8ea0b8025ebf6475632072e475db58a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8ea0b8025ebf6475632072e475db58a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb8ea0b8025ebf6475632072e475db58a::$classMap;

        }, null, ClassLoader::class);
    }
}