<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use Exception;

class SubCategoryController extends Controller
{
    //
    public function index($id){
        $SubCategorys = SubCategory::where('category_id', $id)->get();
        return response()->json($SubCategorys);
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required|string|max:30",
            "category_id" => "required|number",
          ]);
        
        $datos=$request->all();

        try{
            $SubCategory = new SubCategory();
            $SubCategory->name = $datos['name'];
            $SubCategory->category_id = $datos['category_id'];
            $SubCategory->saveOrFail();
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
            $SubCategory=SubCategory::findOrfail($id);
            return response()->json($SubCategory);
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }
       
    }

    public function update(Request $request,$id){
        $request->validate([
            "name" => "required|string",
            "active" => "required|numeric",
          ]);
        
        try{
            $datos=$request->all();
            $Category = SubCategory::findOrfail($id);
            $Category->name = $datos['name'];
            $Category->isActive = $datos['active'];
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
            $Category=SubCategory::findOrfail($id);
            $Category->isActive = 0;
            $Category->saveOrFail();
            
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => 'ok',
            'message' => 'Subcategoria inactiva'
        ]);
    }
    
}
