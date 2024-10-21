<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\toolsController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\EbayCalculatorController;



#home page route
Route::get("/", function(){
    $home_page= new PagesController;
    return $home_page->show('index');
});

Route::get('/index', function () {
    return redirect('/');
});

 

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pages', PagesController::class);
});

// sitemap 
Route::get('/sitemap.xml', function() {
    return Response::file(public_path('sitemap.xml'), [
        'Content-Type' => 'application/xml'
    ]);
});



// Authentication Routes For Admin
Route::get('admin/site/login', [LoginController::class, 'showLoginForm'])->name('Adminlogin');
Route::post('admin/site/login', [LoginController::class, 'login'])->name('Adminlogin');

Route::get('/login', function () {
    return redirect('https://app.dropshippingscout.com/login');
});
Route::get('/register', function () {
    return redirect('https://app.dropshippingscout.com/register');
});

Route::get('/pricing', function () {
    return redirect('https://app.dropshippingscout.com/pricing');
});
//Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//Route::post('register', [RegisterController::class, 'register']);
// Route::get('new-password', function () {
//     return view('new-password');
// });

// Blog Routes
// User routes
Route::get('/blogs', [BlogController::class, 'userIndex'])->name('blogs.userIndex'); // Show all blogs
Route::get('/tutorial', [BlogController::class, 'userTutorial'])->name('blogs.userTutorial'); // Show all blogs
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blogs.show');
Route::post('/blogs/{id}/like', [BlogController::class, 'like'])->name('blogs.like');


// Admin routes
Route::get('/admin/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/admin/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/admin/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/admin/blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/admin/blogs/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');



// FAQ Routes
Route::get('faqs', [FaqController::class, 'userIndex'])->name('faqs');
Route::prefix('admin/faqs')->name('admin.faqs.')->group(function () {
    Route::get('index', [FaqController::class, 'adminIndex'])->name('index');
    Route::get('create', [FaqController::class, 'create'])->name('create');
    Route::post('', [FaqController::class, 'store'])->name('store');
    Route::get('{faq}/edit', [FaqController::class, 'edit'])->name('edit');
    Route::put('{faq}', [FaqController::class, 'update'])->name('update');
    Route::delete('{faq}', [FaqController::class, 'destroy'])->name('destroy');
});


// tools pages
Route::get('/Suppliers-Scouting/{slug}', [toolsController::class, 'show'])->name('tools-supplier.show');
Route::get('/competitor-monitoring/{slug}', [toolsController::class, 'show'])->name('tools-competitor.show');
Route::get('/product-scouting/{slug}', [toolsController::class, 'show'])->name('tools-product.show');

// Route for index page to list all tools
Route::get('/admin/tools', [toolsController::class, 'index'])->name('tools.index');
Route::get('/admin/tools/create', [toolsController::class, 'create'])->name('tools.create');
Route::post('/admin/tools', [toolsController::class, 'store'])->name('tools.store');
Route::get('/admin/tools/{tool}/edit', [toolsController::class, 'edit'])->name('tools.edit');
Route::put('/admin/tools/{tool}', [toolsController::class, 'update'])->name('tools.update');
Route::delete('/admin/tools/{tool}', [toolsController::class, 'destroy'])->name('tools.destroy');

// ebay calculator
Route::post('/calculate-fees', [EbayCalculatorController::class, 'calculate']);

// Dynamic Page Route
 Route::get('/{slug}', [PagesController::class, 'show'])->name('pages.show');

 
 // for 404
 Route::fallback(function () {
    return response()->view('404', [], 404);
});


