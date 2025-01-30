<?php
session_start();
include 'partials/header.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta STMIK Kaputama</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: var(--color-gray-200);
            background-color: #000;
            font-family: 'Montserrat', sans-serif;

        }

        .map-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 100px;
            margin-bottom: 3vh;
        }

        .layout1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.15);
            padding: 40px;


        }

        .layout2 {
            display: flex;
            align-items: center;
            width: 70%;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            height: 80vh;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(79, 186, 210, 0.3);

        }

        .layout3 {
            display: flex;
            flex-direction: column;
            width: 25%;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            margin-right: 10px;
            box-shadow: 0px 4px 10px rgba(79, 186, 210, 0.3);
        }

        .layout3 h4 {
            text-align: center;
            margin-bottom: 10px;
        }




        button {
            background-color: transparent;
            border: none;
            outline: none;
            cursor: pointer;
            color: #ddd;
            font-size: 2em;
        }


        .time {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #fff;
            width: 50%;
            margin: 0 auto;
        }


        .playlist1 {
            text-align: start;
            font-size: 10px;
            background-color: #FF4900;
            color: #fff;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .playlist2 {
            text-align: start;
            font-size: 10px;
            background-color: #FF4900;
            color: #fff;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .playlist a {
            text-decoration: none;
            color: white;
            font-size: 2em;
        }

        .audioPlayer {
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            margin-bottom: 10px;

        }

        .progress-container {
            position: relative;
            width: 50%;
            margin: 0 auto;
        }

        progress {
            width: 100%;
            /* Pastikan progress bar mengambil lebar penuh dari kontainer */
            height: 5px;
            border-radius: 50px;
            background-color: #ddd;
            overflow: hidden;

        }

        .progress-circle {
            position: absolute;
            width: 15px;
            /* Ukuran bulatan */
            height: 15px;
            /* Ukuran bulatan */
            background-color: #FF4900;
            /* Warna bulatan */
            border-radius: 50%;
            /* Membuat bulatan */
            top: 8px;
            /* Posisi vertikal bulatan, sesuaikan jika perlu */
            left: -7px;
            transition: left 0.1s;
            /* Animasi saat bergerak */
            pointer-events: none;
            /* Agar bulatan tidak menghalangi interaksi dengan progress bar */

        }

        progress::-webkit-progress-value {
            background-color: #FF4900;
            /* Warna progress */
            border-radius: 5px;
        }

        progress::-moz-progress-bar {
            background-color: #FF4900;
            /* Warna progress */
            border-radius: 5px;
        }

        @media screen and (max-width: 1024px) {
            h1 {
                font-size: 3em;
            }
        }

        /* Media Query untuk layar kecil */
        @media screen and (max-width: 600px) {
            .map-container {
                flex-direction: column;
            }

            .layout2,
            .layout3 {
                width: 100%;
                margin-bottom: 20px;
            }


            .layout3 {
                margin-bottom: 0;
            }
        }

        #lyrics {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 100%;
            height: 100%;
            overflow-y: auto;
            color: #ddd;
        }

        .lyric {
            opacity: 1;
            margin-bottom: 10px;
            line-height: 1.5;
            font-size: 2em;
            white-space: pre-wrap;
            transition: opacity 1s ease;
            color: #ddd;
        }

        @keyframes moveUp {
            0% {
                transform: translateY(100%);
                opacity: 1;
            }

            80% {
                transform: translateY(0%);
                opacity: 1;
            }

            100% {
                transform: translateY(-100%);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="map-container">
        <!-- Layouts and other components -->
        <div class="layout3">
            <h4>PlayList</h4>
            <div class="playlist1">
                <button onclick="playSong(0)">Hymne Kaputama</button>
            </div>
            <div class="playlist2">
                <button onclick="playSong(1)">Mars Kaputama</button>
            </div>
        </div>
        <div class="layout2">
            <div id="lyrics" style="display: none;">LIRIK</div>
        </div>


    </div>

    <audio id="audioPlayer" style="display: none;">
        <source id="audioSource" src="" type="audio/mp3">
    </audio>

    <div class="audioPlayer">
        <button onclick="playPrev()" class="prev"><i class='bx bx-skip-previous-circle'></i></button>
        <button onclick="playPause()" class="play-pause"><i id="playIcon" class='bx bx-play-circle'></i></button>
        <button onclick="playNext()" class="next"><i class='bx bx-skip-next-circle'></i></button>

        <div class="progress-container">
            <progress id="audioProgress" value="0" max="100"></progress>
            <div id="progressCircle" class="progress-circle"></div>
        </div>
        <div class="time">
            <span id="currentTime">00:00</span>
            <span id="duration">00:00</span>
        </div>

        <div class="bt-text">
            <button id="toggleLyricsButton"><i class='bx bx-text'></i></button>
        </div>
    </div>

    <script>
        const songs = [{
                src: 'audio/HymneKaputama.mp3', // Ganti dengan path yang benar
                lyrics: [
                    // Lirik untuk Hymne Kaputama
                ]
            },
            {
                src: 'audio/MarsKaputama.mp3',
                lyrics: [{
                        time: 0,
                        text: '..'
                    },
                    {
                        time: 10,
                        text: '...'
                    },
                    {
                        time: 26,
                        text: 'STMIK Kaputama\n'
                    },
                    {
                        time: 31,
                        text: 'Berdiri tegak di Kota Binjai'
                    },
                    {
                        time: 37,
                        text: 'Dengan misi manajemen bermutu'
                    },
                    {
                        time: 41,
                        text: 'Dibidang teknologi dan sistem informasi Indonesia'
                    },
                    {
                        time: 47,
                        text: 'STMIK Kaputama\n'
                    },
                    {
                        time: 52,
                        text: 'Tugasmu sungguh amat mulia'
                    },
                    {
                        time: 56,
                        text: 'Mendidik putra putri Indonesia'
                    },
                    {
                        time: 61,
                        text: 'Menjadi berkompeten, intelek dan kreatif berkualitas'
                    },
                    {
                        time: 67,
                        text: 'Berdasarkan Pancasila dan UUD ‘45'
                    },
                    {
                        time: 75,
                        text: 'Tridarma perguruan tinggi pedoman melaksanakan tugasnya'
                    },
                    {
                        time: 84,
                        text: 'STMIK Kaputama\n'
                    },
                    {
                        time: 88,
                        text: 'Be Smart and Successful'
                    },
                    {
                        time: 94,
                        text: 'STMIK Kaputama\n'
                    },
                    {
                        time: 98,
                        text: 'Berkaryalah selama-lamanya'
                    },
                    {
                        time: 120,
                        text: 'STMIK Kaputama\n'
                    },
                    {
                        time: 124,
                        text: 'Berdiri tegak di Kota Binjai'
                    },
                    {
                        time: 128,
                        text: 'Dengan misi manajemen bermutu'
                    },
                    {
                        time: 133,
                        text: 'Dibidang teknologi dan sistem informasi Indonesia'
                    },
                    {
                        time: 139,
                        text: 'STMIK Kaputama\n'
                    },
                    {
                        time: 142,
                        text: 'Tugasmu sungguh amat mulia'
                    },
                    {
                        time: 146,
                        text: 'Mendidik putra putri Indonesia'
                    },
                    {
                        time: 151,
                        text: 'Menjadi berkompeten, intelek dan kreatif berkualitas'
                    },
                    {
                        time: 157,
                        text: 'Berdasarkan Pancasila dan UUD ‘45'
                    },
                    {
                        time: 166,
                        text: 'Tridarma perguruan tinggi pedoman melaksanakan tugasnya'
                    },
                    {
                        time: 176,
                        text: 'STMIK Kaputama\n'
                    },
                    {
                        time: 179,
                        text: 'Be Smart and Successful'
                    },
                    {
                        time: 184,
                        text: 'STMIK Kaputama'
                    },
                    {
                        time: 190,
                        text: 'Berkaryalah selama-lamanya'
                    }
                ]

            }
        ];

        let currentSongIndex = 0;
        const audioPlayer = document.getElementById('audioPlayer');
        const audioProgress = document.getElementById('audioProgress');
        const currentTimeDisplay = document.getElementById('currentTime');
        const durationDisplay = document.getElementById('duration');
        const audioSource = document.getElementById('audioSource');
        const lyricsDisplay = document.getElementById('lyrics');
        const toggleLyricsButton = document.getElementById('toggleLyricsButton');
        let displayedLyrics = [];

        window.onload = function() {
            // Set tombol play secara default
            const playIcon = document.getElementById('playIcon');
            playIcon.classList.remove('bx-pause-circle');
            playIcon.classList.add('bx-play-circle');

            // Memastikan tidak ada lagu yang diputar saat halaman dimuat
            audioPlayer.pause();
            audioPlayer.currentTime = 0; // Reset waktu lagu ke awal
        };

        toggleLyricsButton.addEventListener('click', () => {
            lyricsDisplay.style.display = lyricsDisplay.style.display === 'none' ? 'block' : 'none';
        });

        function playNext() {
            currentSongIndex = (currentSongIndex + 1) % songs.length;
            updateSong();
        }

        function playPrev() {
            currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
            updateSong();
        }

        function playSong(index) {
            currentSongIndex = index;
            updateSong();
        }

        let isPlaying = false;

        function updateSong() {
            audioSource.src = songs[currentSongIndex].src;
            audioPlayer.load(); // Memuat sumber audio baru
            audioPlayer.play(); // Langsung memutar lagu setelah memuatnya
            isPlaying = true; // Menandakan bahwa lagu sedang diputar

            // Ubah ikon tombol play menjadi pause
            const playIcon = document.getElementById('playIcon');
            playIcon.classList.remove('bx-play-circle');
            playIcon.classList.add('bx-pause-circle');

            displayedLyrics = [];
            lyricsDisplay.innerHTML = '';
            displayLyrics();
        }

        audioPlayer.addEventListener('timeupdate', () => {
            const progressPercent = (audioPlayer.currentTime / audioPlayer.duration) * 100;
            audioProgress.value = progressPercent;
            currentTimeDisplay.textContent = formatTime(audioPlayer.currentTime);
            durationDisplay.textContent = formatTime(audioPlayer.duration);
            displayLyrics();

            // Update posisi bulatan
            const progressCircle = document.getElementById('progressCircle');
            const progressWidth = audioProgress.offsetWidth;
            const circlePosition = (progressPercent / 100) * progressWidth;
            progressCircle.style.left = `${circlePosition - (progressCircle.offsetWidth / 2)}px`; // Mengatur posisi bulatan
        });

        audioProgress.addEventListener('click', function(e) {
            const seekTo = e.offsetX / audioProgress.offsetWidth;
            audioPlayer.currentTime = seekTo * audioPlayer.duration;
        });

        function playPause() {
            const playIcon = document.getElementById('playIcon');
            if (audioPlayer.paused) {
                audioPlayer.play();
                isPlaying = true;
                // Ubah ikon tombol menjadi pause
                playIcon.classList.remove('bx-play-circle');
                playIcon.classList.add('bx-pause-circle');
            } else {
                audioPlayer.pause();
                isPlaying = false;
                // Ubah ikon tombol menjadi play
                playIcon.classList.remove('bx-pause-circle');
                playIcon.classList.add('bx-play-circle');
            }
        }

        function formatTime(seconds) {
            const mins = Math.floor(seconds / 60);
            const secs = Math.floor(seconds % 60);
            return `${mins < 10 ? '0' : ''}${mins}:${secs < 10 ? '0' : ''}${secs}`;
        }

        audioPlayer.addEventListener('loadedmetadata', () => {
            durationDisplay.textContent = formatTime(audioPlayer.duration);
        });

        function displayLyrics() {
            let currentLyrics = songs[currentSongIndex].lyrics;
            let currentTime = audioPlayer.currentTime;

            currentLyrics.forEach(lyric => {
                if (lyric.time <= currentTime && !displayedLyrics.includes(lyric.text)) {
                    displayedLyrics.push(lyric.text);
                    const lyricElement = document.createElement('div');
                    lyricElement.classList.add('lyric');
                    lyricElement.innerHTML = lyric.text;
                    lyricsDisplay.appendChild(lyricElement);

                    // Hapus lirik yang sudah ditampilkan jika jumlahnya lebih dari 10
                    if (displayedLyrics.length > 10) {
                        displayedLyrics.shift();
                        lyricsDisplay.removeChild(lyricsDisplay.firstChild);
                    }
                }
            });
        }
    </script>


    <?php
    include 'partials/footer.php';
    ?>
</body>

</html>