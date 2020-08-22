<?php


namespace App\Providers;


trait FactoryProviderTrait
{
    /**
     * @param string $className
     *
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function getFactory(string $className)
    {
        return app($className);
    }
}
