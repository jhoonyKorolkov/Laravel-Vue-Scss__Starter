<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function store(array $data): Category
    {
        return Category::query()->create($data);
    }

    public static function update(array $data, Category $category): Category
    {
        $category->update($data);

        return $category->fresh();
    }
}
