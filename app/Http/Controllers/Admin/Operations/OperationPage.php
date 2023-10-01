<?php

namespace App\Http\Controllers\Admin\Operations;

trait OperationPage
{

    public function includePage( $pageName )
    {
        $file = base_path("app/Http/Controllers/Admin/Pages/$pageName.php");
        if (file_exists($file)) {
            include $file;
        }
    }

}