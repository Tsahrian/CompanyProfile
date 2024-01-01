<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ImageSlider;
use App\Models\Jasa;
use App\Models\Message;
use App\Models\Partner;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Sosmed;
use App\Models\TextIntro;
use App\Models\Visi_Misi;
use App\Models\Youtube;
use Illuminate\Support\Facades\Lang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    public function index()
    {
        $locale = 'id';
        if (session()->has('locale')) {
            $locale = session()->get('locale');
        }

        $text_intro = TextIntro::all();
        foreach($text_intro as $val) {
            if ($locale == 'en') {
                $val->title_intro = $val->title_intro_en;
                $val->body_intro = $val->body_intro_en;
            }
        }

        $image_slider = ImageSlider::all();
        // echo"<pre>";
        // print_r($image_slider); die();
        foreach($image_slider as $val) {
            if ($locale == 'en') {
                $val->title_slider = $val->title_slider_en;
                $val->body = $val->body_en;
            }
        }
        $jasas = Jasa::all();

        foreach($jasas as $val) {
            if ($locale == 'en') {
                $val->title_jasa = $val->title_jasa_en;
                $val->body = $val->body_en;
            }
        }
        $photo_gallery = PhotoGallery::all();
        foreach($photo_gallery as $val) {
            if ($locale == 'en') {
                $val->title_photo = $val->title_photo_en;
                $val->body = $val->body_en;
            }
        }
        $youtubes = Youtube::all();
        foreach($youtubes as $val) {
            if ($locale == 'en') {
                $val->title_video = $val->title_video_en;
            }
        }
        $blog = Blog::all();
        foreach($blog as $val) {
            if ($locale == 'en') {
                $val->title = $val->title_en;
                $val->body = $val->body_en;
            }
        }
        // echo "<pre>";
        // print_r($blog); die();
        for($x=0;$x<count($blog);$x++) {
            $classInverted = '';
            if (($x+1) % 2 == 0) {
                $classInverted = 'timeline-inverted';
            }

            $blog[$x]->class_inverted = $classInverted;
        }

        $visi_misis = Visi_Misi::all();
        foreach($visi_misis as $val) {
            if ($locale == 'en') {
                $val->title = $val->title_en;
                $val->body = $val->body_en;
            }
        }
        $partners = Partner::all();
        $profiles = Profile::all();
        $sosmeds = Sosmed::all();
        return view('index', [
            'text_intros' => $text_intro,
            'image_slider' => $image_slider,
            'jasas' => $jasas,
            'photo_gallery' => $photo_gallery,
            'youtubes' => $youtubes,
            'blog' => $blog,
            'visi_misis' => $visi_misis,
            'partners' => $partners,
            'profiles' => $profiles,
            'sosmeds' => $sosmeds
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'phone' => 'required|max:13',
            'pesan' => 'required|'
        ]);

        Message::create($validateData);
        // $request->session()->flash('success', 'Pesan berhasil dikirim, Terima kasih!!');
        Alert::success('Success', 'Success Message Send');
        return redirect('/');
    }
}
