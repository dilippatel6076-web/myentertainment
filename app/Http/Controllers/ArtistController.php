<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\File;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       // Start query builder
    $query = Artist::query();

    // Search logic
    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where('name', 'like', "%{$search}%")
              ->orWhere('category', 'like', "%{$search}%")
              ->orWhere('gender', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
    }

    // Pagination 5 per page
    $artist_name = $query->orderBy('id', 'desc')->paginate(5);

    // Preserve search term in pagination links
    $artist_name->appends($request->all());

    return view('artist', compact('artist_name'));
    }

    public function add()
    {
        return view('add_artist');
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
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'category' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $photoName = null;

        if ($request->hasFile('photo')) {
            $name = str_replace(' ', '', $request->name); // remove spaces
            $photoName = $name . '.' . $request->photo->extension();
            $request->photo->storeAs('artists', $photoName, 'public');
        }

        Artist::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'category' => $request->category,
            'photo' => $photoName,
            'status' => $request->status,
        ]);

        return redirect()->to('/artist_list')
            ->with([
                'message' => 'Artist Added Successfully',
                'alert-type' => 'success'
            ]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find artist by ID
        $artist = Artist::findOrFail($id);
        // Return form view with artist data
        return view('update_artist', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //echo "update";
        $artist = Artist::findOrFail($id);

    // Validate request
    $request->validate([
        'name' => 'required|string|max:255',
        'gender' => 'required|in:Male,Female',
        'category' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:active,inactive',
    ]);

    // Handle photo
    if ($request->hasFile('photo')) {
        // Delete old photo if exists
        if ($artist->photo && File::exists(storage_path('app/public/artists/'.$artist->photo))) {
            File::delete(storage_path('app/public/artists/'.$artist->photo));
        }

        // Store new photo
        $name = str_replace(' ', '', $request->name);
        $photoName = time().'_'.$name.'.'.$request->photo->extension();
        $request->photo->storeAs('artists', $photoName, 'public');
        $artist->photo = $photoName;
    }

    // Update other fields
    $artist->name = $request->name;
    $artist->gender = $request->gender;
    $artist->category = $request->category;
    $artist->status = $request->status;

    $artist->save();

    return redirect()->to('/artist_list')
            ->with([
                'message' => 'Artist Update Successfully',
                'alert-type' => 'success'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //echo "delete" . $id;
        $artist = artist::findOrFail($id);
        $artist->status = 'inactive';
        $artist->save();

        return redirect()->to('/artist_list')
            ->with([
                'message' => 'Artist Delete Successfully !',
                'alert-type' => 'danger'
            ]);
    
    }
}
