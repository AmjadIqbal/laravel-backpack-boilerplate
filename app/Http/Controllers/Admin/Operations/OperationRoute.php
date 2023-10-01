<?php

namespace App\Http\Controllers\Admin\Operations;

use Illuminate\Support\Facades\Route;

trait OperationRoute
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Define which routes are needed for this operation.
     *
     * @param  string  $segment  Name of the current entity (singular). Used as first URL segment.
     * @param  string  $routeName  Prefix of the route name.
     * @param  string  $controller  Name of the current CrudController.
     */
    protected function setupListRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/', [
            'as'        => $routeName.'.index',
            'uses'      => $controller.'@index',
            'operation' => 'list',
        ]);

        Route::post($segment.'/search', [
            'as'        => $routeName.'.search',
            'uses'      => $controller.'@search',
            'operation' => 'list',
        ]);

        Route::get($segment.'/{id}/details', [
            'as'        => $routeName.'.showDetailsRow',
            'uses'      => $controller.'@showDetailsRow',
            'operation' => 'list',
        ]);

        Route::get($segment.'/{id}/show', [
            'as'        => $routeName.'.show',
            'uses'      => $controller.'@show',
            'operation' => 'show',
        ]);

    }

    /**
     * Define which routes are needed for this operation.
     *
     * @param  string  $segment  Name of the current entity (singular). Used as first URL segment.
     * @param  string  $routeName  Prefix of the route name.
     * @param  string  $controller  Name of the current CrudController.
     */    
    protected function setupCreateRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/create', [
            'as'        => $routeName.'.create',
            'uses'      => $controller.'@create',
            'operation' => 'create',
        ]);
        
        Route::post($segment , [
            'as'        => $routeName.'.store',
            'uses'      => $controller.'@store',
            'operation' => 'create',
        ]);

    }

    /**
     * Define which routes are needed for this operation.
     *
     * @param  string  $name  Name of the current entity (singular). Used as first URL segment.
     * @param  string  $routeName  Prefix of the route name.
     * @param  string  $controller  Name of the current CrudController.
     */
    protected function setupUpdateRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/{id}/edit', [
            'as'        => $routeName.'.edit',
            'uses'      => $controller.'@edit',
            'operation' => 'update',
        ]);

        Route::put($segment.'/{id}', [
            'as'        => $routeName.'.update',
            'uses'      => $controller.'@update',
            'operation' => 'update',
        ]);
    }

}