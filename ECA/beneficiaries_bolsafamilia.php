<?php

require_once "classes/template.php";

require_once "dao/beneficiaries_bolsafamiliaDAO.php";
require_once "classes/beneficiaries_bolsafamilia.php";


$object = new beneficiaries_bolsafamiliaDAO();



$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();


// Verificar se foi enviando dados via POST

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : null;
//    $int_uf = (isset($_POST["int_uf"]) && $_POST["int_uf"] != null) ? $_POST["int_uf"] : null;
    $int_ano_mes_ref = (isset($_POST["int_ano_mes_ref"]) && $_POST["int_ano_mes_ref"] != null) ? $_POST["int_ano_mes_ref"] : NULL;
    $int_ano_mes_comp = (isset($_POST["int_ano_mes_comp"]) && $_POST["int_ano_mes_comp"] != null) ? $_POST["int_ano_mes_comp"] : "";
    $int_uf = (isset($_POST["int_uf"]) && $_POST["int_uf"] != null) ? $_POST["int_uf"] : "";
    $int_cod_municipio = (isset($_POST["int_cod_municipio"]) && $_POST["int_cod_municipio"] != null) ? $_POST["int_cod_municipio"] : "";
    $str_nome_municipio = (isset($_POST["str_nome_municipio"]) && $_POST["str_nome_municipio"] != null) ? $_POST["str_nome_municipio"] : NULL;
    $str_nis_beneficiario = (isset($_POST["str_nis_beneficiario"]) && $_POST["str_nis_beneficiario"] != null) ? $_POST["str_nis_beneficiario"] : "";
    $str_nome_beneficiario = (isset($_POST["str_nome_beneficiario"]) && $_POST["str_nome_beneficiario"] != null) ? $_POST["str_nome_beneficiario"] : NULL;
    $str_data_saque = (isset($_POST["str_data_saque"]) && $_POST["str_data_saque"] != null) ? $_POST["str_data_saque"] : NULL;
    $flt_valor_saque = (isset($_POST["flt_valor_saque"]) && $_POST["flt_valor_saque"] != null) ? $_POST["flt_valor_saque"] : NULL;

} else if (!isset($id)) {

    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $int_ano_mes_ref = NULL;
    $int_ano_mes_comp = NULL;
    $str_nome_municipio = NULL;
    $int_uf = NULL;
    $int_cod_municipio = NULL;
    $str_nome_municipio = NULL;
    $str_nis_beneficiario = NULL;
    $str_data_saque = NULL;
    $flt_valor_saque = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    $beneficiaries = new beneficiaries_bolsafamilia($id, null,null,null,null,null,null,null,null,null);
    $resultado = $object->atualizar($beneficiaries);

//    var_dump($object->atualizar($beneficiaries));

    $int_ano_mes_ref = $resultado->getIntAnoMesRef();
    $int_ano_mes_comp = $resultado->getIntAnoMesComp();
    $int_uf = $resultado->getIntUf();
    $int_cod_municipio = $resultado->getIntCodMunicipio();
    $str_nome_municipio = $resultado->getStrNomeMunicipio();
    $str_nis_beneficiario = $resultado->getStrNisBeneficiario();
    $str_nome_beneficiario = $resultado->getStrNomeBeneficiario();
    $str_data_saque = $resultado->getStrDataSaque();
    $flt_valor_saque = $resultado->getFltValorSaque();
}


//    private $int_ano_mes_ref;
//    private $int_ano_mes_comp;
//    private $int_uf;
//    private $int_cod_municipio;
//    private $str_nome_municipio;
//    private $str_nis_beneficiario;
//    private $str_nome_beneficiario;
//    private $str_data_saque;
//    private $flt_valor_saque;

//                                                      int_ano_mes_ref, int_ano_mes_comp, int_uf, int_cod_municipio, str_nome_municipio, str_nis_beneficiario, str_nome_beneficiario, str_data_saque, flt_valor_saque

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $int_ano_mes_ref != null && $int_ano_mes_comp != null && $int_uf!="" && $int_cod_municipio!=null && $str_nome_municipio!="" && $str_nis_beneficiario!=null && $str_nome_beneficiario!=null && $str_data_saque!="" && $flt_valor_saque != null) {
    $beneficiaries = new beneficiaries_bolsafamilia($id, $int_ano_mes_ref, $int_ano_mes_comp, $int_uf, $int_cod_municipio, $str_nome_municipio, $str_nis_beneficiario, $str_nome_beneficiario, $str_data_saque, $flt_valor_saque);
    $msg = $object->salvar($beneficiaries);
    $id = null;
    $int_ano_mes_ref = null;
    $int_ano_mes_comp = null;
    $int_uf = null;
    $int_cod_municipio = null;
    $str_nome_municipio = null;
    $str_nis_beneficiario = null;
    $str_nome_beneficiario = null;
    $str_data_saque = null;
    $flt_valor_saque = null;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $beneficiaries = new beneficiaries_bolsafamilia($id, null, null,null,null,null,null,null,null, null);
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
                        <h4 class='title'>Beneficiários Bolsa Família</h4>
                        <p class='category'>List of beneficiaries family bag of the system</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?act=save&id=" method="POST" name="form1">

                            <input type="hidden" name="id" value="<?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                            ?>"/>
                            ANO MES REF (AAAAMM):
                            <input class="form-control" type="text" name="int_ano_mes_ref" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_ano_mes_ref) && ($int_ano_mes_ref != null || $int_ano_mes_ref != null)) ? $int_ano_mes_ref : null;
                            ?>"/>
                            <br/>
                            ANO MES COMP (AAAAMM):
                            <input class="form-control" type="text" name="int_ano_mes_comp" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_ano_mes_comp) && ($int_ano_mes_comp != null || $int_ano_mes_comp != null)) ? $int_ano_mes_comp : null;
                            ?>"/>
                            <br/>
                            ID UF:
                            <input class="form-control" type="text" name="int_uf" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_uf) && ($int_uf != null || $int_uf != "")) ? $int_uf : '';
                            ?>"/>
                            <br/>
                            CODIGO MUNICIPIO:
                            <input class="form-control" type="text" name="int_cod_municipio" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_cod_municipio) && ($int_cod_municipio != null || $int_cod_municipio != "")) ? $int_cod_municipio : '';
                            ?>"/>
                            <br/>
                            NOME MUNICIPIO:
                            <input class="form-control" type="text" name="str_nome_municipio" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nome_municipio) && ($str_nome_municipio != null || $str_nome_municipio != "")) ? $str_nome_municipio : '';
                            ?>"/>
                            <br/>
                            NIS BENEFICIARIO:
                            <input class="form-control" type="text" name="str_nis_beneficiario" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nis_beneficiario) && ($str_nis_beneficiario != null || $str_nis_beneficiario != null)) ? $str_nis_beneficiario : null;
                            ?>"/>
                            <br/>
                            NOME DO ELEMENTO:
                            <input class="form-control" type="text" name="str_nome_beneficiario" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nome_beneficiario) && ($str_nome_beneficiario != null || $str_nome_beneficiario != "")) ? $str_nome_beneficiario : '';
                            ?>"/>
                            <br/>
                            DATA DO SAQUE:
                            <input class="form-control" type="text" name="str_data_saque" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_data_saque) && ($str_data_saque != null || $str_data_saque != null)) ? $str_data_saque : null;
                            ?>"/>
                            <br/>
                            VALOR DO SAQUE:
                            <input class="form-control" type="text" name="flt_valor_saque" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($flt_valor_saque) && ($flt_valor_saque != null || $flt_valor_saque != null)) ? $flt_valor_saque : null;
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
