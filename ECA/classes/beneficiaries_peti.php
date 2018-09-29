<?php
/**
 * Created by PhpStorm.
 * User: arthurvalle
 * Date: 28/09/2018
 * Time: 17:43
 */

class beneficiaries_peti
{
    private $id_beneficiaries;
    private $int_ano_mes_ref;
    private $str_uf;
    private $int_cod_siaf;
    private $str_nome_municipio;
    private $str_nis_favorecido;
    private $str_sit_benefic;
    private $int_valor_parcela;
    private $str_nome_favorecido;

    /**
     * beneficiaries_peti constructor.
     * @param $id_beneficiaries
     * @param $int_ano_mes_ref
     * @param $str_uf
     * @param $int_cod_siaf
     * @param $str_nome_municipio
     * @param $str_nis_favorecido
     * @param $str_sit_benefic
     * @param $int_valor_parcela
     * @param $str_nome_favorecido
     */
    public function __construct($id_beneficiaries, $int_ano_mes_ref, $str_uf, $int_cod_siaf, $str_nome_municipio, $str_nis_favorecido, $str_sit_benefic, $int_valor_parcela, $str_nome_favorecido)
    {
        $this->id_beneficiaries = $id_beneficiaries;
        $this->int_ano_mes_ref = $int_ano_mes_ref;
        $this->str_uf = $str_uf;
        $this->int_cod_siaf = $int_cod_siaf;
        $this->str_nome_municipio = $str_nome_municipio;
        $this->str_nis_favorecido = $str_nis_favorecido;
        $this->str_sit_benefic = $str_sit_benefic;
        $this->int_valor_parcela = $int_valor_parcela;
        $this->str_nome_favorecido = $str_nome_favorecido;
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
    public function getStrUf()
    {
        return $this->str_uf;
    }

    /**
     * @param mixed $str_uf
     */
    public function setStrUf($str_uf)
    {
        $this->str_uf = $str_uf;
    }

    /**
     * @return mixed
     */
    public function getIntCodSiaf()
    {
        return $this->int_cod_siaf;
    }

    /**
     * @param mixed $int_cod_siaf
     */
    public function setIntCodSiaf($int_cod_siaf)
    {
        $this->int_cod_siaf = $int_cod_siaf;
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
    public function getStrNisFavorecido()
    {
        return $this->str_nis_favorecido;
    }

    /**
     * @param mixed $str_nis_favorecido
     */
    public function setStrNisFavorecido($str_nis_favorecido)
    {
        $this->str_nis_favorecido = $str_nis_favorecido;
    }

    /**
     * @return mixed
     */
    public function getStrSitBenefic()
    {
        return $this->str_sit_benefic;
    }

    /**
     * @param mixed $str_sit_benefic
     */
    public function setStrSitBenefic($str_sit_benefic)
    {
        $this->str_sit_benefic = $str_sit_benefic;
    }

    /**
     * @return mixed
     */
    public function getIntValorParcela()
    {
        return $this->int_valor_parcela;
    }

    /**
     * @param mixed $int_valor_parcela
     */
    public function setIntValorParcela($int_valor_parcela)
    {
        $this->int_valor_parcela = $int_valor_parcela;
    }

    /**
     * @return mixed
     */
    public function getStrNomeFavorecido()
    {
        return $this->str_nome_favorecido;
    }

    /**
     * @param mixed $str_nome_favorecido
     */
    public function setStrNomeFavorecido($str_nome_favorecido)
    {
        $this->str_nome_favorecido = $str_nome_favorecido;
    }


}