<?php
/**
 * Copyright (C) 2008  P@P DevTeam
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * The P@P DevTeam can be reached at
 */

/**
 * A interface DataManager fornece um contracto de acesso a dados, definindo os
 * métodos necessários para persistir e carregar os diferentes objectos.
 * Implementações desta interface devem providenciar o código necessário para
 * aceder aos dados de forma dependente do sistema de persistência que usam.
 */
interface DataManager {

    //TODO: verificar a necessidade de uma função para remover dados pelo ID
    //TODO: rever documentação, especialmente descrições de parâmetros e dados de retorno
    //TODO: verificar a API

    /**
     * Permite obter um ID válida a ser usado na criação de um utilizador, o ID
     * deve ser válido no sentido em que não pode representar um ID em utilização.
     *
     * A estratégia de criação do ID é deixada à escolha da implementação, podendo
     * assim ser usados quaisquer formas de optimicar a persistência dos dados.
     *
     * @return int ID válido a usar na criação de um utilizador.
     */
    public function getValidUserId();

    /**
     * Permite guardar um utilizar.
     * Qualquer verificação quanto a dados duplicados deverá ser feita pela função
     * que invocar esta.
     *
     * Implementações desta função terão de ser preocupar, mesmo assim, em lidar com
     * dados duplicados indevidamente e deverão manter-se robustas quanto a falhas
     * provocadas por chamdas inválidas.
     * 
     * @param User $user utilizador a guardar.
     * @param string $password palavra-chave correspondente ao novo utilizador
     */
    public function storeUser(User $user, $password);
    
    /**
     * Permite obter os dados de um utilizador
     * @param User $id identificador do utilizador a procurar.
     * @return User o utilizador correspondente ao ID passado ou NULL caso não
     * exista um utilizador com o ID.
     */
    public function loadUser($id);

    /**
     * Permite fazer um update aos dados guardados no sistema de persistência.
     * Compete à implementação de DataManager resolver casos de conflito de
     * informação.
     * 
     * @param User $user utilizador cujos dados devem ser actualizados.
     * @param string $password palavra-chave caso a actualização inclua uma
     * actualização à palavra-chave.
     */
    public function updateUser(User $user, $password = NULL);

    /**
     * Permite remover o utilizador especificado.
     *
     * @param User $user
     */
    public function deleteUser(User $user);

    /**
     * Permite procurar um utilizador através do seu username.
     *
     * @param string $username
     * @return User utilizador encontrado ou NULL.
     */
    public function findUserByUsername($username);

    /**
     * Permite procurar um utilizador pelo seu email de registo.
     * 
     * @param string $email
     * @return User utilizador encontrado ou NULL.
     */
    public function findUserByEmail($email);

    /**
     * Permite obter uma lista completa, ordenada por username, dos utlizadores
     * registados no sistema, quer esteja activos ou não.
     *
     * @return array
     */
    public function listAllUsers();

    /**
     * Permite guardar mensagens de moderação.
     * 
     * @param LogMessage $message mensagem a guardar
     */
    public function storeLogMessage(LogMessage $message);

    /**
     *
     * @param int $id
     */
    public function loadLogMessage($id);

    /**
     *
     * @param LoMessage $message
     */
    public function deleteLogMessage(LogMessage $message);

    public function listAllLogMessages();

    public function getValidFeedId();

    public function storeFeed();

    public function loadFeed($id);

    public function updateFeed(Feed $feed);

    public function deleteFeed(Feed $feed);

    public function findFeed($url);

    public function listAllFeeds();
}
?>
