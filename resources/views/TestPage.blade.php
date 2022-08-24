<link rel="stylesheet" href="{{ asset('css/mediaPlayer.css') }}">
<script>
    function mediaPlayer(urls) {
        videos = urls.videos
        SOURCES = ""
        Object.entries(videos).forEach(url => {
            SOURCES += `<source src="${url[1]}" size="${url[0].replace('p','')}" type="video/mp4">\n`
        });
        return `
            @include('components.videoplayer.player', [
                'videoSources' => [],
            ])
        `;
    }
</script>
{{-- ////////////////////////////////////////////////////////////////// --}}
<script>
    urls = {
        "videos": {
            "360p": "https://rr3---sn-8vq54voxxb-5atl.googlevideo.com/videoplayback?expire=1661392633&ei=mYIGY5jgBI_1WtC7sIgD&ip=102.189.183.99&id=o-AAdtQIC2UrPGl3FLyglPnhaEmyhlev64xXyNOVTtZOfZ&itag=18&source=youtube&requiressl=yes&mh=9o&mm=31%2C29&mn=sn-8vq54voxxb-5atl%2Csn-hgn7rne7&ms=au%2Crdu&mv=m&mvi=3&pl=22&initcwndbps=172500&spc=lT-Khs9oS1JIseoVMxeMPY5_roizUJw&vprv=1&mime=video%2Fmp4&ns=GmLbhIUrNz1pxfGHzZ21914H&gir=yes&clen=123073908&ratebypass=yes&dur=6446.950&lmt=1645039671266654&mt=1661370545&fvip=1&fexp=24001373%2C24007246&c=WEB&rbqsm=fr&txp=6219222&n=lDx1z8J_R1xRbp&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cspc%2Cvprv%2Cmime%2Cns%2Cgir%2Cclen%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRgIhAPAfM_-Lj6x5U-SxeFhAwaIZhV_mXBGiycvgun0SF3I2AiEAgUeM1fKWbd2a4yknL_wJaswubPCqLqqru2D1Wb-wjzU%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRQIhALh2QmmfBrv83nLAbpi8_wlyTHMcnRDT2NJaUvWnrImQAiB3-yVkkbGoVNHAgbS2bs8_3dcnIeFIrODIwAUUy379xw%3D%3D",
            "720p": "https://rr3---sn-8vq54voxxb-5atl.googlevideo.com/videoplayback?expire=1661392633&ei=mYIGY5jgBI_1WtC7sIgD&ip=102.189.183.99&id=o-AAdtQIC2UrPGl3FLyglPnhaEmyhlev64xXyNOVTtZOfZ&itag=22&source=youtube&requiressl=yes&mh=9o&mm=31%2C29&mn=sn-8vq54voxxb-5atl%2Csn-hgn7rne7&ms=au%2Crdu&mv=m&mvi=3&pl=22&initcwndbps=172500&spc=lT-Khs9oS1JIseoVMxeMPY5_roizUJw&vprv=1&mime=video%2Fmp4&ns=GmLbhIUrNz1pxfGHzZ21914H&cnr=14&ratebypass=yes&dur=6446.950&lmt=1645046444495559&mt=1661370545&fvip=1&fexp=24001373%2C24007246&c=WEB&rbqsm=fr&txp=6211224&n=lDx1z8J_R1xRbp&sparams=expire%2Cei%2Cip%2Cid%2Citag%2Csource%2Crequiressl%2Cspc%2Cvprv%2Cmime%2Cns%2Ccnr%2Cratebypass%2Cdur%2Clmt&sig=AOq0QJ8wRQIgEISdIyoN4yeRvcZjLEKyqG6OgeX8eSdi2tKmdTeZIFMCIQDHpf6U60OghK0Q7Nt0unP_GcR3Del9tidzHj_sBL838Q%3D%3D&lsparams=mh%2Cmm%2Cmn%2Cms%2Cmv%2Cmvi%2Cpl%2Cinitcwndbps&lsig=AG3C_xAwRQIhALh2QmmfBrv83nLAbpi8_wlyTHMcnRDT2NJaUvWnrImQAiB3-yVkkbGoVNHAgbS2bs8_3dcnIeFIrODIwAUUy379xw%3D%3D"
        }
    }
    document.write(mediaPlayer(urls));
</script>
<script src="{{ asset('js/mediaPlayer.js') }}"></script>
