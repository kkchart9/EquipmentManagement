<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipments;

class Equipment_RegisterController extends Controller

{
    public function index()
    {
        return view('equipment.register');
    }

    public function confirm(Request $request) {
        // 機材名
        $equipment_name = $request->equipment_name;

        // 高価度
        $equipment_vale = $request->equipment_vale;

        // ジャンル
        $equipment_genre = $request->equipment_genre;

        // メーカー名
        $manufacturer = $request->manufacturer;

        // 色付け
        $color_coding = $request->color_coding;

        // 確認画面に表示する値を格納
        $input_date = [
            'equipment_name' => $equipment_name,
            'equipment_vale' => $equipment_vale,
            'equipment_genre' => $equipment_genre,
            'manufacturer' => $manufacturer,
            'color_coding' => $color_coding
        ];

        return view('equipment.confirm', $input_date);
    }

    /**
     * 新規機材登録
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        // 新規作成
        Equipments::create([
            'equipment_name' => $request->equipment_name,
            'equipment_vale' => $request->equipment_vale,
            'equipment_genre' => $request->equipment_genre,
            'manufacturer' => $request->manufacturer,
            'color_coding' => $request->color_coding,
        ]);

        return redirect('/equipment/register');
    }
    
}