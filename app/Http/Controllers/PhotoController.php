<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photo=Photo::latest('id')->get();
        return view('photo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function ssd(Request $request)
    {
        $photo = Photo::query();

        return DataTables::of($photo)
            ->editColumn('created_at', function ($each) {
                return Carbon::parse($each->created_at)->format('Y-m-d H:i:s');
            })
            ->editColumn('photo', function ($each) {
                $output='';
                foreach($each->photo as $image){

                    $output.='<img src="'.$image->photo_path().'" class="border boreder-1 border-white shadow-sm photo"/>';
                }
                return $output;

            })

            ->addColumn('plus-icon', function ($each) {
                return null;
            })
            ->addColumn('action', function ($each) {
                $edit = "";
                $detail = "";
                $del = "";

                $edit = '<a href="'.route('photo.edit', $each->id).'" class="btn mr-1 btn-success btn-sm rounded-circle"><i class="fa-solid fa-pen-to-square fw-light"></i></a>';

                $detail = '<a href="' . route('photo.show', $each->id) . '" class="btn mr-1 btn-secondary btn-sm rounded-circle"><i class="fa-solid fa-circle-info"></i></a>';

                $del = '<a href="#" class="btn btn-danger btn-sm rounded-circle del-btn" data-id="' . $each->id . '"><i class="fa-solid fa-trash-alt fw-light"></i></a>';

                return '<div class="action-icon text-nowrap">' . $edit . $detail . $del . '</div>';
            })
            ->rawColumns(['action','photo'])
            ->make(true);
    }
    public function store(StorePhotoRequest $request)
    {

        if(request()->hasFile('photo')){
            $images=[];
            $img_files=$request->file('photo');
            foreach($img_files as $img_file){
                $newName=uniqid()."_photo.".$img_file->extension();
                $img_file->storeAs('public/photo/',$newName);
                $images[]=$newName;
                $photo=new Photo();
                $photo->photo=$images;
                $photo->content_id=$request->content_id;
                $photo->save();
            }
        }
        return redirect()->route('photo.index')->with('create_alert', ['icon' => 'success', 'title' => 'Successfully Created', 'message' => 'Photo is successfully created']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo=Photo::findOrFail($id);
//        return view('photo.edit',compact('photo'));
        return $photo;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoRequest  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::disk('public')->delete('photo/' . $photo->photo);

        return $photo->delete();

    }
}
