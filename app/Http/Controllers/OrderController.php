<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Client\Response;

class OrderController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return OrderResource::collection(Order::with('orderItems')->paginate());
    }

    public function show($id){
        return new OrderResource(Order::with('orderItems')->find($id));
    }

    public function export(){
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=orders.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0",
        ];

        $callback = function(){
            $orders = Order::all();
            $file = fopen('php://output', 'w');

            fputcsv($file, ['ID', 'Name', 'Email', 'Product Title', 'Price', 'Quantity', 'Total' ]);

            foreach ($orders as $order){
                fputcsv($file, [$order->id, $order->name, $order->email, 'Products', '', '', $order->total]);
                foreach($order->orderItems as $orderItem){
                    fputcsv($file, ['', '', '', $orderItem->product_title, $orderItem->price, $orderItem->quantity ]);
                }
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function chart(){
//        return Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
//            ->selectRaw("DATE_FORMAT(orders.created_at, '%Y-%m-%d') as date, SUM(order_items.price * order_items.quantity) as sum")
//            ->groupBy('date')->get();
        return Order::query()
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->selectRaw("DATE_FORMAT(orders.created_at, '%Y-%m-%d') as date, SUM(order_items.price * order_items.quantity) as sum")
            ->groupBy('date')->get();
    }
}
