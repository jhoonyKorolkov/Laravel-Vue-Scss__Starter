<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ParentProduct\StoreRequest;
use App\Http\Requests\Admin\ParentProduct\UpdateRequest;
use App\Http\Resources\ParentProduct\ProductParentResource;
use App\Models\ProductParent;
use App\Services\ProductParentService;
use Symfony\Component\HttpFoundation\Response;

class ProductParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $productParents = ProductParentResource::collection(ProductParent::all());

        return inertia('Admin/ProductParent/Index', compact('productParents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/ProductParent/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // Получаем валидированные данные из запроса
        $data = $request->validated();
        // Передаём данные в сервис для обработки бизнес-логики и создания продукта
        $productParent = ProductParentService::store($data);

        // Возвращаем сериализованный ресурс продукта
        return ProductParentResource::make($productParent)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductParent $productParent)
    {
        $productParent = ProductParentResource::make($productParent)->resolve();

        return inertia('Admin/ProductParent/Show', compact('productParent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductParent $productParent)
    {
        $productParent = ProductParentResource::make($productParent)->resolve();

        return inertia('Admin/ProductParent/Edit', compact('productParent'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, ProductParent $productParent)
    {
        $data = $request->validated();
        $productParent = ProductParentService::update($data, $productParent);

        return ProductParentResource::make($productParent)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductParent $productParent)
    {
        $productParent->delete();

        return response()->json([
            'message' => 'ProductParent deleted successfully',
        ], Response::HTTP_OK);
    }
}
