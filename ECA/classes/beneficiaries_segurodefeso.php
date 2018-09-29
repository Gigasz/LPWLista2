<?php

class beneficiaries_segurodefeso
{
    private $id_beneficiaries;
    private $int_uf;
    private $int_cod_municipio;
    private $str_nome_municipio;
    private $str_cpf_favorecido;
    private $str_nis_favorecido;
    private $int_rgp_favorecido;
    private $str_nome_favorecido;
    private $int_valor_parcela;

    /**
     * beneficiaries constructor.
     * @param $id_beneficiaries
     * @param $int_uf
     * @param $int_cod_municipio
     * @param $str_nome_municipio
     * @param $str_cpf_favorecido
     * @param $str_nis_favorecido
     * @param $int_rgp_favorecido
     * @param $str_nome_favorecido
     * @param $int_valor_parcela
     */
    public function __construct($id_beneficiaries, $int_uf, $int_cod_municipio, $str_nome_municipio, $str_cpf_favorecido, $str_nis_favorecido, $int_rgp_favorecido, $str_nome_favorecido, $int_valor_parcela)
    {
        $this->id_beneficiaries = $id_beneficiaries;
        $this->int_uf = $int_uf;
        $this->int_cod_municipio = $int_cod_municipio;
        $this->str_nome_municipio = $str_nome_municipio;
        $this->str_cpf_favorecido = $str_cpf_favorecido;
        $this->str_nis_favorecido = $str_nis_favorecido;
        $this->int_rgp_favorecido = $int_rgp_favorecido;
        $this->str_nome_favorecido = $str_nome_favorecido;
        $this->int_valor_parcela = $int_valor_parcela;
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
    public function getStrCpfFavorecido()
    {
        return $this->str_cpf_favorecido;
    }

    /**
     * @param mixed $str_cpf_favorecido
     */
    public function setStrCpfFavorecido($str_cpf_favorecido)
    {
        $this->str_cpf_favorecido = $str_cpf_favorecido;
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
    public function getIntRgpFavorecido()
    {
        return $this->int_rgp_favorecido;
    }

    /**
     * @param mixed $int_rgp_favorecido
     */
    public function setIntRgpFavorecido($int_rgp_favorecido)
    {
        $this->int_rgp_favorecido = $int_rgp_favorecido;
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


}