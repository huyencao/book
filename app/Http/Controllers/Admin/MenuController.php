<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\MenuRepository;
use App\Http\Requests\MenuRequest;
use App\Http\Requests\EditMenuRequest;
use Auth;
use File;

class MenuController extends Controller
{
    protected $menus;

    public function __construct(MenuRepository $menus)
    {
        $this->menus = $menus;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_menu = $this->menus->listMenuAll();

        return view('backend.menu.list', compact('list_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menu_parent = $this->menus->listMenuParent();

        return view('backend.menu.add', compact('menu_parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
                'slug' => str_slug($request->name),
            ]
        );

        $this->menus->create($request->all());

        return redirect(route('menu.index'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = $this->menus->findMenu($id);
        $menu_parent = $this->menus->listMenuParent();

        return view('backend.menu.edit', compact('menu', 'menu_parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMenuRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
                'slug' => str_slug($request->title),
            ]
        );

        $this->menus->update($id, $request->all());

        return redirect()->route('menu.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Cập nhật thành công !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->menus->delete($id);

        return back()->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công !'
        ]);
    }
}
