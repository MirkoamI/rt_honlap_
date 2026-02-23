<style>
    .audio-player {
        position: fixed;
        bottom: 20px;
        left: 20px;
        background: rgba(86, 182, 91, 0.95);
        padding: 8px 15px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 2000;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        color: white;
        max-width: 85vw;
    }

    .audio-player audio {
        height: 30px;
        width: 250px;
    }

    @media (max-width: 600px) {
        .audio-player {
            bottom: 10px;
            left: 10px;
            padding: 5px 10px;
        }
        .audio-player audio {
            width: 180px;
        }
        .audio-player span {
            display: none;
        }
    }
</style>

<div class="audio-player">
    <span style="font-size: 12px; font-weight: bold; margin-left: 10px;">Zene:</span>
    <audio id="bgMusic" controls autoplay loop>
        <source src="zene/ARCOFON.mp3" type="audio/mpeg">
    </audio>
</div>