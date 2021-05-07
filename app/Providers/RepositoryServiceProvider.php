<?php

namespace App\Providers;

use App\Interfaces\CategoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepository1;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind(
            'App\Interfaces\ProductInterface',
            'App\Repositories\ProductRepository'
        );
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
    }
}
