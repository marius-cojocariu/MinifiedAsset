<?php

Laravel\Autoloader::map(array(
    'MinifiedAsset_Container' => Bundle::path('minified-asset') . DS . 'lib' . DS . 'MinifiedAsset_Container.php', 
    'MinifiedAsset' => Bundle::path('minified-asset') . DS . 'lib' . DS . 'MinifiedAsset.php', 
    
    'Minify' => Bundle::path('minified-asset').'lib'.DS.'minify'.DS.'min'.DS.'lib'.DS.'Minify.php', 
    'Minify_Controller_Asset' => Bundle::path('minified-asset') . 'lib' . DS . 'minify' . DS . 'min' . DS . 'lib' . DS . 'Minify' . DS . 'Controller' . DS . 'Asset.php',
    'Minify_Controller_Base' => Bundle::path('minified-asset') . 'lib' . DS . 'minify' . DS . 'min' . DS . 'lib' . DS . 'Minify' . DS . 'Controller' . DS.'Base.php', 
    'Minify_CSS' => Bundle::path('minified-asset') . 'lib' . DS . 'minify' . DS . 'min' . DS . 'lib' . DS . 'Minify' . DS . 'CSS.php',
    'JSMin' => Bundle::path('minified-asset') . 'lib' . DS . 'minify' . DS . 'min' . DS . 'lib' . DS . 'JSMin.php'
));

Laravel\Autoloader::alias('MinifiedAsset_Container', 'Asset_Container');
Laravel\Autoloader::alias('MinifiedAsset', 'Asset');

IoC::singleton('Minify', function()
{
    return new Minify();
});