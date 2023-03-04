<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class SearchController extends Controller
{
        public function autocomplete(Request $request)
        {
                $data = Produtos::select("nome", "id", "imagem", "preco")
                        ->where('nome', 'LIKE', "%{$request->term}%")
                        ->get();

                return response()->json($data);
        }


        public function autocomplete2(Request $request)
        {

                $path = storage_path("ncm.json"); 

                $json = json_decode(file_get_contents($path), true);

                return $json;
        }
}
