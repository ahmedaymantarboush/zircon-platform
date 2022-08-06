<?php

use Illuminate\Support\Facades\Storage;

function apiResponse($success,$message,$data,$statusCode = 200){
    return response()->json([
        'success'=>$success,
        'message'=>$message,
        'data'=>$data,
    ],$statusCode);
}

function removeCustomTags($content,$tags=[]){
    foreach ($tags as $tag){
        $dom = new DOMDocument();
        $dom->loadHTML($content);
        $script = $dom->getElementsByTagName($tag);
        // $remove = [];
        // foreach($script as $item)
        // {
        //     $remove[] = $item;
        // }
        // foreach ($remove as $item)
        // {
        //     $item->parentNode->removeChild($item);
        // }
        foreach ($script as $item)
        {
            $item->parentNode->removeChild($item);
        }
        $content = $dom->saveHTML();
    }
    return $content;
}

function uploadFile($request, $fileName, $oldPath = "", $folderName = "")
{
    set_time_limit(0);
    $file = $request->file($fileName);
    if ($folderName) {
        $path = explode('@', auth('sanctum')->user()->email)[0] . '_' . auth('sanctum')->id() . '/' . $folderName;
    } else {
        $path = explode('@', auth('sanctum')->user()->email)[0] . '_' . auth('sanctum')->id();
    }
    $UploadedFile = Storage::disk('public')->put($path,$file);
    dd($UploadedFile);
    if ($UploadedFile) {
        if ($oldPath) {
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }
    }
    return Storage::url($UploadedFile);
}

function getPrice($lecture){
    $price = 0;
    if(now() <= $lecture->discount_expiry_date):
        if ($lecture->final_price >= $lecture->price):
            $lecture->final_price = $lecture->price;
            $lecture->discount_expiry_date = null;
            $lecture->save();
        endif;
        $price = $lecture->final_price;
    else:
        if ($lecture->discount_expiry_date || $lecture->final_price <= $lecture->price):
            $lecture->final_price = $lecture->price;
            $lecture->discount_expiry_date = null;
            $lecture->save();
        endif;
        $price = $lecture->price;
    endif;
    return $price;
}

function getVideoInfo($video_id){

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/youtubei/v1/player?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{  "context": {    "client": {      "hl": "en",      "clientName": "WEB",      "clientVersion": "2.20210721.00.00",      "clientFormFactor": "UNKNOWN_FORM_FACTOR",   "clientScreen": "WATCH",      "mainAppWebInfo": {        "graftUrl": "/watch?v='.$video_id.'",           }    },    "user": {      "lockedSafetyMode": false    },    "request": {      "useSsl": true,      "internalExperimentFlags": [],      "consistencyTokenJars": []    }  },  "videoId": "'.$video_id.'",  "playbackContext": {    "contentPlaybackContext": {        "vis": 0,      "splay": false,      "autoCaptionsDefaultOn": false,      "autonavState": "STATE_NONE",      "html5Preference": "HTML5_PREF_WANTS",      "lactMilliseconds": "-1"    }  },  "racyCheckOk": false,  "contentCheckOk": false}');
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    return $result;
}
function apiUser(){
    return auth('sanctum')->user();
}
