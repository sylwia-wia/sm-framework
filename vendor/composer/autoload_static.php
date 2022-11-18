<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit053b2544b1ef361c67dec5b235c8f7d4
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'sm\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'sm\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit053b2544b1ef361c67dec5b235c8f7d4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit053b2544b1ef361c67dec5b235c8f7d4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit053b2544b1ef361c67dec5b235c8f7d4::$classMap;

        }, null, ClassLoader::class);
    }
}
