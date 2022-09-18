<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;

class CategoryController extends Controller
{
    //
    public function index(){
        $Categorys = Category::all();
        return response()->json($Categorys);
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required|string|max:30",
          ]);
        
        $datos=$request->all();

        try{
            $Category = new Category();
            $Category->name = $datos['name'];
            $Category->saveOrFail();
        }
        catch (Exception $e) {
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
            
        }
        
        return response()->json([
            'success' => 'ok',
            'message' => 'Guardado satisfactorio'
        ]);
    }

    public function get($id){
        
        try{
            $Category=Category::findOrfail($id);
            return response()->json($Category);
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }
       
    }

    public function update($id,Request $request){
        $request->validate([
            "name" => "required|string",
            "active" => "required|numeric",
          ]);
        
        try{
            $datos=$request->all();
            $Category = Category::findOrfail($id);
            $Category->name = $datos['name'];
            $Category->activo = $datos['active'];
            $Category->saveOrFail();

        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }
       
        return response()->json([
            'success' => 'ok',
            'message' => 'Modificación satisfactoria'
        ]);
    }

    public function delete($id){
       
        try{
            $Category=Category::findOrfail($id);
            $Category->activo = 0;
            $Category->saveOrFail();
            
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => 'ok',
            'message' => 'categoria inactiva'
        ]);
    }
    
}
