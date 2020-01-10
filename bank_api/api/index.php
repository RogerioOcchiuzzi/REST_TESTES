<?php

include "model.php";

if(!empty($_GET)){

    $urlArray = explode('/', $_GET['q']);

    if($urlArray[0] == "ver1.0"){

        urlHandler($urlArray);

    }else{

        echo "{ 'Erro' : 'Versão não encontrada' }";
    }

}else{ 

    echo "{ 'Erro' : 'Erro na requizição' }";
}

function urlHandler(array $urlArray){

    switch ($urlArray[1].$urlArray[2]) {

        case 'funcionariopesquisar':

            if($urlArray[3] == "id"){
                               

               if(is_numeric($urlArray[4])){

                    exibirJson(pesquisarId($urlArray[4]));
                    
                }else{

                    echo "{ 'Erro' : 'Id em formato errado' }";
                }
                

            }elseif($urlArray[3] == "nome"){

                exibirJson(pesquisarNome($urlArray[4]));
    
            }else{

                echo "{ 'Erro' : 'Erro na requizição, parametro '$urlArray[3]' não existe' }";
            }
            break;
        case 'funcionariocadastrar':
            
            if(!empty($_POST)){

                exibirJson(cadastrarCliente($_POST));

            }else{

                echo "{ 'Erro' : 'Erro na requizição, parametro POST vazio' }";
            }            

            break;
        case 'funcionarioatualizar':
            
            break;
        case 'funcionariodeletar':
            
            break;
        case 'funcionariotransacoes':
            
            break;
        case 'cliente':
            
            break;
        
        default:
            echo "{ 'Erro' : 'Erro na requizição, parametro '$urlArray[1]/$urlArray[2]' não existe' }";
            break;
    }

}
/* 

http://localhost/Estudos_REST_API/bank_api/api/ver1.0/funcionario/pesquisar/id/7
http://localhost/Estudos_REST_API/bank_api/api/ver1.0/funcionario/pesquisar/nome/paul

 */