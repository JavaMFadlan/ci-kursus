<?php
 $soal = $latihan['soal'];
 $id = $latihan['id']+1;
 ?>
<div class="bradcam_area breadcam_bg overlay2">
  <div class="container">
      <div class="row">
        <div class="col">
          <h3>Soal</h3>  
        </div>
      </div>
        <div class="card">
          <div class="card-body">
            <div class="jumbotron mx-auto">
              <div class="row">
                <h3 class="text-heading"><?php echo $soal;?></h3>
                </div>
                <form action="<?= base_url('Home/latihan/'.$latihan['id_materi'].'/'.$id);?>" method="post">
                  <div class="form-group">
                    <div class="row">
                      <div class="col">
                        <input type="radio" id="radio_button" onclick="check()" name="pilihan" value="a" > 
                          <label> <?= $latihan['pil_a']?></label> 
                        </div>
                      <div class="col">
                        <input type="radio" id="radio_button" name="pilihan" onclick="check()" value="b">
                          <label> <?= $latihan['pil_b']?></label>
                        </div>
                      </div>

                    <div class="row">
                      <div class="col">
                        <input type="radio" id="radio_button" name="pilihan" onclick="check()" value="c">
                          <label> <?= $latihan['pil_c']?></label>
                        </div>

                      <div class="col">
                        <input type="radio" id="radio_button" name="pilihan" onclick="check()" value="d">
                          <label> <?= $latihan['pil_d']?></label>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="jawaban" value="<?= $latihan['jawaban']?>">
                <input class="btn btn-primary" type="submit" id="submitBtn" value="Selanjutnya" disabled>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
      function check() {
          document.getElementById("submitBtn").disabled = false; 
      }
      </script>
