<?php

use Illuminate\Support\Facades\Route;


use App\Models\Articles\Categories;
use App\Http\Controllers\Admin\Articles\ArticleController;
use App\Http\Controllers\Admin\Articles\ArticleProcessingController;
use App\Http\Controllers\Admin\Articles\PendingArticleController;
use App\Http\Controllers\Admin\Articles\PublishedArticleController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\ExternalPostsAPIController;
use App\Http\Controllers\Admin\Users\AccountController;
use App\Http\Controllers\Admin\Users\AccountSuspensionController;
use App\Http\Controllers\Admin\Users\ArticleController as UsersArticleController;
use App\Http\Controllers\Author\PostController as AuthorPostController;
use App\Http\Controllers\Client\ResponseController;
use App\Http\Controllers\ClientPostController;
use App\Http\Controllers\ExternalNewsController;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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


Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);


//post articles
Route::get('/articles/index', function () {
    return view('post.index');
});
Route::get('/articles/hidden', function () {
    return view('hidden');
});

Route::get('/users/posts/post/{post_id}', [ClientPostController::class, 'show']);
Route::get('/{post_title}', [ClientPostController::class, 'show']);
// Route::post('/{post_title}', [ClientPostController::class, 'show']);


Route::get('/post/{post_id}', [ClientPostController::class, 'showPost'])->name('viewpost');

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

Route::get('/externalnewsitems/updatePosts', [ExternalNewsController::class,'updatePosts']);

Route::resource('/externalnewsitems', ExternalNewsController::class);

Route::prefix('/author')->name('author.')->middleware(['auth', 'author',])->group(
    function () {
        Route::post('/post/preview/{id}', [AuthorPostController::class, 'preview'])->name('preview');
        Route::post('/post/veiwinweb/{id}', [AuthorPostController::class, 'viewInWeb'])->name('veiwinweb');
        Route::resource('post', AuthorPostController::class);


        //post images
        Route::resource('postimages', PostImageController::class);

        Route::get('images/index', [PostImageController::class, 'index']);
        Route::get('/post/image/create', [PostImageController::class, 'create']);
        Route::post('/post/image/store/{post_id}', [PostImageController::class, 'store']);
        Route::get('/post/image/show/{id}', [PostImageController::class, 'show']);
        Route::get('/post/image/edit/{id}', [PostImageController::class, 'edit']);
        Route::get('/post/image/update/{id}', [PostImageController::class, 'update']);
        Route::get('/post/image/delete/{id}', [PostImageController::class, 'destroy']);
    }
);

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

Route::post('/post/image/firebase', [PostImageController::class, 'uploadImageToFirebase']);


###Admin Routes
//article categories



Route::prefix('/admin')->name('admin.')->middleware(['auth', 'admin',])->group(
    function () {
        Route::resource('categories', CategoryController::class);

        //articles
        //post images
        Route::resource('articles', ArticleController::class);

        //pending articles
        Route::resource('pendingarticles', PendingArticleController::class);

        //published articles
        Route::resource('publishedarticles', PublishedArticleController::class);

        //user accounts
        Route::resource('/useraccounts', AccountController::class);

        //user accounts articles
        Route::resource('useraccounts.userarticles', UsersArticleController::class);

        //Account Suspension
        Route::resource('/suspendeduseraccounts', AccountSuspensionController::class);

        //Account Suspension
        Route::put('/apis/commands/{apiadmincommand}', [ExternalPostsAPIController::class, 'updateAdminCommands'])->name('apiadmincommands');
        Route::resource('/apis', ExternalPostsAPIController::class);
    }
);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
