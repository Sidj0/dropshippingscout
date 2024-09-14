<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Faq;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->is_admin; // Ensure user is authenticated and is an admin
    }
    public function index()
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.');
        }

        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.');
        }

        $viewNames = $this->getViewNames();
        return view('pages.create', compact('viewNames'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'view_name' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_author' => 'nullable|string',
        ]);

        Page::create($request->all());

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.');
        }

        $viewNames = $this->getViewNames();
        return view('pages.edit', compact('page', 'viewNames'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'view_name' => 'required|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_author' => 'nullable|string',
        ]);

        $page->update($request->all());

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully.');
    }

    public function show($identifier)
    {
        $page = $this->getPageByIdentifier($identifier);
        $pricingFaqs = $this->getPricingFaqs();

        if ($page) {
            return $this->handlePageView($page, $pricingFaqs);
        }

        return $this->handleBlogView($identifier);
    }

    // Helper methods
    private function getPageByIdentifier($identifier)
    {
        return Page::where('view_name', $identifier)
                   ->orWhere('slug', $identifier)
                   ->first();
    }

    private function getPricingFaqs()
    {
        return Faq::where('category_name', 'Payment')->get();
    }

    private function handlePageView($page, $pricingFaqs)
    {
        if ($page->view_name === 'index') {
            return $this->loadIndexPage($page);
        }

        if ($page->view_name === 'pricing') {
            return view('pricing', ['page' => $page, 'faqs' => $pricingFaqs]);
        }

        if (view()->exists($page->view_name)) {
            return view($page->view_name, ['page' => $page]);
        }

        abort(404, 'View not found');
    }

    private function loadIndexPage($page)
    {
        $blogs = Blog::orderBy('created_at', 'desc')->limit(3)->get();
        return view('index', ['page' => $page, 'blogs' => $blogs]);
    }

    private function handleBlogView($identifier)
    {
        $blog = Blog::where('slug', $identifier)->first();

        if ($blog) {
            return $this->loadBlogDetailsPage($blog);
        }

        abort(404, 'Page or Blog not found');
    }

    private function loadBlogDetailsPage($blog)
    {
        $headings = $this->extractHeadingsFromContent($blog->content);
        $blog->content = $this->saveFormattedContent($blog->content);

        return view('blog-details', compact('blog', 'headings'));
    }

    private function extractHeadingsFromContent($content)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($content); // Suppress warnings
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

        return $headings;
    }

    private function saveFormattedContent($content)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($content); // Suppress warnings
        return $dom->saveHTML();
    }

    private function getViewNames()
    {
        $viewFiles = File::allFiles(resource_path('views'));
        $viewNames = [];
        foreach ($viewFiles as $file) {
            $viewNames[] = str_replace(['/', '.blade.php'], ['.', ''], $file->getRelativePathname());
        }
        return $viewNames;
    }
}
