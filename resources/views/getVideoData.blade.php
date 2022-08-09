{{-- @include('components.videoplayer.player', ['video' => getVideoUrl($_GET['v'])]) --}}
<video  controls width="500">
    @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url )
        <source src="{{$url}}" size="{{intval($quality)}}" type="video/mp4">
    @endforeach
</video>
<audio controls width="500">
    @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url )
        <source src="{{$url}}" type="audio/mp4">
    @endforeach
</audio>

@php
echo "<pre>";
print_r(json_decode(getVideoInfo($_GET['v']), true)['streamingData']['adaptiveFormats']);
echo "</pre>";
@endphp

{{-- {{getVideoUrl($_GET['v'])}} --}}
