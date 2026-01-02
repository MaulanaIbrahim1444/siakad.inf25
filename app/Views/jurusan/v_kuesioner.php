<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kuesioner Minat Jurusan</h3>
    </div>

    <div class="card-body">
        <form method="post" action="<?= base_url('jurusan/proses-matching') ?>">
            

            <div class="form-group">
                <label>1. Apa yang lebih Anda sukai?</label><br>
                <input type="radio" name="question1" value="A" onclick="show('q2A')"> Matematika & IPA<br>
                <input type="radio" name="question1" value="B" onclick="show('q2B')"> Sosial & Ekonomi
            </div>

            <div id="q2A" style="display:none">
                <div class="form-group">
                    <label>2. Apakah Anda tertarik dengan teknologi?</label><br>
                    <input type="radio" name="question3A" value="Ya"> Ya<br>
                    <input type="radio" name="question3A" value="Tidak"> Tidak
                </div>
            </div>

            <div id="q2B" style="display:none">
                <div class="form-group">
                    <p>Minat pada bidang sosial & ekonomi</p>
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                Lihat Hasil Matching
            </button>
        </form>
    </div>
</div>

<script>
function show(id) {
    document.querySelectorAll('[id^="q"]').forEach(el => el.style.display = 'none');
    document.getElementById(id).style.display = 'block';
}
</script>
