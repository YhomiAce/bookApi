<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalBookController extends Controller
{
    public function fetchBooks()
    {
        try {
            $url = 'https://www.anapioficeandfire.com/api/books';
            $name = request('name');
            if (!empty($name)) {
                $url = "https://www.anapioficeandfire.com/api/books?name=$name";
            }

            $response = Http::get($url);
            $data = $response->json();

            if (count($data) < 1) {
                return response()->json([
                    "status_code"=> 200,
                    "status" => "success",
                    "data" => [],
                ]);
            }

            $books = array_map(array($this, 'formatResponse'), $data);
            return response()->json([
                "status_code"=> 200,
                "status" => "success",
                "data" => $books,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                "status_code"=> 500,
                "status" => "failure",
                "message" => 'An Error Occurred',
            ],500);
        }

    }

    public function formatResponse($data)
    {
        return  [
            "name" => $data['name'],
            "isbn" => $data['isbn'],
            "authors" => $data['authors'],
            "number_of_pages" => $data['numberOfPages'],
            "publisher" => $data['publisher'],
            "country" => $data['country'],
            "release_date" => $data['released']
        ];

    }


}
