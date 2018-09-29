<?php

require_once "classes/template.php";

require_once "dao/beneficiaries_segurodefesoDAO.php";
require_once "classes/beneficiaries_segurodefeso.php";


$object = new beneficiaries_segurodefesoDAO();



$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();


// Verificar se foi enviando dados via POST

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : null;
    $int_uf = (isset($_POST["int_uf"]) && $_POST["int_uf"] != null) ? $_POST["int_uf"] : null;
    $int_cod_municipio = (isset($_POST["int_cod_municipio"]) && $_POST["int_cod_municipio"] != null) ? $_POST["int_cod_municipio"] : NULL;
    $str_nome_municipio = (isset($_POST["str_nome_municipio"]) && $_POST["str_nome_municipio"] != null) ? $_POST["str_nome_municipio"] : "";
    $str_cpf_favorecido = (isset($_POST["str_cpf_favorecido"]) && $_POST["str_cpf_favorecido"] != null) ? $_POST["str_cpf_favorecido"] : "";
    $str_nis_favorecido = (isset($_POST["str_nis_favorecido"]) && $_POST["str_nis_favorecido"] != null) ? $_POST["str_nis_favorecido"] : "";
    $int_rgp_favorecido = (isset($_POST["int_rgp_favorecido"]) && $_POST["int_rgp_favorecido"] != null) ? $_POST["int_rgp_favorecido"] : NULL;
    $str_nome_favorecido = (isset($_POST["str_nome_favorecido"]) && $_POST["str_nome_favorecido"] != null) ? $_POST["str_nome_favorecido"] : "";
    $int_valor_parcela = (isset($_POST["int_valor_parcela"]) && $_POST["int_valor_parcela"] != null) ? $_POST["int_valor_parcela"] : NULL;

} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $int_uf = NULL;
    $int_cod_municipio = NULL;
    $str_nome_municipio = NULL;
    $str_cpf_favorecido = NULL;
    $str_nis_favorecido = NULL;
    $int_rgp_favorecido = NULL;
    $str_nome_favorecido = NULL;
    $int_valor_parcela = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $beneficiaries = new beneficiaries_segurodefeso($id, 0, 0,'','','',0,'',0);
    $resultado = $object->atualizar($beneficiaries);
//    var_dump($object->atualizar($beneficiaries));
    $int_uf = $resultado->getIntUf();
    $int_cod_municipio = $resultado->getIntCodMunicipio();
    $str_nome_municipio = $resultado->getStrNomeMunicipio();
    $str_cpf_favorecido = $resultado->getStrCpfFavorecido();
    $str_nis_favorecido = $resultado->getStrNisFavorecido();
    $int_rgp_favorecido = $resultado->getIntRgpFavorecido();
    $str_nome_favorecido = $resultado->getStrNomeFavorecido();
    $int_valor_parcela = $resultado->getIntValorParcela();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $int_uf != null && $int_cod_municipio != null && $str_nome_municipio!="" && $str_cpf_favorecido!="" && $str_nis_favorecido!="" && $int_rgp_favorecido!=null && $int_valor_parcela!=null && $str_nome_favorecido!="") {
    $beneficiaries = new beneficiaries_segurodefeso($id, $int_uf, $int_cod_municipio, $str_nome_municipio, $str_cpf_favorecido, $str_nis_favorecido, $int_rgp_favorecido, $str_nome_favorecido, $int_valor_parcela);
    $msg = $object->salvar($beneficiaries);
    $id = null;
    $int_uf = null;
    $int_cod_municipio = null;
    $str_nome_municipio = null;
    $str_cpf_favorecido = null;
    $str_nis_favorecido = null;
    $int_rgp_favorecido = null;
    $str_nome_favorecido = null;
    $int_valor_parcela = null;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $beneficiaries = new beneficiaries_segurodefeso($id, null, null,null,null,null,null,null,null);
    $msg = $object->remover($beneficiaries);
    $id = null;
}

?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Beneficiários Seguro Defeso</h4>
                        <p class='category'>List of beneficiaries safe defense of the system</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?act=save&id=" method="POST" name="form1">

                            <input type="hidden" name="id" value="<?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                            ?>"/>
                            ID UF:
                            <input class="form-control" type="text" name="int_uf" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_uf) && ($int_uf != null || $int_uf != null)) ? $int_uf : null;
                            ?>"/>
                            <br/>
                            ID CIDADE:
                            <input class="form-control" type="text" name="int_cod_municipio" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_cod_municipio) && ($int_cod_municipio != null || $int_cod_municipio != null)) ? $int_cod_municipio : null;
                            ?>"/>
                            <br/>
                            NOME CIDADE:
                            <input class="form-control" type="text" name="str_nome_municipio" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nome_municipio) && ($str_nome_municipio != null || $str_nome_municipio != "")) ? $str_nome_municipio : '';
                            ?>"/>
                            <br/>
                            CPF:
                            <input class="form-control" type="text" name="str_cpf_favorecido" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_cpf_favorecido) && ($str_cpf_favorecido != null || $str_cpf_favorecido != "")) ? $str_cpf_favorecido : '';
                            ?>"/>
                            <br/>
                            NIS:
                            <input class="form-control" type="text" name="str_nis_favorecido" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nis_favorecido) && ($str_nis_favorecido != null || $str_nis_favorecido != "")) ? $str_nis_favorecido : '';
                            ?>"/>
                            <br/>
                            RGP:
                            <input class="form-control" type="text" name="int_rgp_favorecido" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_rgp_favorecido) && ($int_rgp_favorecido != null || $int_rgp_favorecido != null)) ? $int_rgp_favorecido : null;
                            ?>"/>
                            <br/>
                            NOME:
                            <input class="form-control" type="text" name="str_nome_favorecido" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nome_favorecido) && ($str_nome_favorecido != null || $str_nome_favorecido != "")) ? $str_nome_favorecido : '';
                            ?>"/>
                            <br/>
                            VALOR PARCELA:
                            <input class="form-control" type="text" name="int_valor_parcela" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_valor_parcela) && ($int_valor_parcela != null || $int_valor_parcela != null)) ? $int_valor_parcela : null;
                            ?>"/>
                            <br/>
                            <input class="btn btn-success" type="submit" value="REGISTER">
                            <hr>
                        </form>


                        <?php
                        echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';
                        //chamada a paginação
                        $object->tabelapaginada();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$template->footer();
?>
