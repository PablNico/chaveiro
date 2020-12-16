$("#btnFuncionario").click(function(e){
    e.preventDefault();
    var searchFuncionario = $("#searchFuncionario").val();

    console.log(searchFuncionario);
    $.ajax(
        {
            url: "../database/usuario/optionFuncionario.php",
            method: "POST",
            data: {searchFuncionario: searchFuncionario},
            dataType: "json",
        }
    )
    .done(function(result)
    {
        optionFuncionario(result);
    });
    
}); 

$("#btnCliente").click(function(e){
    e.preventDefault();
    var searchCliente = $("#searchCliente").val();

    console.log(searchCliente);
    $.ajax(
        {
            url: "../database/clientes/optionCliente.php",
            method: "POST",
            data: {searchCliente: searchCliente},
            dataType: "json",
        }
    )
    .done(function(result)
    {
        optionCliente(result);
    });
    
}); 

function optionFuncionario(result)
{
     var selectFuncionario = document.querySelector('#funcionario');
            while(selectFuncionario.firstChild){
                selectFuncionario.firstChild.remove();
            }
    for(var i = 0; i<result.length; i++)
    {
        retorno = ("<option value=\""+ result[i].id+"\">"+result[i].nome +"</option>");
        $("#funcionario").prepend(retorno);
        $('#funcionario').formSelect()
    }
}

function optionCliente(result)
{
     var selectCliente = document.querySelector('#cliente');
            while(selectCliente.firstChild){
                selectCliente.firstChild.remove();
            }
    for(var i = 0; i<result.length; i++)
    {
        retorno = ("<option value=\""+ result[i].id+"\">"+result[i].nome +"</option>");
        $("#cliente").prepend(retorno);
        $('#cliente').formSelect()
    }
}
