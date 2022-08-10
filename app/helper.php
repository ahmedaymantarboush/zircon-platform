<?php

use Illuminate\Support\Facades\Storage;
use hisorange\BrowserDetect\Facade as BrowserDetect;

function apiResponse($success, $message, $data, $statusCode = 200)
{
    return response()->json([
        'success' => $success,
        'message' => $message,
        'data' => $data,
    ], $statusCode);
}

function removeCustomTags($content, $tags = [])
{
    foreach ($tags as $tag) {
        $content = str_replace('<' . $tag, '&lt;' . $tag, $content);
        $content = str_replace('</' . $tag, '&lt;/' . $tag, $content);
    }
    return $content;
}

function uploadFile($request, $uploadedFileName, $newFileName, $oldPath = "", $folderName = "")
{
    set_time_limit(0);
    $file = $request->file($uploadedFileName);
    if ($folderName) {
        $path = explode('@', apiUser()->email)[0] . '_' . auth('sanctum')->id() . '/' . $folderName;
    } else {
        $path = explode('@', apiUser()->email)[0] . '_' . auth('sanctum')->id();
    }
    $savePath = $path . '/' . ($newFileName ? $newFileName . '.' . $file->getClientOriginalExtension() : $file->getClientOriginalName());
    $UploadedFile = Storage::disk('public')->put($savePath, file_get_contents($file));
    if ($UploadedFile && $oldPath) {
        if (Storage::disk('public')->exists($oldPath)) {
            Storage::disk('public')->delete($oldPath);
        }
    }
    return 'http://'.$request->getHttpHost().'/storage/'.$savePath;//Storage::url($UploadedFile);
}

function getPrice($lecture)
{
    $price = 0;
    if (now() <= $lecture->discount_expiry_date) :
        if ($lecture->final_price >= $lecture->price) :
            $lecture->final_price = $lecture->price;
            $lecture->discount_expiry_date = null;
            $lecture->save();
        endif;
        $price = $lecture->final_price;
    else :
        if ($lecture->discount_expiry_date || $lecture->final_price <= $lecture->price) :
            $lecture->final_price = $lecture->price;
            $lecture->discount_expiry_date = null;
            $lecture->save();
        endif;
        $price = $lecture->price;
    endif;
    return $price;
}

function getVideoInfo($video_id)
{

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://www.youtube.com/youtubei/v1/player?key=AIzaSyAO_FJ2SlqU8Q4STEHLGCilw_Y9_11qcW8');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{  "context": {    "client": {      "hl": "en",      "clientName": "WEB",      "clientVersion": "2.20210721.00.00",      "clientFormFactor": "UNKNOWN_FORM_FACTOR",   "clientScreen": "WATCH",      "mainAppWebInfo": {        "graftUrl": "/watch?v=' . $video_id . '",           }    },    "user": {      "lockedSafetyMode": false    },    "request": {      "useSsl": true,      "internalExperimentFlags": [],      "consistencyTokenJars": []    }  },  "videoId": "' . $video_id . '",  "playbackContext": {    "contentPlaybackContext": {        "vis": 0,      "splay": false,      "autoCaptionsDefaultOn": false,      "autonavState": "STATE_NONE",      "html5Preference": "HTML5_PREF_WANTS",      "lactMilliseconds": "-1"    }  },  "racyCheckOk": false,  "contentCheckOk": false}');
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
function getVideoUrl($video_id){
    $videoData = ['audio'=>[],'video'=>[]];
    foreach (json_decode(getVideoInfo($video_id), true)['streamingData']['adaptiveFormats'] as $format) :
        if (str_starts_with($format['mimeType'], 'video/mp4')):
            $videoData[][$format['qualityLabel']] = $format['url'];
        elseif (str_starts_with($format['mimeType'], 'audio/mp4')):
            $videoData['audio'][] = $format['url'];
        endif;
    endforeach;
    return $videoData;
}

function apiUser()
{
    return auth('sanctum')->user();
}

// function getBrowser(){
//     return BrowserDetect::browserName();
// }

function getIp(){
    return request()->ip();
}
