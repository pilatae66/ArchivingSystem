<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ItemController extends Controller
{

    protected $unit_of_measures = [
        // Length
        "Meter (m)",
        "Centimeter (cm)",
        "Millimeter (mm)",
        "Inch (in)",
        "Foot (ft)",
        "Yard (yd)",
      
        // Weight
        "Kilogram (kg)",
        "Gram (g)",
        "Milligram (mg)",
        "Ton (t)",
        "Pound (lb)",
        "Ounce (oz)",
      
        // Volume
        "Liter (L)",
        "Milliliter (mL)",
        "US Gallon (gal)",
        "UK Gallon (gal)",
        "Fluid Ounce (fl oz)",
      
        // Area
        "Square Meter (m²)",
        "Square Centimeter (cm²)",
        "Square Inch (in²)",
        "Square Foot (ft²)",
        "Acre (ac)",
      
        // Other
        "Piece (pcs)",
        "Dozen (dz)",
        "Set (set)",
        "Pair (pr)",
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = session()->has('items') ? session()->get('items') : Item::latest()->get();

        return view('Item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unit_of_measures = $this->unit_of_measures;

        return view('Item.create', compact('unit_of_measures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $params = [
            'item_code' => $request->item_code,
            'description' => $request->description,
            'unit_of_measure' => $request->unit_of_measure,
            'department' => $request->department,
            'end_user' => $request->end_user,
            'requestor' => $request->requestor
        ];

        if($request->hasFile('img_url')) {
            $path = $request->file('img_url')->storePubliclyAs('images/items', $request->file('img_url')->getClientOriginalName(), 'public');
            $params['img_url'] = $path;
        }

        if($request->has('specification')) {
            $params['specification'] = $request->specification;
        }

        Item::create($params);

        return redirect(route('item.index'))->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $unit_of_measures = $this->unit_of_measures;

        return view('Item.edit', compact('item'), compact('unit_of_measures'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $params = [
            'item_code' => $request->item_code,
            'description' => $request->description,
            'unit_of_measure' => $request->unit_of_measure,
            'department' => $request->department,
            'end_user' => $request->end_user,
            'requestor' => $request->requestor
        ];

        if($request->hasFile('img_url')) {
            $path = $request->file('img_url')->storePubliclyAs('images/items', $request->file('img_url')->getClientOriginalName(), 'public');
            $params['img_url'] = $path;
        }

        if($request->has('specification')) {
            $params['specification'] = $request->specification;
        }

        $item->update($params);

        return redirect(route('item.index'))->with('message', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect(route('item.index'))->with('message', 'Item deleted successfully.');
    }

    public function search(Request $request) {
        $search_word = $request->input('search_text');

        $items = Item::search($search_word)->get();

        $empty_message = $items->isEmpty() ? "No items available for $search_word" : "";

        return redirect(route('home'))->with('items', $items)->with('empty_message', $empty_message)->withInput();
    }
}

