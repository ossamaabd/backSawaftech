<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getListProducts()
    {
        try{

            return response()->json([
                'status' => true,
                'data' =>Product::select('id','ProductName','SupplierId','UnitPrice')
                ->with(['Supplier' => function ($query) {
                    $query->select('id', 'CompanyName');
                }])
                ->get()

            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }


    public function getListSuppliers()
    {
        try{

            return response()->json([
                'status' => true,
                'data' =>Supplier::select('id','CompanyName')
                ->get()

            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function CreateProduct(ProductRequest $req)
    {
        try{
            $Product = new Product();
            $Product->ProductName = $req->ProductName;
            $Product->SupplierId = $req->SupplierId;
            $Product->UnitPrice = $req->UnitPrice;
            $Product->save();

            return response()->json([
                'status' => true,
                'message' =>"you created product successfully"

            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getProductById($ProductId)
    {
        try{

            $Product = Product::find($ProductId);
            return response()->json([
                'status' => true,
                'data' => $Product

            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }



    public function UpdateProduct(ProductRequest $req ,$ProductId)
    {
        try{

            $Product = Product::find($ProductId);
            $Product->ProductName = $req->ProductName;
            $Product->SupplierId = $req->SupplierId;
            $Product->UnitPrice = $req->UnitPrice;
            $Product->save();
            // DB::table('products')->insert([

            //         'ProductName' => $req->ProductName,
            //         'SupplierId' => $req->SupplierId,
            //         'UnitPrice' => $req->UnitPrice,
            // ]);

            return response()->json([
                'status' => true,
                'message' =>"you updated product successfully"

            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function DeleteProduct($ProductId)
    {
        try{

            $Product = Product::find($ProductId);
            $Product->delete();
            // DB::table('products')->insert([

            //         'ProductName' => $req->ProductName,
            //         'SupplierId' => $req->SupplierId,
            //         'UnitPrice' => $req->UnitPrice,
            // ]);

            return response()->json([
                'status' => true,
                'message' =>"you deleted product successfully"

            ]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
