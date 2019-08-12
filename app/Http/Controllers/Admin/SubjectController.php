<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EditSubjectRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Repositories\SubjectReposiory;
use Auth;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    protected $subject;

    public function __construct(SubjectReposiory $subject)
    {
        $this->subject = $subject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->subject->listClassRoom();

        return view('backend.subject.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subject.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
            ]
        );

        $this->subject->create($request->all());

        return redirect(route('subject.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm môn học thành công!'
        ]);
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
        $data = $this->subject->findSubject($id);

        return view('backend.subject.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditSubjectRequest $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
        }

        $request->merge(
            [
                'user_id' => $user->id,
            ]
        );

        $this->subject->update($id, $request->all());

        return redirect(route('subject.index'))->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm môn học thành công!'
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
        $this->subject->delete($id);

        return back()->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa thành công !'
        ]);
    }
}
