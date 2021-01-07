<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\interfaces\VoyageRepositoryInterface;
use App\Repositories\Eloquent\EloquentVoyageRepository;

class RepositoryServiceProvider extends ServiceProvider

{

/**

* Register services.

*

* @return void

*/

//une nouvelle instance à chaque demande
public $bindings=[

VoyageRepositoryInterface::class => EloquentVoyageRepository::class,
];

//une instance unique pour toutes les demandes

public $singletons=[

VoyageRepositoryInterface::class => EloquentVoyageRepository::class,

];

public function register()

{

/* $this->app->bind(

VoyageRepositoryInterface::class,

EloquentVoyageRepository::class

); */

/* $this->app->singleton(VoyageRepositoryInterface::class, function ($app) {

return new EloquentVoyageRepository();

}); */

}
}
