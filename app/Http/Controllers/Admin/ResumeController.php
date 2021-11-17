<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes = Resume::orderBy('queue', 'asc')->get();
        return response()->view('admin.resumes.index', compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.resumes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'link' => 'nullable',
                'domain' => 'nullable',
                'queue' => 'required',
                'image' => 'required|mimes:png,jpg,jpeg'
            ]);
            $resume = new Resume($request->all());

            $resume->image = $this->uploadImage($request->file('image'), 'resumes');

            $resume->save();
            return redirect(route('admin.resumes.index'));
        } catch (\ErrorException $exception) {
            return $exception->getMessage();
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resume $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(Resume $resume)
    {
        return response()->view('admin.resumes.edit', compact('resume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Resume $resume
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function update(Request $request, Resume $resume)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'link' => 'nullable',
                'domain' => 'nullable',
                'queue' => 'required',
                'image' => 'nullable|mimes:png,jpg,jpeg'
            ]);
            $resume->update($request->all());
            if ($request->file('image')) {
                $resume->image = $this->uploadImage($request->file('image'), 'resumes');
                $resume->save();
            }
            return redirect()->route('admin.resumes.index');
        } catch (\ErrorException $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resume $resume
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws \Exception
     */
    public function destroy(Resume $resume)
    {
        try{
            $resume->delete();
            return back();
        }catch (\ErrorException $exception){
            return $exception->getMessage();
        }

    }
}
