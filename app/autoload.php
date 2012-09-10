<?php

use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = include __DIR__.'/../vendor/autoload.php';

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->add('', __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/Locale/Resources/stubs');
}

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

// Use APC as autoloading to improve performance

require_once __DIR__.'/../vendor/symfony/symfony/src/Symfony/Component/ClassLoader/ApcClassLoader.php';
// Change 'sf2' by the prefix you want in order to prevent key conflict with an other application
$apcClassLoader = new Symfony\Component\ClassLoader\ApcClassLoader('sf2', $loader);
$apcClassLoader->register(true);

return $loader;