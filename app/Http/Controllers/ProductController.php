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

        $columns = [
            'id',
            'description',
            'brand',
            'product_model',
            'department',
            'group',
            'price',
            'status'
        ];

        $column = array_key_exists('order',$_REQUEST) ? $columns[$_REQUEST['order'][0]['column']] : 'id';
        $order = array_key_exists('order',$_REQUEST) ? $_REQUEST['order'][0]['dir'] : 'asc';

        if( empty($search) ){
            $products = Product::limit($limit)->offset($offset)->orderBy($column,$order)->get();
            $total = Product::count();
        } else {
            $products =  Product::whereRaw("brand like '%{$search}%' or product_model like '%{$search}%' or description like '%{$search}%'");
            $total = $products->count();
            $products = $products->limit($limit)->offset($offset)->orderBy($column,$order)->get();
        }

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
                'status' => empty($product->status) ? "Inactive" : "Active",
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
