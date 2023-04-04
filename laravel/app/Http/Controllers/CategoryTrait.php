<?php

namespace App\Http\Controllers;

trait CategoryTrait
{
    public function getCategories(int $id = null): array
    {
        $categories = [];
        $quantityCategories = 8;
        if ($id === null) {
            for ($i = 1; $i <= $quantityCategories; $i++) {
            $categories[$i]=[
                'id'=>$i,
                'name'=>\fake()->jobTitle()
            ];
            }
            return $categories;
        }
        return [
            'id'=>$id,
            'name'=>\fake()->jobTitle()
        ];
    }
}
