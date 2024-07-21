<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi Pemutar Audio Java</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }

        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="mb-4">Dokumentasi Pemutar Audio Java</h1>

        <div class="card mb-4">
            <div class="card-header">
                <h2>Pengenalan</h2>
            </div>
            <div class="card-body">
                <p>Dokumen ini memberikan panduan langkah demi langkah tentang cara membuat dan menjalankan program Java yang memutar file audio WAV menggunakan paket <code>javax.sound.sampled</code>.</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h2>Persyaratan</h2>
            </div>
            <div class="card-body">
                <ul>
                    <li>Java Development Kit (JDK) terinstal</li>
                    <li>Sebuah file WAV untuk diputar</li>
                    <li>Pengetahuan dasar tentang pemrograman Java</li>
                </ul>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h2>Kode Java</h2>
            </div>
            <div class="card-body">
                <p>Berikut adalah kode Java untuk memutar file WAV:</p>
                <pre><code class="language-java">import javax.sound.sampled.*;
import java.io.File;
import java.io.IOException;

public class AudioPlayer {
    
    public static void main(String[] args) {
        // Path ke file WAV
        String filePath = "path/to/your/audiofile.wav";
        
        // Panggil metode untuk memainkan audio
        playAudio(filePath);
    }

    public static void playAudio(String filePath) {
        try {
            // Buat file dan AudioInputStream
            File audioFile = new File(filePath);
            AudioInputStream audioStream = AudioSystem.getAudioInputStream(audioFile);
            
            // Dapatkan format audio dan data line info
            AudioFormat format = audioStream.getFormat();
            DataLine.Info info = new DataLine.Info(Clip.class, format);
            
            // Buat clip dan buka audio stream
            Clip audioClip = (Clip) AudioSystem.getLine(info);
            audioClip.open(audioStream);
            
            // Mainkan audio
            audioClip.start();
            
            // Tunggu sampai audio selesai diputar
            while (!audioClip.isRunning())
                Thread.sleep(10);
            while (audioClip.isRunning())
                Thread.sleep(10);
            
            // Tutup resources
            audioClip.close();
            audioStream.close();
            
        } catch (UnsupportedAudioFileException e) {
            System.out.println("File audio tidak didukung.");
            e.printStackTrace();
        } catch (IOException e) {
            System.out.println("Kesalahan saat memutar file audio.");
            e.printStackTrace();
        } catch (LineUnavailableException e) {
            System.out.println("Line audio tidak tersedia.");
            e.printStackTrace();
        } catch (InterruptedException e) {
            System.out.println("Pemutaran terganggu.");
            e.printStackTrace();
        }
    }
}
            </code></pre>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h2>Langkah-langkah Menjalankan Program</h2>
            </div>
            <div class="card-body">
                <ol>
                    <li>Simpan kode di atas dalam file bernama <code>AudioPlayer.java</code>.</li>
                    <li>Buka terminal atau command prompt.</li>
                    <li>Navigate ke direktori di mana file <code>AudioPlayer.java</code> disimpan.</li>
                    <li>Kompilasi program Java menggunakan perintah berikut:
                        <pre><code class="language-bash">javac AudioPlayer.java</code></pre>
                    </li>
                    <li>Jalankan program Java yang telah dikompilasi menggunakan perintah berikut:
                        <pre><code class="language-bash">java AudioPlayer</code></pre>
                    </li>
                    <li>Pastikan path ke file WAV sudah benar dalam kode.</li>
                </ol>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h2>Memecahkan Masalah</h2>
            </div>
            <div class="card-body">
                <p>Jika Anda mengalami masalah, periksa hal-hal berikut:</p>
                <ul>
                    <li>Pastikan path file WAV benar dan file tersebut ada.</li>
                    <li>Periksa apakah ada kesalahan ketik dalam kode.</li>
                    <li>Pastikan Anda memiliki izin yang diperlukan untuk membaca file WAV.</li>
                    <li>Lihat pesan kesalahan yang dicetak di konsol untuk petunjuk.</li>
                </ul>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h2>Halaman Desain</h2>
            </div>
            <div class="card-body">
                <p>Desain berupa :</p>
                <ul>
                    <li><img src="<?= base_url('assets/focus/images/desain.png') ?>" style="height: 200px" alt=""></li>
                    <li>Pastikan nama variable sama dengan yang berada di Source Code</li>
                </ul>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <h2>Hasil Output</h2>
            </div>
            <div class="card-body">
                <p>Output berupa :</p>
                <ul>
                    <li><img src="<?= base_url('assets/focus/images/abang.png') ?>" style="height:200px" alt=""></li>
                </ul>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>