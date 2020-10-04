<?php

namespace App\Providers;

use App\Repositories\StudentRepository;
//use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
    
    $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
   $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }
}