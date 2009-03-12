<?php

interface Storable {

    /**
     * Método que permite guardar um objecto no sistema de persistência.
     * Se não for fornecido um inteiro para identificar este objecto será da 
     * responsabilidade do sistema de persistência a criação de um identificador.
     *
     * @param integer $id, facultativo, a ser usado para identificar este objecto.
     */
    public function store($id = 0);

    /**
     * Método para remover um objecto do sistema de persistência.
     */
    public function remove();

    /**
     * Permite actualizar os dados deste objecto no sistema de persitência.
     */
    public function update();

    /**
     * Carrega os valores presentes no sistema de persistência para os atributos
     * deste objecto. Se for passado um inteiro, os valores de uma linha cuja
     * seja identificada pelo valor passado, serão carregados.
     *
     * Os valores, a existirem, nos atributos do objecto usado serão descartados.
     *
     * @param $id inteiro, facultativo que identifica o conjunto de dados a
     * a carregar.
     */
    public function load($id = 0);

    /**
     * Permite pesquisar um elemento pelo seu identificador.
     *
     * @param integer $id, identificador a usar na pesquisa
     * @return mixed um objecto do tipo usado na pesquisa.
     */
    public function findById($id);

    /**
     * Permite obter a lista de todos os objectos do tipo usado, presentes no
     * sistema de persistência.
     *
     * @return array com os valores encontrados ou um array vazio caso não existam
     * objectos a mostrar.
     */
    public function findAll();

}

?>
