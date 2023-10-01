<?php

namespace App\Http\Controllers\Admin\Operations;
use Illuminate\Support\Facades\Route;

trait BaseOperation
{


    private $exclude_column = ['_token','_method', '_http_referrer','_current_tab', '_save_action'];
    
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

    public function getValue( $model, $fieldName ){
        // Only fetch value from edit action
        if( $this->getId() )
        {
            $value = $model::find( $this->getId() )->value( $fieldName );
            if( !empty( $value ) ) {
                return json_decode($value);
            }
    
            return json_decode("[]");
        }
    }

    /**
     * checking If current page is edit then
     * return meta_key name only, Otherwise
     * return null
     * @param String $name
     * @return 
     */
    public function getMetaKey($name){
        $id = $this->crud->getCurrentEntryId();
        if( $id ){
            return $name;
        }
        return;
    }

    /**
     * Disable slug attribute for default pages
     * If value match then disabled the slug attribute
     * so It can not be changed
     */
    public function disabled_slug_attribute( $field, $slug = [] )
    {

        if( !empty($slug) && count( $slug ) > 0 )
        {

            foreach( $slug as $key => $value )
            {
                if( in_array( $field, $slug ) )
                {
                    return [
                        "readonly" => true
                    ];
                }else{
                    return ["data-render" => "post_name"];
                }
            }
        }
    }

}