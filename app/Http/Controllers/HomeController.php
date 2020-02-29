<?php
// CONTROLLER PUBLIC
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewLead;

class HomeController extends Controller
{
    public function index() {
      return view('home');
    }
    public function info() {
      return view('info');
    }
    public function contatti() {
      return view('contatti');
    }
    public function contattiStore(Request $request) {
      $nuovoMessaggio = new Lead();
      $nuovoMessaggio->fill($request->all());
      $nuovoMessaggio->save();
      Mail::to('admin@luca.com')->send(new NewLead($nuovoMessaggio));
      return redirect()->route('contatti.grazie');
    }
    public function grazie() {
      return view('grazie');
    }
}
