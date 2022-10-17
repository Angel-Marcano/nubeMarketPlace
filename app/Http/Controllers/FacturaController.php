<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Data\receiptsListCollection;
use App\Models\Article;
use App\Models\Receipts;
use Carbon\Carbon;

use Exception;

class FacturaController extends Controller
{
    //
    public function index(Request $request){
        $row=10;
        $store_id=1;
        $business_id=1;

        $data=$request->all();

        $Receipts = Receipts::with(['client','collection','articles',
        'articlesReceipts'=>function($q){
            $q->with(['article']);
        }
        ])
      /*  ->when(isset($store_id),function($query) use ($store_id){
            $query->where('store_id',$store_id);
        })
        ->whereHas('article',function($query) use($business_id){
            $query->where('business_id',$business_id);
        })*/
        ->get();

     

        $data =receiptsListCollection::collection($Receipts);
        return response()->json($data);      
    }

    public function post(Request $request){
        $request->validate([
            "name" => "required|string|max:30",
            "business_id" => "required|integer",
            "isPrepared" => "required|integer",
            "type" => "required|string",
            "category_id" =>"nullable|integer",
            "subCategory_id" =>"nullable|integer",
          ]);

        $datos=$request->all();

        try{
            $article = new Article();
            $article->name = $datos['name'];
            $article->business_id = $datos['business_id'];
            $article->isPrepared = $datos['isPrepared'];
            $article->category_id=isset($datos['category_id']) ? $datos['category_id'] :null;
            $article->subCategory_id=isset($datos['category_id']) && isset($datos['subCategory_id']) ? $datos['subCategory_id'] :null;
            $article->isActive = 1;
            
           
            $article->saveOrFail();
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
            $article=Article::findOrfail($id);
            return response()->json($article);

        }catch(Exception $e){
            return response()->json([
                'success' => 'error',
                'message' => $e->getMessage()
            ]);
        }
       
    }

    public function update(Request $request,$id){
        $request->validate([
           // "articulo_id"  => "required|numeric",
            "name" => "required|string|max:30",
            "preparado" => "required|numeric",
            "isActive" => "required|boolean",
            "type" => "required|string",
          ]);
        
        try{
            $datos=$request->all();
            $article = Article::findOrfail($id);
            $article->name = $datos['name'];
            $article->preparado = $datos['isPrepared'];
            $article->isActive = $datos['isActive'];
            $article->mod_date = new Date('d-m-Y H:i:s');

            $article->saveOrFail();

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
            $article=Article::findOrfail($id);
            $article->isActive = 0;
            $article->saveOrFail();
            
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
