<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\is_null;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $totalPosts = Post::where('user_id', Auth::user()->id)->count();  
        $totalPublish = Post::where('status', 1)->where('user_id', Auth::user()->id)->count();
        $totalUnPublish = Post::where('status', 0)->where('user_id', Auth::user()->id)->count();
        return view('dashboard', ['totalPosts' => $totalPosts, 'totalPublish' => $totalPublish, 'totalUnPublish' => $totalUnPublish]);
        
    }
}