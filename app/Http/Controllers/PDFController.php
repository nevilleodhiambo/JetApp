<?php
      
namespace App\Http\Controllers;
       
use Illuminate\Http\Request;
use App\Mail\PDFMail;
use PDF;
use Mail;
    
class PDFController extends Controller
{
       
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["email"] = "nevilleodhiambo28@gmail.com";
        $data["title"] = "From Neville Inc";
        $data["body"] = "This is Demo";
    
        $pdf = PDF::loadView('emails.myTestMail', $data);
        $data["pdf"] = $pdf;
  
        Mail::to($data["email"])->send(new PDFMail($data));
    
        dd('Mail sent successfully');
    }
       
}