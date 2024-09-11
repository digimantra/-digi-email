<?php 

namespace Kushagra\Testing\Http\Controllers;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller{
    public function index(){
        return view('kushagra.testing::contact');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
        echo $validate;
    }
}