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
        
        $announcement = Announcement::find(true);
        
        if ($announcement) {
            $image = $announcement->images()->first();
            if ($image) {
                $url = $image->getUrl(300, 300);
            } 
            
            $announcements = Announcement::where('is_accepted', true)->paginate(6);
            return view('announcement.index', compact('announcements'));
        }
    }
}