<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Models\Music;
use function PHPUnit\Framework\isEmpty;

class MusicController extends Controller
{
    public function getAllMusic()
    {
        $music = Music::all()->toJson();

        return response($music, 200);
    }

    public function createMusic(Request $request): JsonResponse
    {
        $music = new Music;
        $music->name = $request->name;
        $music->link = $request->link;
        $music->save();

        return response()->json([
            "message" => "music record created"
        ], 201);
    }

    public function getMusic($id)
    {
        if (Music::where('id',$id)->exists())
        {
            $music = Music::where('id', $id) -> get()->toJson();

            return response($music,200);
        }
        else
        {
            return response()->json([
                "message" => "music not found"
            ], 404);
        }
    }

    public function updateMusic(Request $request, $id)
    {
        if (Music::where('id', $id)->exists()) {
            $music = Music::find($id);
            $music->name = is_null($request->name) ? $music->name : $request->name;
            $music->link = is_null($request->link) ? $music->link : $request->link;
            $music->save();

            return response()->json([
                "message" => "music link updated successfully"
            ], 200);
        } else {

            return response()->json([
                "message" => "music link not found"
            ], 404);

        }
    }

    public function deleteMusic($id)
    {
        if (Music::where('id', $id)->exists())
        {
            $music = Music::find($id);
            $music->delete();

            return response()->json([
                "message" => "music link deleted"
            ],202);
        }
        else
        {

            return response()->json([
               "message" => "music link not found"
            ], 404);
        }
    }
}
