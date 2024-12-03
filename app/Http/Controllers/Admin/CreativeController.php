<?php

namespace App\Http\Controllers\Admin;

use App\Models\Creative;
use App\Models\CreativeType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CreativeController extends Controller
{
    public function view()
    {
        $creatives = Creative::with('creativeType')->paginate(5);
        dd($creatives);
        return view('admin.creative.view', compact('creatives'));
    }
    public function add()
    {
        // $categories = Creartive::all();
        $creative_types = CreativeType::all();
        return view('admin.creative.add', compact('creative_types'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'creative_type_id' => 'required',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            'video.*' => 'nullable|mimes:mp4,avi,mov|max:20480',
            'content' => 'nullable | max:50',
            'cta_name' => 'required | max:50',
            'landing_url' => 'required',
            'tracking_url' => 'required | max:50',
            'creative_name' => 'required | max:50',
        ]);

        // Check if files exist in the request
        if ($request->hasFile('image')) {
            $filePaths = [];
            foreach ($request->file('image') as $key => $file) {
                $imageName1 = strtotime('now') . $key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $imageName1);
                $filePaths[] = $imageName1;
            }
        }
        if ($request->hasFile('video')) {
            $filePaths = [];
            foreach ($request->file('video') as $key => $file) {
                $videoName1 = strtotime('now') . $key . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $videoName1);
                $filePaths1[] = $videoName1;
            }
        }
        $creative = new Creative;
        $creative->creative_type_id = $request->creative_type_id;
        $creative->content = $request->content;
        $creative->landing_url = $request->landing_url;
        $creative->tracking_url = $request->tracking_url;
        $creative->image = json_encode($filePaths); 
        // $creative->video = json_encode($filePaths1);
        $creative->creative_name = $request->creative_name;
        $creative->cta_name = $request->cta_name;
        $creative->save();
        return redirect()->route('admin.creative.view')->with('message', 'Product Added Successfully');
    }

    // public function edit($id)
    // {
    //     $product = Product::find($id);
    //     $categories = Category::all();
    //     return view('admin.product.add', compact('product', 'categories'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required | max:50',
    //         'description' => ['required', 'max:400'],
    //         'category_id' => 'required',
    //         'price' => 'required',
    //         'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
    //         'status' => 'required',
    //         'quantity' => 'required'
    //     ]);
    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }
    //     $product = Product::find($id);
    //     $product->title = $request->title;
    //     $product->description = $request->description;
    //     $product->category_id = $request->category_id;
    //     $product->price = $request->price;
    //     if ($request->hasFile('image')) {
    //         $imageName = time() . '.' . $request->image->extension();
    //         $request->image->move(public_path('images/products'), $imageName);
    //         $product->image = '/images/products/' . $imageName;
    //     }
    //     $product->quantity = $request->quantity;
    //     $product->status = $request->status;
    //     $product->save();
    //     return redirect()->route('admin.product.view')->with('message', 'Product Updated Successfully');
    // }

    public function delete($id)
    {
        $product = Creative::find($id);
        $product->delete();
        return redirect()->route('admin.creative.view')->with('message', 'Creative Deleted Successfully');
    }
}
