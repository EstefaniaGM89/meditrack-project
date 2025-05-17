<div id="splash" class="splash-screen">
    <img src="{{ asset('images/meditrack-logo.png') }}" alt="MediTrack" class="splash-logo">
    <p class="splash-text">Benvingut/da a MediTrack</p>
</div>

<div class="absolute top-0 left-0 w-full h-full -z-10 overflow-hidden">
    <video autoplay loop muted playsinline class="w-full h-full object-cover">
        <source src="{{ asset('videos/blob.webm') }}" type="video/webm">
        El teu navegador no suporta vídeo HTML5.
    </video>
</div>

<div class="absolute inset-0 bg-black bg-opacity-30 -z-10"></div>
