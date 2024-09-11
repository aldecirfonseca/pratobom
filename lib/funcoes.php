<?php
// lib/funcoes.php

class Funcoes
{
    /**
     * subTitulo
     *
     * @param string $acao 
     * @return string
     */
    public function subTitulo($acao): string
    {
        $ret = "";

        if ($acao == "insert") {
            $ret = " - Novo";
        } elseif ($acao == "update") {
            $ret = " - Alteração";
        } elseif ($acao == "delete") {
            $ret = " - Exclusão";
        } elseif ($acao == "view") {
            $ret = " - Visualização";
        }

        return $ret;
    }
}