<form action="../database/clientes/seleciona.php" method="post" class="row">
<br>
    <p>
      <label>
        <input value="pessoaFisica" name='tipoCliente' type="radio" checked />
        <span>Pessoa Física</span>
      </label>
    </p>
    <p>
      <label>
        <input value="pessoaJuridica" name='tipoCliente' type="radio" />
        <span>Pessoa Jurídica</span>
      </label>
    </p>
    <br>
    <input type="submit" value="enviar" class="btn left">
</form>