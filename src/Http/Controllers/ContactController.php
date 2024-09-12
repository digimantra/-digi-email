<?php 

namespace Kushagra\Testing\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kushagra\Testing\Models\Contact;
use Kushagra\Testing\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller{
    public function contact(){
        return view('kushagra.testing::contact');
    }

    public function store(Request $request){
        try{
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]);
            Mail::to($validated['email'])->send(new ContactMailable($validated['message'], $validated['name']));
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