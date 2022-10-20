<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter) {
        request()->validate([
            'email' => 'required:email'
        ]);
    
        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => "Couldn't add email to newsletter list."
            ]);
        }
        
        return redirect('/')->with('success', 'Signed up for newsletter!');
    }
}
