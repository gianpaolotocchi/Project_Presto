<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function createAnnouncement()
    {
        return view('announcement.create');
    } 

    public function showAnnouncement(Announcement $announcement)
     {
        return view('announcement.show', compact('announcement'));
    }

    public function indexAnnouncement()
    {
        $announcements = Announcement::where('is_accepted', true)->paginate(6)->get()->sortByDesc('created_at');
        return view('announcement.index', compact('announcements'));
    }
}
