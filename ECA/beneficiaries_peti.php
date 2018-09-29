<?php
/**
 * Created by PhpStorm.
 * User: arthurvalle
 * Date: 28/09/2018
 * Time: 17:49
 */


require_once "classes/template.php";

require_once "dao/beneficiaries_petiDAO.php";
require_once "classes/beneficiaries_peti.php";

$object = new beneficiaries_petiDAO();

$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();



// Verificar se foi enviando dados via POST

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : null;
    $int_ano_mes_ref = (isset($_POST["int_ano_mes_ref"]) && $_POST["int_ano_mes_ref"] != null) ? $_POST["int_ano_mes_ref"] : null;
    $str_uf = (isset($_POST["str_uf"]) && $_POST["str_uf"] != null) ? $_POST["str_uf"] : NULL;
    $int_cod_siaf = (isset($_POST["int_cod_siaf"]) && $_POST["int_cod_siaf"] != null) ? $_POST["int_cod_siaf"] : "";
    $str_nome_municipio = (isset($_POST["str_nome_municipio"]) && $_POST["str_nome_municipio"] != null) ? $_POST["str_nome_municipio"] : "";
    $str_nis_favorecido = (isset($_POST["str_nis_favorecido"]) && $_POST["str_nis_favorecido"] != null) ? $_POST["str_nis_favorecido"] : "";
    $str_sit_benefic = (isset($_POST["str_sit_benefic"]) && $_POST["str_sit_benefic"] != null) ? $_POST["str_sit_benefic"] : NULL;
    $int_valor_parcela = (isset($_POST["int_valor_parcela"]) && $_POST["int_valor_parcela"] != null) ? $_POST["int_valor_parcela"] : "";
    $str_nome_favorecido = (isset($_POST["str_nome_favorecido"]) && $_POST["str_nome_favorecido"] != null) ? $_POST["str_nome_favorecido"] : NULL;

} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $int_ano_mes_ref = NULL;
    $str_uf = NULL;
    $int_cod_siaf = NULL;
    $str_nome_municipio = NULL;
    $str_nis_favorecido = NULL;
    $str_sit_benefic = NULL;
    $int_valor_parcela = NULL;
    $str_nome_favorecido = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {


    $beneficiaries = new beneficiaries_peti($id, 0, 0,'','','',0,'',0);
    $resultado = $object->atualizar($beneficiaries);

    $int_ano_mes_ref = $resultado->getIntAnoMesRef();
    $str_uf = $resultado->getStrUf();
    $int_cod_siaf = $resultado->getIntCodSiaf();
    $str_nome_municipio = $resultado->getStrNomeMunicipio();
    $str_nis_favorecido = $resultado->getStrNisFavorecido();
    $str_sit_benefic = $resultado->getStrSitBenefic();
    $int_valor_parcela = $resultado->getIntValorParcela();
    $str_nome_favorecido = $resultado->getStrNomeFavorecido();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $int_ano_mes_ref != null && $str_uf != null && $int_cod_siaf!="" && $str_nome_municipio!="" && $str_nis_favorecido!="" && $str_sit_benefic!=null && $int_valor_parcela!=null && $str_nome_favorecido!="") {
    $beneficiaries = new beneficiaries_peti($id, $int_ano_mes_ref, $str_uf, $int_cod_siaf, $str_nome_municipio, $str_nis_favorecido, $str_sit_benefic, $int_valor_parcela, $str_nome_favorecido);
    var_dump($beneficiaries);
    $msg = $object->salvar($beneficiaries);
    $id = null;
    $int_ano_mes_ref = null;
    $str_uf = null;
    $int_cod_siaf = null;
    $str_nome_municipio = null;
    $str_nis_favorecido = null;
    $str_sit_benefic = null;
    $int_valor_parcela = null;
    $str_nome_favorecido = null;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $beneficiaries = new beneficiaries_peti($id, null, null,null,null,null,null,null,null);
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
                        <h4 class='title'>Beneficiários PETI</h4>
                        <p class='category'>List of beneficiaries infant work obliteration of the system</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?act=save&id=" method="POST" name="form1">

                            <input type="hidden" name="id" value="<?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                            ?>"/>
                            ANO/MES(aaaaMM):
                            <input class="form-control" type="text" name="int_ano_mes_ref" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_ano_mes_ref) && ($int_ano_mes_ref != null || $int_ano_mes_ref != null)) ? $int_ano_mes_ref : null;
                            ?>"/>
                            <br/>
                            UF:
                            <input class="form-control" type="text" name="str_uf" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_uf) && ($str_uf != null || $str_uf != null)) ? $str_uf : null;
                            ?>"/>
                            <br/>
                            COD SIAF:
                            <input class="form-control" type="text" name="int_cod_siaf" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_cod_siaf) && ($int_cod_siaf != null || $int_cod_siaf != "")) ? $int_cod_siaf : '';
                            ?>"/>
                            <br/>
                            MUNICIPIO:
                            <input class="form-control" type="text" name="str_nome_municipio" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nome_municipio) && ($str_nome_municipio != null || $str_nome_municipio != "")) ? $str_nome_municipio : '';
                            ?>"/>
                            <br/>
                            NIS:
                            <input class="form-control" type="text" name="str_nis_favorecido" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nis_favorecido) && ($str_nis_favorecido != null || $str_nis_favorecido != "")) ? $str_nis_favorecido : '';
                            ?>"/>
                            <br/>
                            SITUAÇÃO:
                            <input class="form-control" type="text" name="str_sit_benefic" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_sit_benefic) && ($str_sit_benefic != null || $str_sit_benefic != null)) ? $str_sit_benefic : null;
                            ?>"/>
                            <br/>
                            VALOR PARCELA:
                            <input class="form-control" type="text" name="int_valor_parcela" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($int_valor_parcela) && ($int_valor_parcela != null || $int_valor_parcela != "")) ? $int_valor_parcela : '';
                            ?>"/>
                            <br/>
                            NOME:
                            <input class="form-control" type="text" name="str_nome_favorecido" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_nome_favorecido) && ($str_nome_favorecido != null || $str_nome_favorecido != null)) ? $str_nome_favorecido : null;
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
