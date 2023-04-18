<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orders\OrderCreateRequest;
use App\Http\Requests\Admin\Orders\OrderEditRequest;
use App\Models\News;
use App\Models\Order;
use App\Models\Source;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\OrdersQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(OrdersQueryBuilder $ordersQueryBuilder): View
    {
        return \view('admin.orders.index', ['orders' => $ordersQueryBuilder->getOrdersAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderCreateRequest $request): RedirectResponse
    {
        $order = new Order($request->except('_token')); //News::create()
        if ($order->save()) {
            return redirect()->route('admin.orders.index')->with('success', 'Order successfully added.');
        }

        return \back()->with('error','Order not added.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     * @return Response
     */
    public function edit(Order $order):View
    {
        return \view('admin.orders.edit',
            [
                'order'=> $order
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderEditRequest $request, Order $order):RedirectResponse
    {
        $order=$order->fill($request->except('_token'));
        if ($order->save()){
            return redirect()->route('admin.orders.index')->with('success', 'Order successfully updated.');
        }

        return \back()->with('error','Order not added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order): JsonResponse
    {
        try {
            $order->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
