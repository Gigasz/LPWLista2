<?php
/**
 * Created by PhpStorm.
 * User: arthurvalle
 * Date: 27/09/2018
 * Time: 20:10
 */

class beneficiaries_bolsafamilia {

    private $id_beneficiaries;
    private $int_ano_mes_ref;
    private $int_ano_mes_comp;
    private $int_uf;
    private $int_cod_municipio;
    private $str_nome_municipio;
    private $str_nis_beneficiario;
    private $str_nome_beneficiario;
    private $str_data_saque;
    private $flt_valor_saque;

    /**
     * beneficiaries_bolsafamilia constructor.
     * @param $id_beneficiaries
     * @param $int_ano_mes_ref
     * @param $int_ano_mes_comp
     * @param $int_uf
     * @param $int_cod_municipio
     * @param $str_nome_municipio
     * @param $str_nis_beneficiario
     * @param $str_nome_beneficiario
     * @param $str_data_saque
     * @param $flt_valor_saque
     */
    public function __construct($id_beneficiaries, $int_ano_mes_ref, $int_ano_mes_comp, $int_uf, $int_cod_municipio, $str_nome_municipio, $str_nis_beneficiario, $str_nome_beneficiario, $str_data_saque, $flt_valor_saque)
    {
        $this->id_beneficiaries = $id_beneficiaries;
        $this->int_ano_mes_ref = $int_ano_mes_ref;
        $this->int_ano_mes_comp = $int_ano_mes_comp;
        $this->int_uf = $int_uf;
        $this->int_cod_municipio = $int_cod_municipio;
        $this->str_nome_municipio = $str_nome_municipio;
        $this->str_nis_beneficiario = $str_nis_beneficiario;
        $this->str_nome_beneficiario = $str_nome_beneficiario;
        $this->str_data_saque = $str_data_saque;
        $this->flt_valor_saque = $flt_valor_saque;
    }

    /**
     * @return mixed
     */
    public function getIdBeneficiaries()
    {
        return $this->id_beneficiaries;
    }

    /**
     * @param mixed $id_beneficiaries
     */
    public function setIdBeneficiaries($id_beneficiaries)
    {
        $this->id_beneficiaries = $id_beneficiaries;
    }

    /**
     * @return mixed
     */
    public function getIntAnoMesRef()
    {
        return $this->int_ano_mes_ref;
    }

    /**
     * @param mixed $int_ano_mes_ref
     */
    public function setIntAnoMesRef($int_ano_mes_ref)
    {
        $this->int_ano_mes_ref = $int_ano_mes_ref;
    }

    /**
     * @return mixed
     */
    public function getIntAnoMesComp()
    {
        return $this->int_ano_mes_comp;
    }

    /**
     * @param mixed $int_ano_mes_comp
     */
    public function setIntAnoMesComp($int_ano_mes_comp)
    {
        $this->int_ano_mes_comp = $int_ano_mes_comp;
    }

    /**
     * @return mixed
     */
    public function getIntUf()
    {
        return $this->int_uf;
    }

    /**
     * @param mixed $int_uf
     */
    public function setIntUf($int_uf)
    {
        $this->int_uf = $int_uf;
    }

    /**
     * @return mixed
     */
    public function getIntCodMunicipio()
    {
        return $this->int_cod_municipio;
    }

    /**
     * @param mixed $int_cod_municipio
     */
    public function setIntCodMunicipio($int_cod_municipio)
    {
        $this->int_cod_municipio = $int_cod_municipio;
    }

    /**
     * @return mixed
     */
    public function getStrNomeMunicipio()
    {
        return $this->str_nome_municipio;
    }

    /**
     * @param mixed $str_nome_municipio
     */
    public function setStrNomeMunicipio($str_nome_municipio)
    {
        $this->str_nome_municipio = $str_nome_municipio;
    }

    /**
     * @return mixed
     */
    public function getStrNisBeneficiario()
    {
        return $this->str_nis_beneficiario;
    }

    /**
     * @param mixed $str_nis_beneficiario
     */
    public function setStrNisBeneficiario($str_nis_beneficiario)
    {
        $this->str_nis_beneficiario = $str_nis_beneficiario;
    }

    /**
     * @return mixed
     */
    public function getStrNomeBeneficiario()
    {
        return $this->str_nome_beneficiario;
    }

    /**
     * @param mixed $str_nome_beneficiario
     */
    public function setStrNomeBeneficiario($str_nome_beneficiario)
    {
        $this->str_nome_beneficiario = $str_nome_beneficiario;
    }

    /**
     * @return mixed
     */
    public function getStrDataSaque()
    {
        return $this->str_data_saque;
    }

    /**
     * @param mixed $str_data_saque
     */
    public function setStrDataSaque($str_data_saque)
    {
        $this->str_data_saque = $str_data_saque;
    }

    /**
     * @return mixed
     */
    public function getFltValorSaque()
    {
        return $this->flt_valor_saque;
    }

    /**
     * @param mixed $flt_valor_saque
     */
    public function setFltValorSaque($flt_valor_saque)
    {
        $this->flt_valor_saque = $flt_valor_saque;
    }

}