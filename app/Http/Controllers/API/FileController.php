<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Get the path to the specified image.
     *
     * @param  string  $imageName
     * @return \Illuminate\Http\JsonResponse
     */
    public function getImagePath($imageName)
    {
        // Construct the full path to the image
        $imagePath = public_path('images/' . $imageName);
        
        // Check if the image file exists
        if (file_exists($imagePath)) {
            // If the image exists, return its path as a JSON response
            return response()->json(['image_path' => asset('images/' . $imageName)], 200);
        } else {
            // If the image does not exist, return a 404 error
            return response()->json(['error' => 'Image not found.'], 404);
        }
    }

}
