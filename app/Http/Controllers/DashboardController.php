<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $category   =   Category::count();
        $posts      =   Post::count();
        $users      =   User::where('role_as','0')->count();
        $blogger    =   User::where('role_as','2')->count();
        return view('admin.dashboard', compact('category','posts','users','blogger'));
    }
}
