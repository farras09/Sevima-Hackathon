<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class ImageCompressionController extends Controller
{
    //

    public function compress(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            // Buat nama unik untuk file
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $size     = $request->file('image')->getSize();
            // Simpan file ke direktori storage/public/spesimen-fotos
            $manager = new ImageManager(new Driver());

            // create new image instance with 800 x 600 (4:3)
            $image = $manager->read($file);

                                        // scale to fixed height
            $image->scale(height: 300); // 400 x 300 (4:3)

                                     // scale to 120 x 100 pixel
            $image->scale(120, 100); // 120 x 90 (4:3)

            $file->storeAs('compressed_image', $namaFile, 'public');

            dd($image);
        }

    }
}
