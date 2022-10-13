<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use Exception;

class StoreController extends Controller
{
    //
    public function index(){
        $Almacenes = Store::all();
        return response()->json($Almacenes);
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required|string|max:30",
            "business_id" => "required|numeric",
          ]);
        
        $datos=$request->all();

        try{
            $store = new Store();
            $store->name = $datos['name'];
            $store->business_id = $datos['business_id'];
            $store->saveOrFail();
        }
        catch (Exception $e) {
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
            
        }
        
        return response()->json([
            'success' => 'ok',
            'message' => 'Guardado exitoso'
        ]);
    }

    public function get($id){
        
        try{
            $store=Store::findOrfail($id);
            return response()->json($store);
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }
       
    }

    public function update(Request $request,$id){
        $request->validate([
           // "store_id" => "required|numeric",
            "business_id" => "required|numeric",
            "name" => "required|string",
            "isActive" => "required|numeric",
          ]);
        
        try{
            $datos=$request->all();
            $store = Store::findOrfail($id);
            $store->name = $datos['name'];
            $store->business_id = $datos['business_id'];
            $store->isActive = $datos['isActive'];
            $store->saveOrFail();
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
            $store=Store::findOrfail($id);
            $store->isActive = 0;
            $store->saveOrFail();
            
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => 'ok',
            'message' => 'Almacen desactivado'
        ]);
    }
    
}
