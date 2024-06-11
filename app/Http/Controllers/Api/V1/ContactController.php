<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
  

class ContactController extends Controller
{
    
    public function index()
    {
        return Contact::all();
    }

    public function indexlist():View
    {
        if(Auth::check()){
        $contacts=Contact::where('con_userid', Auth::id())->get();
        return view('dashboard', ['contacts' => $contacts]);
        }
    }
    public function show($id)
    {
        return Contact::find($id);
    }

    public function store(Request $request)
    {
        return Contact::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $Contact = Contact::findOrFail($id);
        $Contact->update($request->all());

        return $Contact;
    }

    public function delete(Request $request, $id)
    {
        $Contact = Contact::findOrFail($id);
        $Contact->delete();

        return 204;
    }
}