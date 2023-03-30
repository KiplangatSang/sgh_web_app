<?php

use Illuminate\Support\Facades\Route;


use App\Models\Articles\Categories;
use App\Http\Controllers\Admin\Articles\ArticleController;
use App\Http\Controllers\Admin\Articles\ArticleProcessingController;
use App\Http\Controllers\Admin\Articles\PendingArticleController;
use App\Http\Controllers\Admin\Articles\PublishedArticleController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Users\AccountController;
use App\Http\Controllers\Admin\Users\AccountSuspensionController;
use App\Http\Controllers\Client\ResponseController;
use App\Http\Controllers\ClientPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostBodyController;
use App\Http\Controllers\Posts\BusinessController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\PostImageController;
use App\Http\Controllers\Posts\NewsCotroller;
use App\Http\Controllers\Posts\PoemController;
use App\Http\Controllers\Posts\SportController;
use App\Http\Controllers\Posts\TechCotroller;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\SiteVisitController;
use App\Models\Posts\Posts;
use App\Models\SiteVisits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//email verification
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

#The Email Verification Handler
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');



#Resending The Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');


Route::get('/authors/signup', function () {
    return view('landingpage.index');
});

Route::get('/', function () {
//    return Categories::all();
    return view('post.index');
});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);



//post articles
//Route::get('/users/posts/index', [ClientPostController::class, 'index']);
Route::get('/articles/index', function () {
    return view('post.index');
});
Route::get('/articles/hidden', function () {
    return view('hidden');
});

Route::get('/users/posts/post/{post_id}', [ClientPostController::class, 'show']);
Route::get('/{post_id}', [ClientPostController::class, 'show']);

Route::get('/articles/contact', function () {
    return view('post.contact');
});

Route::get('/articles/tech', [TechCotroller::class, 'index']);
Route::get('/articles/sports', [SportController::class, 'index']);
Route::get('/articles/poems', [PoemController::class, 'index']);
Route::get('/articles/news', [NewsCotroller::class, 'index']);
Route::get('/articles/business', [BusinessController::class, 'index']);
Route::get('/articles/articles', function () {
    return view('post.articles');
});

//client responses
Route::post('/user/contact/client/response/store', [ResponseController::class, 'store']);

//post
Route::get('/user/post/index', [PostController::class, 'index']);
Route::get('/user/post/create', [PostController::class, 'create']);
Route::post('/user/post/store', [PostController::class, 'store']);
Route::get('/user/post/show/{id}', [PostController::class, 'show']);
Route::get('/user/post/edit/{id}', [PostController::class, 'edit']);
Route::post('/user/post/update/{id}', [PostController::class, 'update']);
Route::post('/user/post/delete/{id}', [PostController::class, 'destroy']);
Route::post('/user/post/preview/{id}', [PostController::class, 'preview']);

//move to word editor to edit the article body
Route::resource('post.postbody', PostBodyController::class);

// Route::get('/user/post/move_to_editor/{id}', [PostController::class, 'moveToArticleEditor']);
// Route::post('/user/post/update-article-desc/{id}', [PostController::class, 'updateArticleDescription']);



//post images
Route::get('/post/image/index', [PostImageController::class, 'index']);
Route::get('/post/image/create', [PostImageController::class, 'create']);
Route::post('/post/image/store/{post_id}', [PostImageController::class, 'store']);
Route::get('/post/image/show/{id}', [PostImageController::class, 'show']);
Route::get('/post/image/edit/{id}', [PostImageController::class, 'edit']);
Route::get('/post/image/update/{id}', [PostImageController::class, 'update']);
Route::get('/post/image/delete/{id}', [PostImageController::class, 'destroy']);

//post article top image

Route::post('/post/image/title/store/{post_id}', [PostImageController::class, 'storeTitleImage']);





//settings
Route::get('/user/settings/index', [SettingController::class, 'index']);
Route::get('firebase', 'FirebaseController@index');

Route::post('/post/image/firebase', [PostImageController::class, 'uploadImageToFirebase']);


###Admin Routes
//article categories



