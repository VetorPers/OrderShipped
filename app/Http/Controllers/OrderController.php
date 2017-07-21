<?php

namespace App\Http\Controllers;

use App\Events\OrderChannel;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'order');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Order::with('user')->get();
        return view('orders.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id' => 1,
            'good_name' => $request->get('good_name'),
            'good_price' => $request->get('good_price'),
        ];

        if (Order::create($data)) {
            return redirect('/orders');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inf = Order::with('user')->find($id);
        $inf->body = explode(';', $inf->body);
        return view('orders.show', compact('inf'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inf = Order::find($id);
        return view('orders.edit', compact('inf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $site = $request->get('site');
        $body = Order::find($id)->body;
        $order = [];
        if ($body) $order = explode(';', $body);

        array_push($order, $site);
        $newOrder = implode(';', $order);
        Order::where('id', $id)->update(['body' => $newOrder]);
        $res = Order::with('user')->find($id);
        if ($res) {
            event(new OrderChannel($res));
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function redis()
    {
        return view('orders.redis');
    }

    public function order($order)
    {
        $res = Order::find($order);
        $resOrder = explode(';', $res->body);
        return response()->json($resOrder);
    }
}
