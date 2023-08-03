<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\RedirectResponse;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {

        return Inertia::render('Orders/Index', [
            'orders' => Order::where('user_id',\Auth::id())->with('user:id,full_name')->latest()->get(),

        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Orders/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([

            'seller_name' => 'required|string|min:3|max:255',
            'seller_acount' => 'required|string|min:3|max:255',
            'seller_phone' => 'required|min:9|max:255',
            'duration' => 'required',
            'amount' => 'required',
            'total'=>'required',
            'user_message'=>'string|min:5|max:355',
            'used_acount'=>'required|min:3|max:20',
            'seller_address'=>'required|min:3|max:20'

        ]);

        $request->user()->orders()->create($validated);

        return redirect(route('home'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Order $order): RedirectResponse
    {
        $this->authorize('update', $order);

        $validated = $request->validate([
            'user_message' => 'required|string|max:255',
        ]);
        $order->update($validated);

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Order $order): RedirectResponse
    {
        //
        $this->authorize('delete', $order);

        $order->delete();

        return redirect(route('orders.index'));
    }
}
