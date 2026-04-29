<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Artist;

class MovieController extends Controller
{
    public function index()
    {
        // Normal page load
        // No need to pass $movies, Livewire will fetch inside component
        $artist_name = Artist::all();
        return view('movies', compact('artist_name'));
    }
    public function store(Request $request)
    {
        // echo $request->title;exit;
        // $request->validate([
        //     'title' => 'required',
        //     'youtube_id' => 'required',
        //     'youtube_url' => 'required',
        //     'year' => 'required',
        // ]);
        //dd($request->all());exit;

        $thumbnail = null;
        $youtubeUrl = $request->youtube_url ?? null;
        $videoId = $this->getYoutubeId($youtubeUrl);
        // echo $videoId.'---'.$youtubeUrl;exit;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $thumbnail = $file->storeAs('thumbnails', $filename, 'public');
            // Stored in storage/app/public/thumbnails
        } else {
            $youtubeUrl = $request->youtube_url;
            // Extract Video ID
            // Generate Thumbnail URL
            $thumbnail = $videoId
                ? "https://img.youtube.com/vi/$videoId/hqdefault.jpg"
                : null;
        }

        Movie::create([
            'title' => $request->title ?? '',
            'youtube_video_id' => $videoId ?? '',
            'youtube_url' => $request->youtube_url ?? '',
            'release_year' => $request->release_year ?? '',
            'description' => $request->description ?? '',
            'searching_word' => $request->searching_word ?? '',
            'category' => json_encode($request->category ?? []) ?? '',
            'language' => $request->language,
            'artist_name' => json_encode($request->artist_name ?? []) ?? '',
            'thumbnail' => $thumbnail
        ]);

        //return redirect()->back()->with('success', 'Movies Added Successfully');
        return redirect()->to('/movies')
            ->with([
                'message' => 'Movie Added Successfully',
                'alert-type' => 'success'
            ]);
    }
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);

        $selectedCategories = json_decode($movie->category, true) ?? [];

        $artists = Artist::select('id', 'name')->get();

        $selectedArtists = json_decode($movie->artist_name ?? '[]', true) ?? [];

        // ensure string IDs for Alpine.js
        $selectedArtists = array_map('strval', $selectedArtists);

        // echo "</pre>";
        // print_r($selectedArtists);exit;

        return view('update', compact(
            'movie',
            'artists',
            'selectedCategories',
            'selectedArtists'
        ));
    }

    // Update movie
    public function update(Request $request, $id)
    {
        // echo "update".$id;exit;
        $movie = Movie::findOrFail($id);

        // Validation (optional)
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'youtube_url' => 'nullable|string',
        //     'youtube_video_id' => 'nullable|string',
        //     'description' => 'nullable|string',
        //     'searching_word' => 'nullable|string',
        //     'category.*' => 'nullable|string',
        //     'artist_name.*' => 'nullable|integer',
        //     'language' => 'nullable|string',
        //     'release_year' => 'nullable|integer',
        //     'status' => 'required|string',
        //     'thumbnail' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        // ]);

        // Thumbnail upload
        $thumbnail = null;
        $youtubeUrl = $request->youtube_url ?? null;
        $videoId = $this->getYoutubeId($youtubeUrl);
        // echo $videoId.'---'.$youtubeUrl;exit;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $thumbnail = $file->storeAs('thumbnails', $filename, 'public');
            // Stored in storage/app/public/thumbnails
        } else {
            $youtubeUrl = $request->youtube_url;
            // Extract Video ID
            // Generate Thumbnail URL
            $thumbnail = $videoId
                ? "https://img.youtube.com/vi/$videoId/hqdefault.jpg"
                : null;
        }

        // Update all fields
        $movie->title = $request->title;
        $movie->youtube_url = $request->youtube_url;
        $movie->thumbnail = $thumbnail;
        $movie->youtube_video_id = $request->youtube_video_id;
        $movie->description = $request->description;
        $movie->searching_word = $request->searching_word;
        $movie->category = json_encode(array_filter($request->category ?? []));
        $movie->artist_name = json_encode(array_filter($request->artist_name ?? []));
        $movie->language = $request->language;
        $movie->release_year = $request->release_year;
        $movie->status = $request->status;

        $movie->save();

        // Redirect to movies list with success message
        return redirect()->to('/movies')
            ->with([
                'message' => 'Movie Update Successfully',
                'alert-type' => 'success'
            ]);
      //  return redirect('/movies')->with('success', 'Movie updated successfully!');
    }
    private function getYoutubeId($url)
    {
        // Add https if missing
        if (!str_starts_with($url, 'http')) {
            $url = 'https://' . $url;
        }
        // Handle embed URL
        if (preg_match('/embed\/([^\?]+)/', $url, $match)) {
            return $match[1];
        }
        // Handle watch URL
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        if (isset($query['v'])) {
            return $query['v'];
        }
        return null;
    }
    public function view($id)
    {
        $movie = Movie::findOrFail($id);
        $videoId = $movie->youtube_video_id;
        $artistIds = json_decode($movie->artist_name);

        $artists = Artist::whereIn('id', $artistIds)->get();

        return view('view', compact('movie', 'videoId', 'artists'));
        //return view('view', compact('movie', 'videoId'));
    }
    public function delete($id)
    {
        //echo "delete" . $id;
        $movie = Movie::findOrFail($id);
        $movie->status = 'inactive';
        $movie->save();

        return redirect()->to('/movies')
            ->with([
                'message' => 'Movie Delete Successfully !',
                'alert-type' => 'danger'
            ]);
    }
}
