<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use Exception;

class BusinessController extends Controller
{
    //
    public function index(){
        $Empresas = Business::all();
        return response()->json($Empresas);
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required|string|max:30",
          ]);
        
        $datos=$request->all();

        try{
            $Business = new Business();
            $Business->name = $datos['name'];
            $Business->saveOrFail();
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
            $Business=Business::findOrfail($id);
            return response()->json($Business);
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }
       
    }

    public function update(Request $request){
        $request->validate([
            "empresa_id" => "required|numeric",
            "name" => "required|string",
            "active" => "required|numeric",
          ]);
        
        try{
            $datos=$request->all();
            $Business = Business::findOrfail($datos['empresa_id']);
            $Business->name = $datos['name'];
            $Business->activo = $datos['active'];
            $Business->saveOrFail();

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
            $Business=Business::findOrfail($id);
            $Business->activo = 0;
            $Business->saveOrFail();
            
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => 'ok',
            'message' => 'Empresa desactivada'
        ]);
    }
    
}
