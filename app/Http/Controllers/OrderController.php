<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Http\Requests\OrderRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $OrderId ;
    public function getListOrders()
    {
        try{

            return response()->json([
                'status' => true,
                'data' =>Order::select('id','OrderNumber','CustomerId','TotalAmount','OrderDate')
                ->with(['Customer' => function ($query) {
                    $query->select('id', 'FirstName','LastName');
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


    public function getCustomersAndProducts()
    {
        try{

            $Customers = Customer::select('id','FirstName','LastName')->get();
            $Products = Product::select('id','ProductName','UnitPrice')->get();
            return response()->json([
                'status' => true,
                'products' => $Products,
                'Customers' => $Customers

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

    public function getOrderItems($OrderId)
    {
        try{
            $this->OrderId = $OrderId;
            $Order = Order::with(['OrderItems' => function($query )
            {
                $query->where('OrderId',$this->OrderId)->get();
            }])->where('id', $OrderId)->get();

            return response()->json([
                'status' => true,
                'data' =>$Order



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

    public function CreateOrder(OrderRequest $req)
    {
        try{

            $Order = Order::create([
                'OrderDate'=>now()->format('Y-m-d'),
                'TotalAmount'=>$req->TotalAmount,
                'OrderNumber' => "111",
                'CustomerId'=>$req->CustomerId,

            ]);

            $Order->OrderItems()->createMany($req->Products);
            return response()->json([
                'status' => true,
                'message' =>"you created order successfully"

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

    // public function getProductById($ProductId)
    // {
    //     try{

    //         $Product = Product::find($ProductId);
    //         return response()->json([
    //             'status' => true,
    //             'data' => $Product

    //         ]);
    //     }
    //     catch(\Exception $e)
    //     {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }



    public function UpdateOrder(OrderRequest $req)
    {
        try{
            $OrderId = $req->OrderId;
            $Order = Order::find($OrderId);
            $Order->TotalAmount = $req->TotalAmount;
            $Order_items = OrderItem::where('OrderId',$Order->id)->get();
            // return($Order_items);
            $Order->save();
            for($i = 0 ; $i < count($Order_items); $i++)
            {
                $Order_items[$i]->delete();
            }

            $Order->OrderItems()->createMany($req->Products);
            return response()->json([
                'status' => true,
                'message' =>"you updated order successfully"

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
