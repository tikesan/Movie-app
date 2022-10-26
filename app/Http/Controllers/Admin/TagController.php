<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;
use Inertia\Inertia;

class TagController extends Controller
{
    public function index(Request $request){
        $perPage = $request->perPage ? : 5;
        return Inertia::render('Tags/Index',[
            'tags' => Tag::query()
                    ->when($request->search,function($query,$search){
                        $query->where('tag_name','like',"%{$search}%");
                    })
                    ->paginate($perPage)
                    ->withQueryString(),
            'filters'=> $request->only(['search','perPage'])
        ]);
    }
    public function create(){
        return Inertia::render('Tags/Create');
    }
    public function store(Request $request){
        Tag::create([
            'tag_name' => $request->tagName,
            'slug'=> Str::slug($request->tagName),
        ]);
        return redirect()->route("admin.tags.index");
    }
}
