<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3f38b9179eda86fcee7c8c55789a7b91
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Racinee\\PhpGestionBiblio\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Racinee\\PhpGestionBiblio\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3f38b9179eda86fcee7c8c55789a7b91::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3f38b9179eda86fcee7c8c55789a7b91::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3f38b9179eda86fcee7c8c55789a7b91::$classMap;

        }, null, ClassLoader::class);
    }
}
