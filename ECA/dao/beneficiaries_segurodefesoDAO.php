<?php
/**
 * Created by PhpStorm.
 * User: arthurvalle
 * Date: 27/09/2018
 * Time: 16:32
 */

require_once "db/connection.php";
require_once "classes/beneficiaries_segurodefeso.php";

class beneficiaries_segurodefesoDAO
{

    public function remover($beneficiaries)
    {
        global $pdo;
        try {
            $statement = $pdo->prepare("DELETE FROM tb_beneficiaries_segurodefeso WHERE id_beneficiaries = :id");
            $statement->bindValue(":id", $beneficiaries->getIdBeneficiaries());
            if ($statement->execute()) {
                return "<script> alert('Registo foi excluído com êxito !'); </script>";
            } else {
                throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function salvar($beneficiaries)
    {
        global $pdo;
        try {
            if ($beneficiaries->getIdBeneficiaries() != "") {
                $statement = $pdo->prepare("UPDATE tb_beneficiaries_segurodefeso SET int_uf=:int_uf, int_cod_municipio=:int_cod_municipio, str_nome_municipio=:str_nome_municipio, str_cpf_favorecido=:str_cpf_favorecido, str_nis_favorecido=:str_nis_favorecido, int_rgp_favorecido=:int_rgp_favorecido, str_nome_favorecido=:str_nome_favorecido, int_valor_parcela=:int_valor_parcela WHERE id_beneficiaries = :id;");
                $statement->bindValue(":id", $beneficiaries->getIdBeneficiaries());
            } else {
                $statement = $pdo->prepare("INSERT INTO tb_beneficiaries_segurodefeso (int_uf, int_cod_municipio, str_nome_municipio, str_cpf_favorecido, str_nis_favorecido, int_rgp_favorecido, str_nome_favorecido, int_valor_parcela) VALUES (:int_uf, :int_cod_municipio, :str_nome_municipio, :str_cpf_favorecido, :str_nis_favorecido, :int_rgp_favorecido, :str_nome_favorecido, :int_valor_parcela)");
            }

            $statement->bindValue(":int_uf", $beneficiaries->getIntUf());
            $statement->bindValue(":int_cod_municipio", $beneficiaries->getIntCodMunicipio());
            $statement->bindValue(":str_nome_municipio", $beneficiaries->getStrNomeMunicipio());
            $statement->bindValue(":str_cpf_favorecido", $beneficiaries->getStrCpfFavorecido());
            $statement->bindValue(":str_nis_favorecido", $beneficiaries->getStrNisFavorecido());
            $statement->bindValue(":int_rgp_favorecido", $beneficiaries->getIntRgpFavorecido());
            $statement->bindValue(":str_nome_favorecido", $beneficiaries->getStrNomeFavorecido());
            $statement->bindValue(":int_valor_parcela", $beneficiaries->getIntValorParcela());

            if ($statement->execute()) {
                if ($statement->rowCount() > 0) {
                    return "<script> alert('Dados cadastrados com sucesso !'); </script>";
                } else {
                    return "<script> alert('Erro ao tentar efetivar cadastro !'); </script>";
                }
            } else {
                throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function atualizar($beneficiaries)
    {
        global $pdo;
        try {
            $statement = $pdo->prepare("SELECT id_beneficiaries, int_uf, int_cod_municipio, str_nome_municipio, str_cpf_favorecido, str_nis_favorecido, int_rgp_favorecido, str_nome_favorecido, int_valor_parcela FROM tb_beneficiaries_segurodefeso WHERE id_beneficiaries = :id");
            $statement->bindValue(":id", $beneficiaries->getIdBeneficiaries());
            if ($statement->execute()) {
                $rs = $statement->fetch(PDO::FETCH_OBJ);

//int_uf, int_cod_municipio, str_nome_municipio, str_cpf_favorecido, str_nis_favorecido, int_rgp_favorecido, str_nome_favorecido, int_valor_parcela

                $beneficiaries->setIdBeneficiaries($rs->id_beneficiaries);
                $beneficiaries->setIntUf($rs->int_uf);
                $beneficiaries->setIntCodMunicipio($rs->int_cod_municipio);
                $beneficiaries->setStrNomeMunicipio($rs->str_nome_municipio);
                $beneficiaries->setStrCpfFavorecido($rs->str_cpf_favorecido);
                $beneficiaries->setStrNisFavorecido($rs->str_nis_favorecido);
                $beneficiaries->setIntRgpFavorecido($rs->int_rgp_favorecido);
                $beneficiaries->setStrNomeFavorecido($rs->str_nome_favorecido);
                $beneficiaries->setIntValorParcela($rs->int_valor_parcela);

                return $beneficiaries;
            } else {
                throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
            }
        } catch (PDOException $erro) {
            return "Erro: " . $erro->getMessage();
        }
    }

    public function tabelapaginada()
    {

        //carrega o banco
        global $pdo;

        //endereço atual da página
        $endereco = $_SERVER ['PHP_SELF'];

        /* Constantes de configuração */
        define('QTDE_REGISTROS', 10);
        define('RANGE_PAGINAS', 2);

        /* Recebe o número da página via parâmetro na URL */
        $pagina_atual = (isset($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;

        /* Calcula a linha inicial da consulta */
        $linha_inicial = ($pagina_atual - 1) * QTDE_REGISTROS;

        /* Instrução de consulta para paginação com MySQL */
        $sql = "SELECT id_beneficiaries, int_uf, int_cod_municipio, str_nome_municipio, str_cpf_favorecido, str_nis_favorecido, int_rgp_favorecido, str_nome_favorecido, int_valor_parcela FROM tb_beneficiaries_segurodefeso LIMIT {$linha_inicial}, " . QTDE_REGISTROS;
        $statement = $pdo->prepare($sql);

        try {
            $statement->execute();
            $dados = $statement->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            var_dump($e);
        }


        /* Conta quantos registos existem na tabela */
        $sqlContador = "SELECT COUNT(*) AS total_registros FROM tb_beneficiaries_segurodefeso";
        $statement = $pdo->prepare($sqlContador);
        $statement->execute();
        $valor = $statement->fetch(PDO::FETCH_OBJ);

        /* Idêntifica a primeira página */
        $primeira_pagina = 1;

        /* Cálcula qual será a última página */
        $ultima_pagina = ceil($valor->total_registros / QTDE_REGISTROS);

        /* Cálcula qual será a página anterior em relação a página atual em exibição */
        $pagina_anterior = ($pagina_atual > 1) ? $pagina_atual - 1 : 0;

        /* Cálcula qual será a pŕoxima página em relação a página atual em exibição */
        $proxima_pagina = ($pagina_atual < $ultima_pagina) ? $pagina_atual + 1 : 0;

        /* Cálcula qual será a página inicial do nosso range */
        $range_inicial = (($pagina_atual - RANGE_PAGINAS) >= 1) ? $pagina_atual - RANGE_PAGINAS : 1;

        /* Cálcula qual será a página final do nosso range */
        $range_final = (($pagina_atual + RANGE_PAGINAS) <= $ultima_pagina) ? $pagina_atual + RANGE_PAGINAS : $ultima_pagina;

        /* Verifica se vai exibir o botão "Primeiro" e "Pŕoximo" */
        $exibir_botao_inicio = ($range_inicial < $pagina_atual) ? 'mostrar' : 'esconder';

        /* Verifica se vai exibir o botão "Anterior" e "Último" */
        $exibir_botao_final = ($range_final > $pagina_atual) ? 'mostrar' : 'esconder';
//id_beneficiaries, int_uf, int_cod_municipio, str_nome_municipio, str_cpf_favorecido, str_nis_favorecido, int_rgp_favorecido, str_nome_favorecido, int_valor_parcela
        if (!empty($dados)):
            echo "
     <table class='table table-striped table-bordered'>
     <thead>
       <tr style='text-transform: uppercase;' class='active'>
        <th style='text-align: center; font-weight: bolder;'>Code</th>
        <th style='text-align: center; font-weight: bolder;'>ID UF</th>
        <th style='text-align: center; font-weight: bolder;'>ID CIDADE</th>
        <th style='text-align: center; font-weight: bolder;'>NOME CIDADE</th>
        <th style='text-align: center; font-weight: bolder;'>CPF</th>
        <th style='text-align: center; font-weight: bolder;'>NIS</th>
        <th style='text-align: center; font-weight: bolder;'>RGP</th>
        <th style='text-align: center; font-weight: bolder;'>NOME</th>
        <th style='text-align: center; font-weight: bolder;'>PARCELA</th>
        <th style='text-align: center; font-weight: bolder;' colspan='2'>Actions</th>
       </tr>
     </thead>
     <tbody>";
            foreach ($dados as $bene):
                echo "<tr>
        <td style='text-align: center'>$bene->id_beneficiaries</td>
        <td style='text-align: center'>$bene->int_uf</td>
        <td style='text-align: center'>$bene->int_cod_municipio</td>
        <td style='text-align: center'>$bene->str_nome_municipio</td>
        <td style='text-align: center'>$bene->str_cpf_favorecido</td>
        <td style='text-align: center'>$bene->str_nis_favorecido</td>
        <td style='text-align: center'>$bene->int_rgp_favorecido</td>
        <td style='text-align: center'>$bene->str_nome_favorecido</td>
        <td style='text-align: center'>$bene->int_valor_parcela</td>
        <td style='text-align: center'><a href='?act=upd&id=$bene->id_beneficiaries' title='Alterar'><i class='ti-reload'></i></a></td>
        <td style='text-align: center'><a href='?act=del&id=$bene->id_beneficiaries' title='Remover'><i class='ti-close'></i></a></td>
       </tr>";
            endforeach;
            echo "
</tbody>
     </table>

    <div class='box-paginacao' style='text-align: center'>
       <a class='box-navegacao  $exibir_botao_inicio' href='$endereco?page=$primeira_pagina' title='Primeira Página'> FIRST  |</a>
       <a class='box-navegacao  $exibir_botao_inicio' href='$endereco?page=$pagina_anterior' title='Página Anterior'> PREVIOUS  |</a>
";

            /* Loop para montar a páginação central com os números */
            for ($i = $range_inicial; $i <= $range_final; $i++):
                $destaque = ($i == $pagina_atual) ? 'destaque' : '';
                echo "<a class='box-numero $destaque' href='$endereco?page=$i'> ( $i ) </a>";
            endfor;

            echo "<a class='box-navegacao $exibir_botao_final' href='$endereco?page=$proxima_pagina' title='Próxima Página'>| NEXT  </a>
                  <a class='box-navegacao $exibir_botao_final' href='$endereco?page=$ultima_pagina'  title='Última Página'>| LAST  </a>
     </div>";
        else:
            echo "<p class='bg-danger'>Nenhum registro foi encontrado!</p>
     ";
        endif;

    }

}