Route::prefix('/admin')->name('admin.')->middleware(['admin',])->group(
    function () {
        Route::resource('categories', CategoryController::class);

        Route::get('/articles/category/index', [CategoryController::class, 'index']);
        Route::get('/articles/category/create', [CategoryController::class, 'create']);
        Route::post('/articles/category/store', [CategoryController::class, 'store']);
        Route::get('/articles/category/show/{id}', [CategoryController::class, 'show']);
        Route::get('/articles/category/edit/{id}', [CategoryController::class, 'edit']);
        Route::get('/articles/category/update/{id}', [CategoryController::class, 'update']);
        Route::get('/articles/category/delete/{id}', [CategoryController::class, 'destroy']);

        //articles
        //post images
        Route::get('/articles/index', [ArticleController::class, 'index']);
        Route::get('/articles/create', [ArticleController::class, 'create']);
        Route::post('/articles/store', [ArticleController::class, 'store']);
        Route::get('/articles/show/{id}', [ArticleController::class, 'show']);
        Route::get('/articles/edit/{id}', [ArticleController::class, 'edit']);
        Route::get('/articles/update/{id}', [ArticleController::class, 'update']);
        Route::get('/articles/delete/{id}', [ArticleController::class, 'destroy']);

        //pending articles
        Route::get('/articles/pending/index', [PendingArticleController::class, 'index']);
        Route::get('/articles/pending/create', [PendingArticleController::class, 'create']);
        Route::post('/articles/pending/store', [PendingArticleController::class, 'store']);
        Route::get('/articles/pending/show/{id}', [PendingArticleController::class, 'show']);
        Route::get('/articles/pending/edit/{id}', [PendingArticleController::class, 'edit']);
        Route::get('/articles/pending/update/{id}', [PendingArticleController::class, 'update']);
        Route::get('/articles/pending/delete/{id}', [PendingArticleController::class, 'destroy']);

        //published articles
        Route::get('/articles/published/index', [PublishedArticleController::class, 'index']);
        Route::get('/articles/published/create', [PublishedArticleController::class, 'create']);
        Route::post('/articles/published/store', [PublishedArticleController::class, 'store']);
        Route::get('/articles/published/show/{id}', [PublishedArticleController::class, 'show']);
        Route::get('/articles/published/edit/{id}', [PublishedArticleController::class, 'edit']);
        Route::get('/articles/published/update/{id}', [PublishedArticleController::class, 'update']);
        Route::get('/articles/published/delete/{id}', [PublishedArticleController::class, 'destroy']);

        //articlesProcessing
        Route::get('/articles/process/index', [ArticleProcessingController::class, 'index']);
        Route::get('/articles/process/create', [ArticleProcessingController::class, 'create']);
        Route::post('/articles/process/store', [ArticleProcessingController::class, 'store']);
        Route::get('/articles/process/show/{id}', [ArticleProcessingController::class, 'show']);
        Route::get('/articles/process/edit/{id}', [ArticleProcessingController::class, 'edit']);
        Route::get('/articles/process/update/{id}', [ArticleProcessingController::class, 'update']);
        Route::get('/articles/process/delete/{id}', [ArticleProcessingController::class, 'destroy']);

        //Users

        Route::get('/account/users/index', [AccountController::class, 'index']);
        Route::get('/account/users/create', [AccountController::class, 'create']);
        Route::post('/account/users/store', [AccountController::class, 'store']);
        Route::get('/account/users/show/{id}', [AccountController::class, 'show']);
        Route::get('/account/users/edit/{id}', [AccountController::class, 'edit']);
        Route::get('/account/users/update/{id}', [AccountController::class, 'update']);
        Route::get('/account/users/delete/{id}', [AccountController::class, 'destroy']);


        //Account Suspension
        Route::get('/account/suspend/index', [AccountSuspensionController::class, 'index']);
        Route::get('/account/suspend/create', [AccountSuspensionController::class, 'create']);
        Route::post('/account/suspend/store', [AccountSuspensionController::class, 'store']);
        Route::get('/account/suspend/show/{id}', [AccountSuspensionController::class, 'show']);
        Route::get('/account/suspend/edit/{id}', [AccountSuspensionController::class, 'edit']);
        Route::get('/account/suspend/update/{id}', [AccountSuspensionController::class, 'update']);
        Route::get('/account/suspend/delete/{id}', [AccountSuspensionController::class, 'destroy']);
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
