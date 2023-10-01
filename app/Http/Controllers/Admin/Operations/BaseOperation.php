<?php

namespace App\Http\Controllers\Admin\Operations;

trait BaseOperation
{
    
    /**
     * Get Current CRUD id
     * @return 
     */
    public function getId(){
        $id = $this->crud->getCurrentEntryId();
        if( $id ){
            return $id;
        }
        return;
    }

}
