<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\models\Menu;
use App\models\Page;

class MenuController extends Controller
{
    public function list()
    {
        $menus = Menu::query();

        return datatables()->of($menus)
            ->make(true);
    }
    public function index()
    {
        return view('dashboard.settings.menu.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();
        return view('dashboard.settings.menu.form', ['pages'=>$pages]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'url' => 'required|min:1', 
            'title' => 'required|min:1'
        ]);
        Menu::create($request->all());
        return redirect()->route('dashboard.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view("dashboard.settings.menu.show", ["menu"=>$menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $pages = Page::all();
        return view("dashboard.settings.menu.form", ["menu"=>$menu, "pages"=>$pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,menu $menu)
    {
        request()->validate([
            'url' => 'required|min:1',  
            'title' => 'required|min:1'
        ]);

        $menu->update($request->all());
        return redirect()->route('dashboard.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

    }
}
