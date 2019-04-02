<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class LanguageController extends Controller
{
   private $languageActive = [
       'vi',
       'en',
   ];
   public function changeLanguage(Request $request, $language)
   {
       if (in_array($language, $this->languageActive)) {
           $request->session()->put(['language-web' => $language]);
           return redirect()->back();
       }
   }
}