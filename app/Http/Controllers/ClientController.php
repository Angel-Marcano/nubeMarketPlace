<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Exception;

class ClientController extends Controller
{
    //
    public function index(){
        $Clients = Client::all();
        return response()->json($Clients);
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required|string|max:30",
            "dni" => "required|string",
            "address" => "required|string|max:150",
            "phone" => "string|max:30|nullable",
            "type_client" => "required|string|max:10",
          ]);
        
        $datos=$request->all();

        try{
            $Client = new Client();
            $Client->name = $datos['name'];
            $Client->dni = $datos['dni'];
            $Client->address = $datos['address'];
            $Client->phone = $datos['phone'];
            $Client->type_client = $datos['type_client'];
            $Client->isActive = 1;
            $Client->business_id = 1;
            $Client->saveOrFail();
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
            $Client=Client::findOrfail($id);
            return response()->json($Client);
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }
       
    }

    public function update(Request $request,$id){
     
        $request->validate([
          //  "client_id" => "required|integer",
            "name" => "required|string|max:30",
            "dni" => "required|string",
            "address" => "required|string|max:150|nullable",
            "phone" => "string|max:30|nullable",
            "type_client" => "required|string|max:10",
          ]);
  
        try{
            $datos=$request->all();
            $Client = Client::findOrfail($id);
            $Client->name = $datos['name'];
            $Client->dni = $datos['dni'];
            $Client->address = $datos['address'];
            $Client->phone = $datos['phone'];
            $Client->type_client = $datos['type_client'];
            $Client->isActive = $datos['isActive'];
            $Client->saveOrFail();

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
            $Client=Client::findOrfail($id);
            $Client->isActive = 0;
            $Client->saveOrFail();
            
        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }

        return response()->json([
            'success' => 'ok',
            'message' => 'Cliente desactivado'
        ]);
    }
    
}
