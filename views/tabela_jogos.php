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
                var dataTable = $("#tbJogos");
                var rowNumber = 1; 

                $.each(data, function(i, obj){
  
                    dataTable[0].rows[rowNumber].cells[0].innerHTML = obj.nome_time_casa;
                    dataTable[0].rows[rowNumber].cells[1].innerHTML = obj.gols_time_casa;
                    dataTable[0].rows[rowNumber].cells[3].innerHTML = obj.gols_time_visitante;
                    dataTable[0].rows[rowNumber].cells[4].innerHTML = obj.nome_time_visitante;


                    rowNumber ++;
                    
                    //$('#tbJogos').append('<tr><td>COL1</td><td>COL2</td></tr>');
                    

                	//alert (obj.id_jogo);
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

	<button>Atualizar</button>
    <table id="tbJogos" border="1">
        <thead>
            <th>Time da Casa</th>
            <th></th>
            <th>X</th>
            <th></th>
            <th>Time Visitante</th>
            <th>Eventos</th>
        </thead>
        <tbody>
            <tr>
                <td id="cTime1"></td>
                <td id="cPlacar1"></td>
                <td id="cx"></td>
                <td id="cTime2"></td>
                <td id="cPlacar2"></td>
                <td id="cEvento"></td>
            </tr>
            <tr>
                <td id="cTime1"></td>
                <td id="cPlacar1"></td>
                <td id="cx"></td>
                <td id="cTime2"></td>
                <td id="cPlacar2"></td>
                <td id="cEvento"></td>
            </tr>            
            <tr>
                <td id="cTime1"></td>
                <td id="cPlacar1"></td>
                <td id="cx"></td>
                <td id="cTime2"></td>
                <td id="cPlacar2"></td>
                <td id="cEvento"></td>
            </tr>        
        </tbody>
    </table>
</body>
</html>