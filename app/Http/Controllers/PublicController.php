<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() 
    {
        if (session()->has('access.denied')) {
            $message = session()->get('access.denied');
            session()->flash('access.denied', $message);
        }
        $announcements = Announcement::where('is_accepted', true)->take(6)->get()->sortByDesc('created_at');
        
    return view('welcome', compact('announcements'));
}

public function categoryShow(Category $category)
{
    
    return view('categoryShow', compact('category'));
}
}
