<?php 

namespace Kushagra\Testing\Http\Controllers;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Kushagra\Testing\Models\Contact;
use Kushagra\Testing\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller{

    public function store($data){
        try{
                $validated = $data->validate([
                    'email' => 'required|email',
                    'html' => 'required',
                    'content' => 'required_if:html,true',
                    'view' => 'required_if:html,false',
                    'attachment' => 'required',
                    'subject' => 'required',
                ]);
                Mail::to($validated['email'])->send(new ContactMailable($validated['content'], $validated['view'], $validated['subject']));
                return back();
            // $user = Contact::create($validated);
            // if($user){
            //     return redirect()->back();
            // }
            // else {
            //     return back()->withErrors(['error'=>'Failure']);
            // }
        } catch(\Exception $th){
            return $th->getMessage();
        }
    }
}