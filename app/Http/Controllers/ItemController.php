<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->get();
        return view('item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit_of_measures = [
            'lb',
            'pc'
        ];

        return view('item.create', compact('unit_of_measures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $path = $request->file('img_url')->storePubliclyAs('images/items', $request->file('img_url')->getClientOriginalName(), 'public');

        Item::create([
            'item_code' => $request->item_code,
            'description' => $request->description,
            'unit_of_measure' => $request->unit_of_measure,
            'img_url' => $path
        ]);

        return redirect(route('item.index'))->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $unit_of_measures = [
            'lb',
            'pc'
        ];

        return view('item.edit', compact('item'), compact('unit_of_measures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }

    public function search(Request $request) {
        $search_word = $request->input('search_text');

        $items = Item::search($search_word)->get();

        return view('item.index', compact('items'));;
    }
}

