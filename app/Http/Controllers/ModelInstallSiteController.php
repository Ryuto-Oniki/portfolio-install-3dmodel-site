<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ObjectModel;
use App\Models\AreaDetail;
use App\Models\TerrainCategory;
use App\Models\RegionCategory;

class ModelInstallSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function hp()
    {
        //
        return view('./3dsite_page/hp');
    }



    public function license()
    {
        //
        return view('./3dsite_page/license');
    }



    public function areaindex()
    {
        //

        // pluck()...指定したキーの全コレクション値を取得する。
        $regions = RegionCategory::all()->pluck('id');

        // $regionsid = RegionCategory::select('id')->get()->pluck('id');

        // $regionsids = RegionCategory::select('id')->areadetails()->get();

        // $regionareas = RegionCategory::find($regionsid)->areadetails()->get();

        // ここら辺後で勉強する
        // whereIn(カラム名, [値])...特定の値がそのカラム名に含まれている
        // 条件を引き出す？
        // with()...これがリレーションの際にデータをまとめて引き出せるような
        // メソッド？
        // →Eloquent(LaravelでのORM)を事前にロードして関連するデータウィ効率的
        // に取得できるらしい。
        // areadetail()は、find()などの特定のモデルインスタンスにのみ有効
        $regionareas = RegionCategory::whereIn('id', $regions)->with('areadetails')->get();
        

        // dd($regions, $regionareas);

        // $regionareas = [];

        return view('./3dsite_page/areaindex', compact('regions', 'regionareas'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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


    // 地域詳細
    public function showarea($id)
    {
        //

        $area = AreaDetail::find($id);

        $objectmodels = AreaDetail::find($id)->objectmodels()->get();

        // dd($objectmodel);

        return view('./3dsite_page/showarea', compact('objectmodels', 'area'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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


    public function download($filename)
    {
        // 
        $filePath = Storage::path('3dmodel/' . $filename);

        return response()->download($filePath);
    }
}
