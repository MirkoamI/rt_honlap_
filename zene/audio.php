<style>
    .audio-player {
        position: fixed;
        bottom: 20px;
        left: 20px;
        background: rgba(86, 182, 91, 0.9);
        padding: 10px;
        border-radius: 50px;
        display: flex;
        align-items: center;
        gap: 10px;
        z-index: 2000;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        color: white;
    }

    .audio-player audio {
        height: 30px;
        width: 300px;
    }
</style>

<div class="audio-player">
    <span style="font-size: 12px; font-weight: bold; margin-left: 10px;">Zene:</span>
    <audio id="bgMusic" controls autoplay loop>
        <source src="zene/ARCOFON.mp3" type="audio/mpeg">
    </audio>
</div>