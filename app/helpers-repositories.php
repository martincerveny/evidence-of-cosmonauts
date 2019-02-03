<?php

if (!function_exists('cosmonautRepository')) {
    /**
     * @return \App\Cosmonaut\CosmonautRepositoryInterface
     */
    function cosmonautRepository(): \App\Cosmonaut\CosmonautRepositoryInterface
    {
        static $repository = null;
        if (null === $repository) {
            $repository = app(\App\Cosmonaut\CosmonautRepositoryInterface::class);
        }
        return $repository;
    }
}
