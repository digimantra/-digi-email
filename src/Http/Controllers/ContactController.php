<?php 

namespace Kushagra\Testing\Http\Controllers;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Kushagra\Testing\Models\Contact;
use Kushagra\Testing\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller{

    public function sendEmail($data){
        try{
                // $validated = $data->validate([
                //     'email' => 'required|email',
                //     'html' => 'required',
                //     'content' => 'required_if:html,true',
                //     'view' => 'required_if:html,false',
                //     'attachment' => 'required',
                //     'subject' => 'required',
                // ]);
                $err = [];
                if( !empty($data['email']) ){
                    $email = $data['email'];
                } else {
                    $err['email'] = "Please enter a valid email" ;
                }
                if( !empty($data['subject']) ){
                    $subject = $data['subject'];
                } else {
                    $err['subject'] = "Please enter a valid subject" ;
                }
                if( !empty($data['content']) ){
                    $content = $data['content'];
                } else {
                    $content = '' ;
                }
                if( is_bool($data['html']) ){
                    $html = $data['html'];
                } else {
                    $err['html'] = "Please enter a valid html" ;
                }
                if( !empty($data['view']) ){
                    $view = $data['view'];
                } else {
                   $view = '' ;
                }
                Mail::to($email)->send(new ContactMailable($content, $view, $subject));
                // return back();
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