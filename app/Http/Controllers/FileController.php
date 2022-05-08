<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use Tymon\JWTAuth\Facades\JWTAuth;
use \App\Http\Services\TableFileParser;
use App\Http\Requests\BooksUploadRequest;

class FileController extends Controller
{
    public function parse(BooksUploadRequest $request)
    {
        if(!JWTAuth::user()->isAdmin())
            return response()->json(["message" => 'Only Admin users can upload files'], 403);

        $file = $request->file('file');
        
        try {
            $parsedData = (new TableFileParser($file))->parse();

            foreach($parsedData as $row){
                $data = [
                    "name" => $row[0],
                    "author" => $row[1],
                    "publisher" => $row[2],
                    "published_date" => Carbon::createFromFormat("d/m/Y",$row[3])
                ];

                Book::create($data);
            }
        }
        catch (\Exception $e){
            return response()->json(["message" => $e->getMessage()], 400);
        }

        return response()->json(["message" => "Books added", 201]);
    }
}
