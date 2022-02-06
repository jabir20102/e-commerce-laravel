<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use DataTables;

class ImageController extends Controller
{
  public function __construct()
  {
      $this->middleware('admin');//->except(['signin','signin_post']);
  }
  function img(Request $request){

    $file = $request->file('file');
    $file_path = $file->getPathName();
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://api.imgur.com/3/image', [
        'headers' => [
                'authorization' => 'Client-ID ' . 'b15f97ef45dd8e1',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
        'form_params' => [
                'image' => base64_encode(file_get_contents($request->file('file')->path($file_path)))
            ],
        ]);
  

       
    return $imageName= data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');



  }
    
    //    for the images
    public function viewImages($product_id){

        session()->put('product_id',$product_id);
      return view('admin.viewImages',compact('product_id'));
    }
    public function Images()
    {
      $product_id=session()->get('product_id');//$request->get('user_id');
     //  $images = \File::allFiles(public_path('images'));
     $images=Image::where('product_id','=',$product_id)->get();
     $output = '<div class="row">';
     foreach($images as $image)
     {
     $output .= '
     <div style="position:relative" class="col-md-2" style="margin-bottom:16px;" align="center">
      <button style="position:absolute"  class="btn btn-danger remove_image" id="'.$image->id.'" > X </button>
      
                
                
                <img src="' . $image->path.'" class="img-thumbnail" 
                alt="NOT FOUND"
                width="175" height="175" style="height:175px;" />
                
      </div>
      ';
      // <img src="'.url('images/' . $image->path).'" class="img-thumbnail" 
     }
     $output .= '</div>';
     echo $output;
    }
    
    function addImages(Request $request)
    {
        $product_id=session()->get('product_id');
    //  $image = $request->file('file');        
    //  $imageName = time() .'_'.$product_id. '.' . $image->extension();
    //  $image->move("images/",$imageName); 
    $file = $request->file('file');
    $file_path = $file->getPathName();
    $client = new \GuzzleHttp\Client();
    $response = $client->request('POST', 'https://api.imgur.com/3/image', [
        'headers' => [
                'authorization' => 'Client-ID ' . 'b15f97ef45dd8e1',
                'content-type' => 'application/x-www-form-urlencoded',
            ],
        'form_params' => [
                'image' => base64_encode(file_get_contents($request->file('file')->path($file_path)))
            ],
        ]);
  

       
    $imageName= data_get(response()->json(json_decode(($response->getBody()->getContents())))->getData(), 'data.link');


     $image=new Image;
     $image->path=$imageName;
     $image->product_id=$product_id;
     $image->save();

     return response()->json(['success' => $imageName]);
     
    }

    

    public function deleteImages( Request $request)
    {
        $image=Image::find($request->post('id'));
      
        \File::delete(public_path('images/' . $image->path));
        Image::destroy($image->id);
    }

}
