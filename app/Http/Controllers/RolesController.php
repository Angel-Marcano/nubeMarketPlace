<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Http\Resources\Data\rolesCollection;
use Exception;

class RolesController extends Controller
{
    //
    public function index(){
        $Roles = User::with(['roles'])->
                    first();
                    $data = rolesCollection::collection($Roles->roles);
                   // dd($Roles->roles);
                    
        return response()->json($data);
    }

    
    
}
