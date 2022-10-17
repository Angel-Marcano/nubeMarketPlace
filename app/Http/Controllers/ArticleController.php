<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Data\articleListCollection;
use App\Models\Article;
use App\Models\Inventory;
use Carbon\Carbon;
use Exception;

class ArticleController extends Controller
{
    //
    public function index(Request $request){
        
        $request->validate([
            'store_id' => 'required|integer',
        ]);

        $data=$request->all();
        $row=isset($data['rows'])? $data['rows'] : 10;
        $business_id=isset($data['business_id'])? $data['business_id'] : 1;
        $store_id=isset($data['store_id'])? $data['store_id'] : 1;

        $Articles = Inventory::with(['article','store'])
        ->when(isset($store_id),function($query) use ($store_id){
            $query->where('store_id',$store_id);
        })
        ->whereHas('article',function($query) use($business_id){
            $query->where('business_id',$business_id);
        })
        ->get();

        $dataResponse =articleListCollection::collection($Articles);

        return response()->json([
            "data" => $dataResponse,
            "pagination" => (object)[
                "currentPage" => $Articles->currentPage(),
                "lastPage" => $Articles->lastPage(),
                "perPage" => $Articles->perPage(),
                "total" => $Articles->total()
            ]
        ]);

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
