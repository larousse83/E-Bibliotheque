<?php

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Service\FileUploader;

return static function (ContainerConfigurator $container) {

    $services = $container->services();

    $services->set(FileUploader::class)
        ->arg('$targetDirectory', '%media_object%')
    ;
};