<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Content;
use App\Http\Requests\StoreContentRequest;
use App\Http\Requests\UpdateContentRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents=Content::latest('id')->get();
        return view('content.index');
    }

    public function ssd(Request $request)
    {
        $contents = Content::with('genres')->latest('id')->get();
        return DataTables::of($contents)
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('genres', function ($each) {
               $output='';
                foreach ($each->genres as $genre){
                    $output.='<span class="badge badge-primary">'.$genre->genre.'</span>';
                }
                return $output;

            })
            ->editColumn('poster', function ($each) {
                return '<img src="' . $each->poster_path() . '" alt="" class="border border-1 border-white shadow-sm poster" />';
            })

            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                $edit = "";
                $detail = "";
                $del = "";

                $edit = '<a href="'.route('content.edit', $each->id).'" class="btn mr-1 btn-success btn-sm rounded-circle"><i class="fa-solid fa-pen-to-square fw-light"></i></a>';

                $detail = '<a href="' . route('content.show', $each->id) . '" class="btn mr-1 btn-secondary btn-sm rounded-circle"><i class="fa-solid fa-circle-info"></i></a>';

                $del = '<a href="#" class="btn btn-danger btn-sm rounded-circle del-btn" data-id="' . $each->id . '"><i class="fa-solid fa-trash-alt fw-light"></i></a>';

                return '<div class="action-icon text-nowrap">' . $edit . $detail . $del . '</div>';
            })
            ->rawColumns(['action','poster','genres'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContentRequest $request)
    {
        $content=new Content();
        $content->name=$request->name;
        $content->slug=Str::slug($request->name,'_');
        $content->director=$request->director;
        $content->casts=$request->casts;
        $content->description=$request->description;
        $content->releasedate=$request->releasedate;
        $content->status=$request->status;
        $content->movietype=$request->movietype;
        $content->user_id=Auth::id();

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $newName = 'poster_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('poster/' . $newName, file_get_contents($file));

            $content->poster = $newName;
        }
        if ($request->hasFile('trailer')) {
        $file = $request->file('trailer');
        $newName = 'trailer_' . uniqid() . '.' . $file->getClientOriginalExtension();
        Storage::disk('public')->put('trailer/' . $newName, file_get_contents($file));

        $content->trailer = $newName;
    }

        $content->save();
        $content->genres()->attach($request->genres);
        return redirect()->route('content.index')->with('create_alert', ['icon' => 'success', 'title' => 'Successfully Created', 'message' => 'Content is successfully created']);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {

        return view('content.edit',compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentRequest  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentRequest $request, $id)
    {
        $content = Content::findOrFail($id);

        if ($request->hasFile('poster')) {
            Storage::disk('public')->delete('poster/' . $content->poster);
            $file = $request->file('poster');
            $newName = 'poster_' . uniqid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('poster/' . $newName, file_get_contents($file));

            $content->poster = $newName;
        }
        $content->name=$request->name;
        $content->slug=Str::slug($request->name,'_');
        $content->director=$request->director;
        $content->casts=$request->casts;
        $content->description=$request->description;
        $content->releasedate=$request->releasedate;
        $content->status=$request->status;
        $content->movietype=$request->movietype;
        $content->update();

        return redirect()->route('content.index')->with('create_alert', ['icon' => 'success', 'title' => 'Successfully Updated', 'message' => 'Content is successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = Content::findOrFail($id);
        Storage::disk('public')->delete('poster/' . $content->poster);
        Storage::disk('public')->delete('trailer/' . $content->trailer);
        return $content->delete();
    }
}
