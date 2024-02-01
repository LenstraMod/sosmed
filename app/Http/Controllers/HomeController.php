<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use App\Models\Like;
use App\Models\comment as Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = post::with(['user','likes','comments'=>function($query){$query->orderBy('created_at','desc');}])->orderBy('created_at','desc')->get();
        $user = Auth::user();

        return view('frontend.home', compact('post','user'));
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimetypes:image/jpeg,image/png,image/gif|max:2048',
        ]);

        $user_id = Auth::user()->id;

        $post = new post();
        $post->fill([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $user_id,
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalName();
            $path = public_path('assets/images/post-images/');

            $image->move($path,$imageName);

            $post->image = $imageName;
        }

        $post->save();

        return redirect()->route('home')->with('message', 'Post created successfully');
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
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('frontend.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add your specific image validation rules
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            $previousImagePath = public_path('assets/images/post-images/' . $post->image);
            if (File::exists($previousImagePath)) {
                File::delete($previousImagePath);
            }

            // Upload the new image
            $imageName = 'IMG' . '.' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('assets/images/post-images/'), $imageName);

            // Update the post with the new image
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imageName,
            ]);
        } else {
            // If no new image is provided, update other fields
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        return redirect()->route('profile')->with('message', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $post = post::findOrFail($id);
       $post->delete();

       return redirect()->route('home');
    }
}
