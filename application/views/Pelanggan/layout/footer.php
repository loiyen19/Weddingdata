   <!-- Footer Section Begin -->
   <footer class="footer spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6">
                   <div class="footer__about">
                       <div class="footer__about__logo">
                           <a href="./index.html"><img src="img/logo.png" alt=""></a>
                       </div>
                       <ul>
                           <li>Address: 60-49 Road 11378 New York</li>
                           <li>Phone: +65 11.188.888</li>
                           <li>Email: hello@colorlib.com</li>
                       </ul>
                   </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                   <div class="footer__widget">
                       <h6>Useful Links</h6>
                       <ul>
                           <li><a href="#">About Us</a></li>
                           <li><a href="#">About Our Shop</a></li>
                           <li><a href="#">Secure Shopping</a></li>
                           <li><a href="#">Delivery infomation</a></li>
                           <li><a href="#">Privacy Policy</a></li>
                           <li><a href="#">Our Sitemap</a></li>
                       </ul>

                   </div>
               </div>
               <div class="col-lg-4 col-md-12">
                   <div class="footer__widget">
                       <h6>Join Our Newsletter Now</h6>
                       <p>Get E-mail updates about our latest shop and special offers.</p>
                       <form action="#">
                           <input type="text" placeholder="Enter your mail">
                           <button type="submit" class="site-btn">Subscribe</button>
                       </form>
                       <div class="footer__widget__social">
                           <a href="#"><i class="fa fa-facebook"></i></a>
                           <a href="#"><i class="fa fa-instagram"></i></a>
                           <a href="#"><i class="fa fa-twitter"></i></a>
                           <a href="#"><i class="fa fa-pinterest"></i></a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </footer>
   <!-- Footer Section End -->

   <!-- Js Plugins -->
   <script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.nice-select.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/jquery.slicknav.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/mixitup.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
   <script src="<?php echo base_url('assets/js/main.js') ?>"></script>
   <script>
       $(document).ready(function() {
           $("#urutkan").change(function() {
               let a = $(this).val();
               console.log(a);
           })
       });
   </script>

   <script>
       function copyText(text) {
           // Buat elemen textarea sementara untuk menyalin teks
           var tempInput = document.createElement("textarea");

           // Tempatkan teks yang akan disalin ke dalam textarea
           tempInput.value = text;

           // Sembunyikan textarea dari tampilan pengguna
           tempInput.style = "position: absolute; left: -1000px; top: -1000px";

           // Tambahkan textarea ke dalam dokumen
           document.body.appendChild(tempInput);

           // Pilih teks dalam textarea
           tempInput.select();

           // Salin teks ke clipboard
           document.execCommand("copy");

           // Hapus textarea sementara
           document.body.removeChild(tempInput);

           // Tampilkan pesan sukses atau lakukan tindakan lain jika diperlukan
           alert("Text copied: " + text);
       }
   </script>


   <script>
       // Menghitung sisa waktu pembayaran
       var paymentDeadline = new Date("<?= $payment_deadline ?>").getTime();

       function updateCountdown() {
           var now = new Date().getTime();
           var timeRemaining = paymentDeadline - now;

           var remainingHours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
           var remainingMinutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
           var remainingSeconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

           remainingHours = remainingHours < 10 ? '0' + remainingHours : remainingHours;
           remainingMinutes = remainingMinutes < 10 ? '0' + remainingMinutes : remainingMinutes;
           remainingSeconds = remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds;

           // Menetapkan teks sisa waktu ke elemen dengan ID 'countdown'
           document.getElementById('countdown').innerText = remainingHours + ':' + remainingMinutes + ':' + remainingSeconds;
       }

       // Memanggil fungsi updateCountdown setiap detik
       setInterval(updateCountdown, 1000);

       // Memanggil updateClock agar waktu terupdate saat halaman dimuat
       updateClock();
   </script>

  


   <!-- RateYo! CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
   <!-- RateYo! JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


   <!-- jQuery (diperlukan oleh Bootstrap) -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <!-- Popper.js (diperlukan oleh Bootstrap) -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>

   <!-- Bootstrap JS -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>









   </body>

   </html>