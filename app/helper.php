<?php

function apiResponse($success,$message,$data,$statusCode = 200){
    return response()->json([
        'success'=>$success,
        'message'=>$message,
        'data'=>$data,
    ],$statusCode);
}
