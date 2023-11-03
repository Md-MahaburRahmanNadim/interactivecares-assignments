<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProtfolioController extends Controller
{
    public function home(){
        $homePageData = File::json(storage_path('data/home.json'));
        return view('home', compact('homePageData'));
    }
    public function singleExperience($skill){
        $skillsDescription = File::json(storage_path('data/experiences.json'));
        $skill = strtolower($skill);
        // dd($skill);

        return view('singleExperience', compact('skillsDescription', 'skill'));
    }
    public function experience(){
            return view('Experience');
    }
    public function projects(){
            return view('projects');
    }
    public function singleProject($projectName){
        $allProject = File::json(storage_path('/data/projects.json'));
        // dd($allProject);
        $projectName = strtolower($projectName);
        return view('singleProject', compact('projectName','allProject'));
    }
}