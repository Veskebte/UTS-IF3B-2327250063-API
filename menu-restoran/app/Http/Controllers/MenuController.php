<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminare\Http\Response;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $data['success'] = true;
        $data['result'] = $menus;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
        ]);

        $menu = Menu::create($validate);
        if ($menu) {
            $response['success'] = true;
            $response['message'] = 'Menu berhasil ditambahkan.';
            return response()->json($response, Response::HTTP_CREATED);
        } else {
            $response['success'] = false;
            $response['message'] = 'Gagal menambahkan menu.';
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $response['success'] = true;
            $response['result'] = $menu;
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Menu tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required|string',
            'ukuran' => 'required|string',
            'harga' => 'required|string',
        ]);

        $menu = Menu::where('id', $id)->update($validate);
        if ($menu) {
            $response['success'] = true;
            $response['message'] = 'Menu berhasil diperbarui.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Menu tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::where('id', $id);
        if ($menu->exists()) {
            $menu->delete();
            $response['success'] = true;
            $response['message'] = 'Menu berhasil dihapus.';
            return response()->json($response, Response::HTTP_OK);
        } else {
            $response['success'] = false;
            $response['message'] = 'Menu tidak ditemukan.';
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }
}
