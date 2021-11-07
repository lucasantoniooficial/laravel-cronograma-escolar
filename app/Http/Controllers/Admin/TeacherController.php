<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Teacher\RequestCreate;
use App\Http\Requests\Teacher\RequestUpdate;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:Admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with('user')->paginate();

        return view('admin.teacher.index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreate $request)
    {
        $data = $request->validated();

        User::createTeacher($data);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('admin.teacher.show',[
            'teacher' => $teacher
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.edit', [
            'teacher' => $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, Teacher $teacher)
    {
        $data = $request->validated();

        $teacher->updateUser($data);

        return redirect()->route('admin.teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Teacher $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->deleteUser();

        return back();
    }
}
