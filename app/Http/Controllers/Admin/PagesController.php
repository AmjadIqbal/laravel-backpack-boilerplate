<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PagesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PagesController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PagesController extends CrudController
{
    use \App\Http\Controllers\Admin\Operations\BaseOperation;
    use \App\Http\Controllers\Admin\Operations\OperationRoute;
    use \App\Http\Controllers\Admin\Operations\OperationPage;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Pages::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/pages');
        CRUD::setEntityNameStrings('pages', 'pages');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->label('ID');
        CRUD::column('title')->label('Title');
        CRUD::column('slug')->label('Identifier');
        CRUD::column('status')->label('Status');
        CRUD::column('updated_at')->label('Updated At')->type('datetime');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PagesRequest::class);
        
        CRUD::field('title')->label('Name')->type('text')->validationRules('required')->attributes(["data-target" => "post_title"])->size(6)->tab('General');

        CRUD::field('slug')->label('Identifier')->type('text')->validationRules('required')->attributes(["data-render" => "post_name"])->size(6)->tab('General');

        CRUD::field('content')->label("Description")->type('summernote')->tab('General');

        CRUD::field('status')->label('Status')->type('select_from_array')->default('publish')->options([ 'publish' => 'Publish', 'draft' => 'Draft' ])->size(6)->tab('General');

        CRUD::field('meta_sperator')->type('seperator')->value('Meta Section')->tab('General');

        CRUD::field('meta_title')->label('Meta Title')->meta_key('meta_title')->type('text')->tab('General');

        CRUD::field('meta_keywords')->label('Meta Keyword')->meta_key('meta_keyword')->type('text')->tab('General');
            
        CRUD::field('meta_description')->label('Meta Description')->meta_key('meta_description')->type('text')->tab('General');

    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
