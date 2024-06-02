<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Request;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function dataTables()
    {
        $limit = $_REQUEST['length'];
        $offset = $_REQUEST['start'];
        $draw = $_REQUEST['draw'];
        $search = $_REQUEST['search']['value'];

        $products = Product::limit($limit)->offset($offset);

        if( !empty($search) ){
            $products =  $products->whereRaw("brand like '%{$search}%' or product_model like '%{$search}%' or description like '%{$search}%'");
        }

        $products = $products->get();


        $total = Product::count();

        $dados = [];
        foreach($products as $product){

            $dados[] = [
                'id' => $product->id,
                'description' => $product->description,
                'brand' => $product->brand,
                'product_model' => $product->product_model,
                'department' => $product->department->description,
                'group' => $product->group->description,
                'price' => $product->price,
                'status' => empty($product->status) ? "Inactive" : "Active"
            ];
        }


        return [
            "draw" => $draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $dados
        ];
    }
}
