<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Param\StoreRequest;
use App\Http\Requests\Admin\Param\UpdateRequest;
use App\Http\Resources\Param\ParamResource;
use App\Models\Param;
use App\Services\ParamService;
use Symfony\Component\HttpFoundation\Response;

class ParamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $params = ParamResource::collection(Param::all());

        return inertia('Admin/Param/Index', compact('params'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Param/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // Получаем валидированные данные из запроса
        $data = $request->validated();
        // Передаём данные в сервис для обработки бизнес-логики и создания продукта
        $param = ParamService::store($data);

        // Возвращаем сериализованный ресурс продукта
        return ParamResource::make($param)->resolve();
    }

    /**
     * Display the specified resource.
     */
    public function show(Param $param)
    {
        $param = ParamResource::make($param)->resolve();

        return inertia('Admin/Param/Show', compact('param'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Param $param)
    {
        $param = ParamResource::make($param)->resolve();

        return inertia('Admin/Param/Edit', compact('param'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Param $param)
    {
        $data = $request->validated();
        $param = ParamService::update($data, $param);

        return ParamResource::make($param)->resolve();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Param $param)
    {
        $param->delete();

        return response()->json([
            'message' => 'Param deleted successfully',
        ], Response::HTTP_OK);
    }
}
