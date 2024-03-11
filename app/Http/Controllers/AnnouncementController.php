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
        $announcements = Announcement::paginate(3);
        return view('announcement.index', compact('announcements'));
    }
}
