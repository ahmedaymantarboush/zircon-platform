{{-- @php

class YouTubeDownloader
{
    /**
     * Get the YouTube code from a video URL
     * @param $url
     * @return mixed
     */
    public function getYouTubeCode($url)
    {
        parse_str(parse_url($url, PHP_URL_QUERY), $vars);
        return $vars['v'];
    }

    /**
     * Process the video url and return details of the video
     * @param $vid
     * @return array|void
     */

    public function processVideo($vid)
    {
        // parse_str(file_get_contents('https://youtube.com/get_video_info?video_id=' . $vid), $info);
        parse_str(file_get_contents('https://www.youtube.com/watch?v=M9wmZ4Lcskk'), $info);

        $playabilityJson = json_decode($info['player_response']);
        $formats = $playabilityJson->streamingData->formats;
        $adaptiveFormats = $playabilityJson->streamingData->adaptiveFormats;

        //Checking playable or not
        $IsPlayable = $playabilityJson->playabilityStatus->status;

        //writing to log file
        if (strtolower($IsPlayable) != 'ok') {
            $log = date('c') . ' ' . $info['player_response'] . "\n";
            file_put_contents('./video.log', $log, FILE_APPEND);
        }

        $result = [];

        if (!empty($info) && $info['status'] == 'ok' && strtolower($IsPlayable) == 'ok') {
            $i = 0;
            foreach ($adaptiveFormats as $stream) {
                $streamUrl = $stream->url;
                $type = explode(';', $stream->mimeType);

                $qualityLabel = '';
                if (!empty($stream->qualityLabel)) {
                    $qualityLabel = $stream->qualityLabel;
                }

                $videoOptions[$i]['link'] = $streamUrl;
                $videoOptions[$i]['type'] = $type[0];
                $videoOptions[$i]['quality'] = $qualityLabel;
                $i++;
            }
            $j = 0;
            foreach ($formats as $stream) {
                $streamUrl = $stream->url;
                $type = explode(';', $stream->mimeType);

                $qualityLabel = '';
                if (!empty($stream->qualityLabel)) {
                    $qualityLabel = $stream->qualityLabel;
                }

                $videoOptionsOrg[$j]['link'] = $streamUrl;
                $videoOptionsOrg[$j]['type'] = $type[0];
                $videoOptionsOrg[$j]['quality'] = $qualityLabel;
                $j++;
            }
            $result['videos'] = [
                'info' => $info,
                'adapativeFormats' => $videoOptions,
                'formats' => $videoOptionsOrg,
            ];

            return $result;
        } else {
            return;
        }
    }
}
@endphp --}}
{{-- @include('components.videoplayer.player', ['video' => getVideoUrl($_GET['v'])])
<video  controls width="500">
    @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url)
        <source src="{{$url}}" size="{{intval($quality)}}" type="video/mp4">
    @endforeach
</video>
<audio controls width="500">
    @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url)
        <source src="{{$url}}" type="audio/mp4">
    @endforeach
</audio>

@php
echo "<pre>";
print_r(json_decode(getVideoInfo($_GET['v']), true)['streamingData']['adaptiveFormats']);
echo "</pre>";
@endphp --}}
{{-- {{getVideoUrl($_GET['v'])}} --}}
{{-- @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url)
{{$url}} => {{intval($quality)}}<br>
@endforeach --}}
{{-- @php
    echo '<pre>';
        print_r(getVideoUrl($_GET['v'])['video']);
    echo '</pre>';
@endphp --}}

{{-- <iframe width="560" height="315" src="/tt" title="YouTube video player"
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen></iframe> --}}

{{-- <iframe controls src="/tt"></iframe> --}}
{{-- @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url)
{{ $quality }} => <a href="{{ $url }}" target="_blank">open</a><br>
@endforeach --}}

{{-- <video  controls width="500">
    @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url)
        <source src="{{$url}}" size="{{intval($quality)}}" type="video/mp4">
    @endforeach
</video>
<audio controls width="500">
    @foreach (getVideoUrl($_GET['v'])['video'] as $quality => $url)
        <source src="{{$url}}" type="audio/mp4">
    @endforeach
</audio> --}}
{{-- @php
$yt = new YouTubeDownloader();
$downloadLinks = '';
$error = '';
$videoLink = "https://www.youtube.com/watch?v=M9wmZ4Lcskk";
if (!empty($videoLink)) {
    $vid = $yt->getYouTubeCode($videoLink);
    if ($vid) {
        $result = $yt->processVideo($vid);

        if ($result) {
            //print_r($result);
            $info = $result['videos']['info'];
            $formats = $result['videos']['formats'];
            $adapativeFormats = $result['videos']['adapativeFormats'];

            $videoInfo = json_decode($info['player_response']);

            $title = $videoInfo->videoDetails->title;
            $thumbnail = $videoInfo->videoDetails->thumbnail->thumbnails[0]->url;
        } else {
            $error = 'Something went wrong';
        }
    }
} else {
    $error = 'Please enter a YouTube video URL';
}
@endphp --}}
{{-- <iframe width="560" height="315" src="https://www.youtube.com/embed/M9wmZ4Lcskk" title="YouTube video player"
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen></iframe> --}}
{{-- @php
// echo "<pre>";
// print_r();
// echo "</pre>";
    // $videoData = ['audio'=>[],'video'=>[]];
    // foreach (json_decode(getVideoInfo($video_id), true)['streamingData']['adaptiveFormats'] as $format) :
    //     if (str_starts_with($format['mimeType'], 'video/mp4')):
    //         $videoData['video'][$format['qualityLabel']] = $format['url'];
    //     elseif (str_starts_with($format['mimeType'], 'audio/mp4')):
    //         $videoData['audio'][] = $format['url'];
    //     endif;
    // endforeach;
@endphp --}}
{{--
<video width="1500" controls id="vid" height="500" frameborder="0">
    @foreach (getVideoUrl($_GET['v'])['videos'] as $key => $value)
        <source src="{{ $value }}">
    @endforeach
</video>
<script>
    setTimeout(() => {
        document.querySelector('#vid').innerHTML = '';
    }, 100);
</script> --}}

{{-- @include('components.videoplayer.player',['videoSources'=>getVideoUrl($_GET['v'])['videos']]) --}}

{{-- @php
 dd(json_decode(getVideoInfo("Ge4xioJNTV8"),true));
@endphp --}}
