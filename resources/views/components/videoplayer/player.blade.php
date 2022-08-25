<div id="video_player">
    <div class="loader"></div>
    <video preload="metadata" id="main-video">
        @if (count($videoSources)):
            @foreach ($videoSources as $quality => $url)
                <source src="{{ $url }}" type="video/mp4">
            @endforeach
        @else
            ${SOURCES}
        @endif
        <track id="track1" label="English" kind="subtitles" src="./How To Get Started With VSCode.vtt" srclang="en">
        <track id="track2" label="Urdu" kind="subtitles" src="./test.vtt" srclang="en">
    </video>
    <p class="caption_text"></p>
    <!-- <div class="thumbnail"></div> -->

    <div class="progressAreaTime">0:00</div>

    <div class="controls">
        <div class="progress-area">
            <canvas class="bufferedBar"></canvas>
            <div class="progress-bar">
                <span></span>
            </div>
        </div>

        <div class="controls-list">
            <div class="controls-left">
                <span class="icon">
                    <i class="material-icons fast-rewind">replay_10</i>
                </span>

                <span class="icon">
                    <i class="material-icons play_pause">play_arrow</i>
                </span>

                <span class="icon">
                    <i class="material-icons fast-forward">forward_10</i>
                </span>

                <span class="icon">
                    <i class="material-icons volume">volume_up</i>

                    <input type="range" min="0" max="100" class="volume_range" />
                </span>

                <div class="timer">
                    <span class="current">0:00</span> /
                    <span class="duration">0:00</span>
                </div>
            </div>

            <div class="controls-right">




                <span class="icon">
                    <i class="material-icons settingsBtn">settings</i>
                </span>

                <span class="icon">
                    <i class="material-icons picture_in_picutre">picture_in_picture_alt</i>
                </span>

                <span class="icon">
                    <i class="material-icons fullscreen">fullscreen</i>
                </span>
            </div>
        </div>
    </div>

    <div id="settings">
        <div data-label="settingHome">
            <ul>
                <li data-label="speed">
                    <span> Speed </span>
                    <span class="material-symbols-outlined icon">
                        arrow_forward_ios
                    </span>
                </li>
                <li data-label="quality">
                    <span> Quality </span>
                    <span class="material-symbols-outlined icon">
                        arrow_forward_ios
                    </span>
                </li>
            </ul>
        </div>
        <div class="playback" data-label="speed" hidden>
            <span>
                <i class="material-symbols-outlined icon back_arrow" data-label="settingHome">
                    arrow_back
                </i>
                <span>Playback Speed </span>
            </span>
            <ul>
                <li data-speed="0.25">0.25</li>

                <li data-speed="0.5">0.5</li>

                <li data-speed="0.75">0.75</li>

                <li data-speed="1" class="active">Normal</li>

                <li data-speed="1.25">1.25</li>

                <li data-speed="1.5">1.5</li>

                <li data-speed="1.75">1.75</li>

                <li data-speed="2">2</li>
            </ul>
        </div>
        <div data-label="quality" hidden>
            <span>
                <i class="material-symbols-outlined icon back_arrow" data-label="settingHome">
                    arrow_back
                </i>
                <span>Playback Quality </span>
            </span>
            <ul>
                <li data-quality="auto" class="active">auto</li>
            </ul>
        </div>
    </div>
    <div id="captions">
        <div class="caption">
            <span>Select Subtitle</span>
            <ul>

            </ul>
        </div>
    </div>
</div>
