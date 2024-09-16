<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->is_admin; // Ensure user is authenticated and is an admin
    }
    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }
        
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'author' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'media_type' => 'required|string|in:image,video',
            'image' => 'nullable|image|max:2048',
            'video_url' => 'nullable|url',
            'likes' => 'required|integer|min:0',
            'slug' => 'required|string|max:60|unique:blogs',
            'category' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        if ($validatedData['media_type'] === 'image') {
            // Handle image upload
            if ($request->hasFile('image')) {
                $validatedData['image'] = $request->file('image')->store('images', 'public');
            } else {
                return back()->withErrors(['image' => 'Image is required if media type is set to image.']);
            }
            $validatedData['video_url'] = null; // No video for this blog
        } elseif ($validatedData['media_type'] === 'video') {
            // Ensure video URL is present
            if (empty($request->video_url)) {
                return back()->withErrors(['video_url' => 'Video URL is required if media type is set to video.']);
            }
            $validatedData['image'] = null; // No image for this blog
            $validatedData['video_url'] = $request->input('video_url'); // Set the video URL
        }
    
        // Create a new blog entry
        Blog::create($validatedData);
    
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }
    
    
    

    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }

        // Retrieve all blogs for display
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    public function edit(Blog $blog)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }
        // Return the edit view with the blog data
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        dd($request->all()); // This will dump all the request data to help you verify what is being submitted

        $blog = Blog::findOrFail($id);
    
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string',
            'author' => 'required|string|max:255',
            'publish_date' => 'required|date',
            'media_type' => 'required|string|in:image,video',
            'image' => 'nullable|image|max:2048',
            'video_url' => 'nullable|url',
            'likes' => 'required|integer|min:0',
            'slug' => 'required|string|max:60|unique:blogs,slug,' . $blog->id,
            'category' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        if ($validatedData['media_type'] === 'image') {
            if ($request->hasFile('image')) {
                $validatedData['image'] = $request->file('image')->store('images', 'public');
            }
            $validatedData['video_url'] = null; // No video for this blog
        } elseif ($validatedData['media_type'] === 'video') {
            $validatedData['image'] = null; // No image for this blog
            $validatedData['video_url'] = $request->input('video_url'); // Set the video URL
        }
    
        // Update the blog entry with the validated data
        $blog->update($validatedData);
    
        return redirect()->route('blogs.show', $blog->slug)->with('success', 'Blog updated successfully.');
    }
    
    
    
    

    public function destroy(Blog $blog)
    {
        // Delete the blog entry
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }

    public function userIndex()
    {
        // Retrieve all blogs
        $blogs = Blog::all();
        
        // Retrieve the page data where 'view_name' equals 'blogs'
        $page = Page::where('view_name', 'blogs')->first();
    
        // Check if the page data exists to avoid errors
        if (!$page) {
            // Handle the case where the page data is not found (optional)
            abort(404, 'Page not found');
        }
    
        // Pass both blogs and page data to the view
        return view('blogs', compact('blogs', 'page'));
    }
    

    public function show($slug)
    {
        // Find the blog by slug
        $blog = Blog::where('slug', $slug)->firstOrFail();
    
        // Extract headings from the content
        $dom = new \DOMDocument();
        @$dom->loadHTML($blog->content); // Suppress warnings with @
        $headings = [];
        
        for ($i = 1; $i <= 6; $i++) {
            $tags = $dom->getElementsByTagName('h' . $i);
            foreach ($tags as $tag) {
                $headings[] = [
                    'level' => $i,
                    'text' => $tag->textContent,
                    'id' => 'header' . count($headings)
                ];
            }
        }
        
        $blog->content = $dom->saveHTML();
    
        // Retrieve the page data where 'view_name' equals 'blog-details'
        $page = Page::where('view_name', 'blogs')->first();
        
        // Check if the page data exists to avoid errors
        if (!$page) {
            // Handle the case where the page data is not found (optional)
            abort(404, 'Page not found');
        }
        
        return view('blog-details', compact('blog', 'headings', 'page'));
    }


    
}
