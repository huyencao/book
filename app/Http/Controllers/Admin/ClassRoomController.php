<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ClassRoomRepository;
use Validator;
use Auth;
use App\Http\Requests\ClassRoomRequest;
use App\Http\Requests\EditClassRoomRequest;

class ClassRoomController extends Controller
{
    protected $class_room;

    public function __construct(ClassRoomRepository $class_room)
    {
        $this->class_room = $class_room;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->class_room->listClassRoom();

        return view('backend.class-room.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.class-room.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRoomRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
            ]
        );

        $this->class_room->create($request->all());

        return redirect(route('class-room.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm lớp học thành công!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->class_room->findClassRoom($id);

        return view('backend.class-room.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClassRoomRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
            ]
        );

        $this->class_room->update($id, $request->all());

        return redirect(route('class-room.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm lớp học thành công!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->class_room->delete($id);

        return back()->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công !'
        ]);
    }
}
