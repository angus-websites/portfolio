<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class SitemapController extends Controller
{
    public function index()
    {
      return response()->view(
        'sitemap.index',['projects' => Project::all()])->header('Content-Type', 'text/xml');
    }

    public function general()
    {
      return response()->view(
        'sitemap.general')->header('Content-Type', 'text/xml');
    }

    public function projects()
    {
      return response()->view(
        'sitemap.projects',['projects' => Project::where("active", "1")->get()])->header('Content-Type', 'text/xml');
    }
}
