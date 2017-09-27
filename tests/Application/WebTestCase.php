<?php

namespace Application;

use Silex\WebTestCase as SilexWebTestCase;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class WebTestCase extends SilexWebTestCase
{
    /**
     * Creates the application.
     *
     * @return HttpKernelInterface
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../../src/app.php';
        require __DIR__ . '/../../config/dev.php';
        require __DIR__ . '/../../src/controllers.php';

        $app['session.test'] = true;

        return $app;
    }
}