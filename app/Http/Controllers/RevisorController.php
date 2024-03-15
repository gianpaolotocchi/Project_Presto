<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\BecomeRevisorMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view ('revisor.index', compact('announcement_to_check'));
    }
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Hai accettato l\'annuncio');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {                 
        $announcement->setAccepted(false);
        return redirect()->back()->with('message','Hai rifiutato l\'annuncio');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send( new BecomeRevisorMail(Auth::user()));
        return redirect('/')->with('message', 'Complimenti hai richiesto di diventare revisore! ');

    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('message', 'Complimnti! l\'utente è diventato revisore!');
    }
}
