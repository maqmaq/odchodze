<?php

namespace Tcpdf\Provider;

class TcpdfServiceProvider implements \Pimple\ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param \Pimple\Container $pimple A container instance
     */
    public function register(\Pimple\Container $app)
    {
        $app['tcpdf'] = function () use ($app) {
            return (new \TCPDF());
        };
    }
}