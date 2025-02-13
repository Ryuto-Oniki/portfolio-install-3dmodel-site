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

        // 指定したキーの全コレクション値を取得する。
        $regions = RegionCategory::all()->pluck('id');

        // $regionsに対応する地域のカラムをそれぞれ取得する。
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
        // 3dモデルのインストール
        $filePath = Storage::path('3dmodel/' . $filename);

        return response()->download($filePath);
    }
}
