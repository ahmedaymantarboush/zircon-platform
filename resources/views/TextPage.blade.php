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
@endphp

{{getVideoUrl($_GET['v'])}} --}}

<form action="http://127.0.0.1:8000/api/search" id="f" method="get">
    @csrf
    <input type="text" id='q' value='الصف' placeholder="Search">
</form>

<button onclick="sendAjax()">Ajax</button>

@if(isset($lectures))
{{$lectures->get()}}
@endif

<script>

function sendAjax(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function (e){
        try{
            console.log(JSON.parse(this.responseText))
        }catch{
            document.write(this.responseText)
        }
    }
    xhttp.open("get", "http://192.168.19.129/api/search");
    form = new FormData()
    form.append('data',JSON.stringify({
        'q':'الصف'
    }))
    xhttp.setRequestHeader('Accept', 'application/json');
    // xhttp.setRequestHeader('Authorization','Bearer 1|k4uR2brj47koTunYKccCstkBTdlP71Sr4QCYDceL')
    // xhttp.setRequestHeader('X-CSRF-TOKEN', window.token.value);
    console.log('sending');
    xhttp.send(JSON.stringify({
    "q":"الصف",
    "filters" : {
        "grades":[],
        "subjects":[],
        "parts":[],
        "users":[],
        "price":{
            "free":true,
            "hasDiscount":false,
            "paid":true
        }
    }
}));
}

    // window.f.onsubmit = function(e) {
    //     e.preventDefault();
    //     window.f.innerHTML+=`
    //         <input type="hidden" id='data' name="data">
    //     `;
    //     window.data.value = JSON.stringify({
    //         "q": window.q.value,
    //         'filters':[]
    //     });
    // }
</script>
