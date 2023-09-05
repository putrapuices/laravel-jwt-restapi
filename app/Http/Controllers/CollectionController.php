<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function collectionSatu()
    {
        $myArray = [1, 9, 3, 4, 5, 3, 5, 7];
        $collection = new \Illuminate\Support\Collection($myArray);
        dd($collection);
        die();
    }

    public function collectionDua()
    {
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);

        echo $collection[0];
        echo "<br>";
        echo $collection[2];
        echo "<br>";

        foreach ($collection as $value) {
            echo "$value ";
        }


        // Collection dari berbagai tipe data
        $collection = collect(["belajar", "laravel", "uncover", 1, 2, 3]);
        echo "<br>";

        echo $collection;

        echo "<br>";

        // Collection dari associative array
        $collection = collect([
            "nama" => "Laura",
            "sekolah" => "SMA 5 Lampung",
            "kota" => "Lampung",
            "jurusan" => "IPA",
        ]);
        echo "<br>";

        echo $collection;
    }

    public function collectionTiga()
    {
        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);

        // Operasi Matematis
        dump($collection->sum()); // 37
        dump($collection->avg()); // 4.625
        dump($collection->max()); // 9
        dump($collection->min()); // 1
        dump($collection->median()); // 4.5

        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);
        dump($collection->random());

        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);
        echo $collection->concat([10, 11, 12]);
        // [1,9,3,4,5,3,5,7,10,11,12]

        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);
        dump($collection->contains(3)); // true
        dump($collection->contains(8)); // false

        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);
        echo $collection->unique();
        // {"0":1,"1":9,"2":3,"3":4,"4":5,"7":7}

        $collection = collect([1, 9, 3, 4, 5, 3, 5, 7]);
        dump( $collection->all() ); // [1, 9, 3, 4, 5, 3, 5, 7]
    }
}
