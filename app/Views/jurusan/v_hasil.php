<div class="card">
    <div class="card-header bg-success">
        <h3 class="card-title">Hasil Matching Jurusan</h3>
    </div>

    <div class="card-body text-center">
        <p>Berdasarkan jawaban Anda, rekomendasi jurusan adalah:</p>

        <h2 class="text-primary">
            <?= esc($rekomendasi) ?>
        </h2>

        <br>

        <a href="<?= base_url('jurusan/matching') ?>" class="btn btn-primary">
            Ulangi Kuesioner
        </a>
    </div>
</div>
