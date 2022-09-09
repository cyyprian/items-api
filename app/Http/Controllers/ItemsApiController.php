<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Resources\ItemCollection;

class ItemsApiController extends Controller
{
    const ITEMS_PER_PAGE = 2;

    public function items(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string'
        ]);

        $search = $request->get('search');

        if($search) {
            $data = Item::where('title', 'like', '%' . $search . '%')->paginate(self::ITEMS_PER_PAGE);            
        } else {
            $data = Item::paginate(self::ITEMS_PER_PAGE);
        }

        return new ItemCollection($data);
    }
}
