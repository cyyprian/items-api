<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index()
    {
        return view('items.index', ['total_items' => Item::get()->count()]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'video_url' => 'nullable|url',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        $image_path = request()->file('image')->storePublicly('/');

        $data = $request->all();
        $data['image'] = $image_path;

        Item::create($data);

        return Redirect::route('items.index');
    }
}
