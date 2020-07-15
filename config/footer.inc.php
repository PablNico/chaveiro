

<script type="text/javascript" src="../materialize/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="../materialize/js/materialize.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){});
    $('.dropdown-trigger').dropdown();
    $(document).ready(function(){$('select').formSelect();});
    $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true
  });
</script>
<?php if(isset($_SESSION['autenticado'])):?>
  <footer class="page-footer blue">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">Chaveiro Pão de açucar</h5>
                  <p class="grey-text text-lighten-4">
                    Av. Brasil, 3075 - Av. Brasil, 3660 <br>
                    Balneário Camboriú, SC - Brasil <br>
                    chaveiropaodeacucar24hs@hotmail.com</p>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h5 class="white-text">Links úteis</h5>
                  <ul>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-users" aria-hidden="true"></i> Sobre nós</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-commenting" aria-hidden="true"></i> Fale conosco</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-facebook"></i> Facebook</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!"><i class="fa fa-instagram"></i> Instagram</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              © Chaveiro Pão de açucar
              <a class="grey-text text-lighten-4 right" href="#!"><small>Design e Desenvolvimento por Pablo Nicolas & <b>Margot Gonçalves</b></small></a>
              </div>
            </div>
          </footer>
<?php endif;?>
</body>
</html>