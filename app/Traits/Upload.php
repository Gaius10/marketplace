<?php

namespace App\Traits;

trait Upload {
    public function imageUpload($images, $columnName = null)
    {
        $uploadedImages = [];

        if (is_array($images))  {
            foreach ($images as $image) {
                $uploadedImages[] = [$columnName => $image->store('products', 'public')];
            }
        } else {
            $uploadedImages = $images->store('logo', 'public');
        }

        return $uploadedImages;
    }
}