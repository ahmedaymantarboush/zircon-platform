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
    // document.write(test( "{{ asset('videoplayback (1).mp4') }}" , '360'));

    <script>
        // /* [ ['key','value'] ] */
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



    <link rel="stylesheet" href="{{ asset('css/mediaPlayer.css') }}">
    <script src="{{ asset('js/mediaPlayer.js') }}"></script>

</script>
