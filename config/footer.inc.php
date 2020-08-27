
<!-- Scripts Jquery -->
  <script type="text/javascript" src="../materialize/js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="../materialize/js/materialize.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function(){$('select').formSelect();});
      $('.carousel.carousel-slider').carousel
      ({
        fullWidth: true
      }, setTimeout(autoplay, 4500));
    
      function autoplay() 
      {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 10500);
      }

    M.AutoInit();
    $(document).ready(function() {
          $('select').material_select();
      });
  </script>
<!-- Fim Scripts Jquery -->

<!-- Inicio footer -->
  <?php if(isset($_SESSION['autenticado'])):?>
    <footer class="page-footer blue">
      <!-- Container principal (Contato e social) -->
        <div class="container">
          <div class="row">
              <!-- Infos contato -->
                <div class="col l4 s12">
                  <h5 class="white-text">Chaveiro Pão de açucar</h5>
                  <p class="grey-text text-lighten-4">
                    Av. Brasil, 3075 - Av. Brasil, 3660 <br>
                    Balneário Camboriú, SC - Brasil <br>
                    chaveiropaodeacucar24hs@hotmail.com</p>
                </div>
              <!-- Fim info contato -->

              <!-- Img logo -->
                <div class="col l4 s4">
                  <img src="../img/chaveiro-logo.png">
                </div>
              <!-- fim Img logo -->

              <!-- Links sociais -->
                <div class="col l4 s4">
                  <h5 class="white-text">Links úteis</h5>
                  <ul>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-users" aria-hidden="true"></i> Sobre nós</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-commenting" aria-hidden="true"></i> Fale conosco</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-facebook"></i> Facebook</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-instagram"></i> Instagram</a></li>
                  </ul>
                </div>
              <!-- Fim Links sociais -->

            </div>
        </div>
      <!-- Fim Container principal (Contato e social) -->
     
      <!-- Footer Copyright -->
        <div class="footer-copyright">
          <div class="container">
          © Chaveiro Pão de açucar
          <a class="grey-text text-lighten-4 right" href="#!"><small>Design e Desenvolvimento por <b>Pablo Nicolas</b> & <b>Margot Gonçalves</b></a></small>
          </div>
        </div>
      <!-- Fim Footer Copyright -->

    </footer>
  <?php endif;?>
<!-- Fim footer -->
</body>
</html>