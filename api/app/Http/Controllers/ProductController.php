<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all();
        // return $products;

        $products = Product::latest()->paginate(5);
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function get()
    {
        $images = Product::orderBy('id','DESC')->get();
        return response()->json($images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $images = new Product();
		$request->validate([
            'title' => 'required',
            'category' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename=""; // Only name of image not include https
        if ($file = $request->file('image')) {
            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $filePath = 'ufashion/' . $filename;
            Storage::disk('digitalocean')->put($filePath, file_get_contents($file), 'public');
            $url = Storage::disk('digitalocean')->url('ufashion/' . $filename);
        }else{
            $filename=Null;
        }
        
        $images->title=$request->title;
        $images->category=$request->category;
        $images->description=$request->description;
        $images->price=$request->price;
        $images->image=$url;
        $images->image_file=$filename;
        $result=$images->save();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		// $request->validate([
        //     'title' => 'required',
        //     'category' => 'required',
        //     'price' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
		
        // // return Product::create($request->all());
        // $input = $request->all();

        // if ($file = $request->file('image')) {
        //     $name = date('YmdHis') . "." . $file->getClientOriginalExtension();
        //     $filePath = 'ufashion/' . $name;
        //     Storage::disk('digitalocean')->put($filePath, file_get_contents($file), 'public');

        //     $url = Storage::disk('digitalocean')->url('ufashion/' . $name);
        //     // $cdn_url = str_replace('digitaloceanspaces', 'cdn.digitaloceanspaces', $url);
        //     $input['image'] = "$url"; // Get image urls
            
        //     $file->move($filePath, $name); // local storage files

        //     // return back()->with('success','Image Uploaded successfully');
        // }

        // Product::create($input);
        // return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $images = Product::findOrFail($id);
        return response()->json($images);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $product = Product::find($id);
        // $product->update($request->all());
        // return $product;

        $images = Product::findOrFail($id);
        
        $destination = 'ufashion/'.$images->image_file;
        $filename="";

        // return $destination;
        
        // if($request->hasFile('new_image')){
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        // }

        if($file = $request->file('image')){
            if(Storage::disk('digitalocean')->exists($destination)) {
                Storage::disk('digitalocean')->delete($destination);
            }
            // $filename=$request->file('new_image')->store('posts','public');
            if ($file = $request->file('image')) {
                $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $filePath = 'ufashion/' . $filename;
                Storage::disk('digitalocean')->put($filePath, file_get_contents($file), 'public');
                $url = Storage::disk('digitalocean')->url('ufashion/' . $filename);
            }
        }else {
            $filename=$request->image;
        }
        
        // $images->title=$request->title;
        // $images->category=$request->category;
        // $images->price=$request->price;
        $images->image=$url;
        $images->image_file=$filename;
        $result=$images->save();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $images = Product::findOrFail($id);
        $destination = 'ufashion/'.$images->image_file;

        // if(File::exists($destination)){
        //     File::delete($destination);
        // }
        if(Storage::disk('digitalocean')->exists($destination)) {
            Storage::disk('digitalocean')->delete($destination);
        }
        $result=$images->delete();
        if($result){
            return redirect()->route('products.index')->with('success','Product deleted successfully');
            // return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }

        // $product = Product::destroy($id);
        // return Product::destroy($id);

        // if(Storage::disk('digitalocean')->exists($path)) {
        //     $delete_img = Storage::disk('digitalocean')->delete($path);
        // }

        // $product->delete($delete_img);
        // return redirect()->route('products.index')->with('success','Product deleted successfully');
    }

	/**
     * Search for a title
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Product::where('title', 'like', '%'.$title.'%')->get();
    }
}