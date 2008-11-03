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
 * Classe que representa um utilizador do sistema.
 * Esta classe não guarda a password do utilizador.
 */
class User {

    //TODO: definir correctamente os dados a manter em memória
    //TODO: documentação
    
    private $id;
    private $username;
    //TODO: NOTE: A password de um utilizador é necessária em casos muito especificos, não será dessa forma,
    //importante guardar a password no objecto.
    //private $password;
    private $name;
    private $email;
    private $blog;
    private $birth;
    private $interests;
    //verdadeiro se o utilizador possuir estatuto de moderador
    private $moderator;
    //verdadeiro se o utilizador é o admin, utilizador especial
    private $admin;
    private $active;
    
    public function __construct($id, $username, $name, $email, $blog, $birth,
            $interests, $admin = false, $moderator = false) {
        $this->id = $id;
        $this->username = $username;
        $this->name = $name;
        $this->email = $email;
        $this->blog = $blog;
        $this->birth = $birth;
        $this->interests = $interests;
        $this->moderator = $moderator;
        $this->admin = $admin;
    }
    
    /**
     * Permite obter o ID deste objecto correspondente ao sistema de persistência.
     * Este valor é apenas de leitura sendo atribuido pelo processo de obtenção do 
     * objecto.
     *
     * @return o ID definido para o objecto pelo sistema de persitência
     */
    public function getId() {
        return $this->id;
    }

    /**
     *
     * @return <type>
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     *
     * @param <type> $username
     */
    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     *
     * @return <type> 
     */
    public function getName() {
        return $this->name;
    }

    /**
     *
     * @param <type> $name 
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     *
     * @return <type> 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     *
     * @param <type> $email 
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     *
     * @return <type> 
     */
    public function getBlog() {
        return $this->blog;
    }

    /**
     *
     * @param <type> $url
     */
    public function setBlog($url) {
        $this->blog = $url;
    }

    /**
     *
     * @return <type>
     */
    public function getBith() {
        return $this->birth;
    }
    
    /**
     *
     * @param <type> $date
     */
    public function setBith($date) {
        $this->birth = $date;
    }

    /**
     *
     * @return <type>
     */
    public function getInterests() {
        return $this->interests;
    }

    /**
     *
     * @param <type> $interests
     */
    public function setInterests($interests) {
        $this->interests = $interests;
    }

    /**
     *
     * @return <type>
     */
    public function isModerator() {
        return $this->moderator;
    }

    /**
     *
     * @param boole $aFlag
     */
    public function setModerator($aFlag) {
        $this->moderator = $aFlag;
    }

    /**
     *
     * @return bool TRUE caso este seja o utilizador especial administrador.
     */
    public function isAdmin() {
        return $this->admin;
    }

    /**
     *
     * @return bool TRUE caso o utilizar já tenha sido aprovado, FALSE caso contrário.
     */
    public function isActive() {
        return $this->active;
    }

    /**
     * Marca um utilizador como aprovado.
     */
    public function approve() {
        $this->active = TRUE;
    }
}
?>
