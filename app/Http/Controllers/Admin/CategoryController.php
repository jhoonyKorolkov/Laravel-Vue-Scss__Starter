<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = CategoryResource::collection(Category::all());

        return inertia('admin/category/Category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('admin/category/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // Получаем валидированные данные из запроса
        $data = $request->validated();
        // Передаём данные в сервис для обработки бизнес-логики и создания продукта
        $category = CategoryService::store($data);

        // Возвращаем сериализованный ресурс продукта
        return CategoryResource::make($category)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();

        return inertia('admin/category/Show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = CategoryResource::make($category)->resolve();

        return inertia('admin/category/Edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category = CategoryService::update($data, $category);

        return CategoryResource::make($category)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'message' => 'Category deleted successfully',
        ], Response::HTTP_OK);
    }
}
