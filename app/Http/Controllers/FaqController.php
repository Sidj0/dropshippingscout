<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;
use App\Models\Page;

class FaqController extends Controller
{ 
    // Check if the user is an admin
    private function isAdmin()
    {
        return Auth::check() && Auth::user()->is_admin; // Ensure user is authenticated and is an admin
    }

    // Show the FAQs for normal users
    public function userIndex()
    {
        // Retrieve all FAQs
        $faqs = Faq::all();
        
        // Retrieve the page data where 'view_name' equals 'faqs'
        $page = Page::where('view_name', 'faqs')->first();
    
        // Check if the page data exists to avoid errors
        if (!$page) {
            // Handle the case where the page data is not found (optional)
            abort(404, 'Page not found');
        }
    
        // Pass both FAQs and page data to the view
        return view('faqs', compact('faqs', 'page'));
    }
    

    // Show the FAQs for admin
    public function adminIndex()
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }

        $faqs = Faq::all();
        return view('Faqs.index', compact('faqs')); // Ensure 'index' view is in resources/views/faqs
    }

    // Show the form to create a new FAQ
    public function create()
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }

        $categories = ['General', 'Technical', 'Payment','tool']; // Replace with your categories
        return view('faqs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category_name' => 'required|string',
        ]);

        Faq::create($request->all());
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }

        $categories = ['General', 'Technical', 'Payment','tool']; // Replace with your categories
        return view('faqs.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category_name' => 'required|string',
        ]);

        $faq->update($request->all());
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }
    // Delete an FAQ
    public function destroy(Faq $faq)
    {
        if (!$this->isAdmin()) {
            return redirect()->route('Adminlogin')->with('error', 'Access denied.'); 
        }

        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
