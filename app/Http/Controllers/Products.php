<?php

namespace App\Http\Controllers;

use App\customFilter\FilterStructure;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Materials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * С фильтрами
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QueryBuilder::for(\App\Models\Products::class)
            ->allowedIncludes('materials', 'brand', 'categories')
            ->allowedFilters([
                'materials.color',
                'materials.size',
                AllowedFilter::exact('materials.id'),
                AllowedFilter::exact('brand.id'),
                AllowedFilter::exact('categories.id'),
                'categories.name',
                'brand.name',
                'name',
                'price',
                'weight',
                AllowedFilter::custom('structure', new FilterStructure),
            ])
            ->allowedSorts([
                'materials.color',
                'materials.size',
                'categories.name',
                'materials.id',
                'brand.id',
                'categories.id',
                'name',
                'price',
                'weight',
                'created_at',
                'updated_at'
            ])
            ->paginate()
            ->appends(request()->query());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
