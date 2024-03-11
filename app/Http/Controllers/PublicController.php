<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage() 
    {
        $announcements = Announcement::take(6)->get()->sortByDesc('created_at');
        
    return view('welcome', compact('announcements'));
}

public function categoryShow(Category $category)
{
    // $announcements = $category->announcements()
    //     ->where('is_accepted', true)
    //     ->orderBy('created_at', 'desc')
    //     ->paginate(10);da inserire nella compact  (, 'announcements')
    return view('categoryShow', compact('category'));
}
}
