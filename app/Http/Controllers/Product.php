<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Product extends Controller
{
    /**
     * Display a listing of the resource.
     * С фильтрами
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter = request()->query()['filter'] ?? null;
        $sort = request()->query()['sort'] ?? null;
        $structure = request()->query()['filter']['structure'] ?? null;
        $p = DB::table('products as p')
            ->join('brands as b', 'p.brands_id', '=', 'b.id')
            ->join('materials as m', 'm.products_id', '=', 'p.id')
            ->join('categories as c', 'p.categories_id', '=', 'c.id')
            ->select('p.*')
            ->when(!empty($filter['brand.name']), fn ($query, $filter)=>$query->where('b.name', $filter))
            ->when(!empty($filter['brand.id']), fn ($query, $filter)=>$query->where('b.name', $filter))
            ->when(!empty($filter['categories.name']), fn ($query, $filter)=>$query->where('c.name', $filter))
            ->when(!empty($filter['categories.id']), fn ($query, $filter)=>$query->where('p.categories_id', $filter))
            ->when(!empty($filter['materials.size']), fn ($query, $filter)=>$query->where('m.size', $filter))
            ->when(!empty($filter['materials.color']), fn ($query, $filter)=>$query->where('m.color', $filter))
            ->when(!empty($filter['price']), fn ($query, $filter)=>$query->where('p.price', $filter))
            ->when(!empty($filter['weight']), fn ($query, $filter)=>$query->where('p.weight', $filter))
            ->when($structure, function ($query, $structure) {
                foreach ($structure as $key => $value) {
                    $query->whereJsonContains('structure->'.$key, $value);
                }
                return $query;
            })
            ->when($sort, function ($query, $sort) {
                $sortarray=explode(',',$sort);
                foreach ($sortarray as $value){
                    $value[0]==='-'?$query->orderByDesc(substr($value, 1)):$query->orderBY($value);
                }
                return $query;
            })
           ->simplePaginate(5);
       return ProductResource::collection($p);
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
