<?php
 
namespace Digimantra\Digiemail\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Digimantra\Digiemail\Jobs\SendContactEmailJob;

 
class ContactController extends Controller{
 
    public function sendEmail($data){
        try{
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
                if( !empty($data['files']) ){
                    $files = $data['files'];
                } else {
                   $files = [] ;
                }
                SendContactEmailJob::dispatch($email, $content, $view, $subject, $files);
                return 1;
        } catch(\Exception $th){
            Log::error( $th->getMessage());
            return 0;
        }
    }
}