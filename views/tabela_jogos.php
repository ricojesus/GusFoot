<!DOCTYPE html>
<html>
<head>
	<title>GusFoot</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
        $.getJSON("apis/tabela_jogos.php?action=getRodada", function (data){
        	console.log(data);
            if (data.length > 0){
                $.each(data, function(i, obj){

                	alert (obj.id_jogo);
                    //$("#fotomembro").val(obj.foto);
                    //$("#txtCpf").val(obj.cpf);
                    //$("#dtNascimento").val(obj.data_nascimento);
                    //$("#dtBatismo").val(obj.data_batismo);
                    //$("#txtFuncao").val(obj.descricao_cargo);
                    //$("#txtEstadoCivil").val(obj.estado_civil);

                });
            } else {
                alert ('Não encontrou');
            }

        });

  });
});
</script>
<body>

	<button>Send an HTTP GET request to a page and get the result back</button>
</body>
</html>