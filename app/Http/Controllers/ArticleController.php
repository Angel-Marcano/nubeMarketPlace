<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Carbon\Carbon;
use Exception;

class ArticleController extends Controller
{
    //
    public function index(){
        $Articles = Article::all();
        return response()->json($Articles);
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

    public function update(Request $request){
        $request->validate([
            "articulo_id"  => "required|numeric",
            "name" => "required|string|max:30",
            "preparado" => "required|numeric",
            "activo" => "required|boolean",
            "type" => "required|string",
          ]);
        
        try{
            $datos=$request->all();
            $article = Article::findOrfail($datos['articulo_id']);
            $article->name = $datos['name'];
            $article->preparado = $datos['isPrepared'];
            $article->activo = $datos['isActive'];
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
            $article->activo = 0;
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
