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
 * Classe principal, ponto de entrada no sistema. Embora esta classe pareça uma
 * redundância da interface DataManager, e consequentemente das suas implementações,
 * é necessária na medida em que permite a utilização dessa interface.
 *
 * //TODO: completar a descrição da classe.
*/
class FeedAggregator {
    /**
     * Objecto que permite acesso à camada de persistência.
     *
     * @var DataManager
     */
    private $manager;

    public function __construct($managerName = 'MySQL') {
        //TODO: 'dataaccess/' . $managerName . 'DataManager.class.php';
        //se existir carregar e instanciar o data manager
    }

    /**
     *
     * @param string $username nome usado na autenticação do utilizador, será o
     * mesmo que o nome visível, poderá ser alterado mais tarde.
     * @param string $password palavra-chave usada pelo utilizar, não codificada.
     * @param string $email endereço de e-mail do utilizador. A string será
     * validada apenas quanto ao formato.
     * @param string $blog endereço do blog do utilizador. A string será validada
     * apenas quanto ao formato.
     * @param date $birth data de nascimento do utilizador.
     * @param string $interests interesses do utilizador.
     */
    public function registerUser($username, $password, $email, $blog, $birth,
        $interests) {

        if($this->manager->findUserByUsername($username) == NULL &&
            $this->manager->findUserByEmail($email) == NULL) {

            $id = $this->manager->getValidUserId();
            $saltyPassword = '';//TODO: gerar MD5? da password
            $user = new User($id, $username, $username, $email, $blog, $birth, $interests);
            $this->manager->storeUser($user, $saltyPassword);
            //TODO: processar acções relacionadas com a adição de um novo utilizador
        } else {
            //TODO: lançar excepção/erro
        }
    }

    /**
     * Remove um utilizador do sistema.
     *
     * @param User $user utilizador a remover.
     */
    public function removeUser(User $user) {
        if($user != NULL) {
            $this->manager->deleteUser($user);
        }
    }

    /**
     * Permite actualizar os dados de um utilizador.
     *
     * @param User $user utilizador a actualizar.
     */
    public function updateUser(User $user) {
        if($user != NULL) {
            $this->manager->updateUser($user);
        }
    }

    /**
     *
     * @return array
     */
    public function listAllUsers() {
        return $this->manager->listAllUsers();
    }

    /**
     *
     */
    public function listAllActiveUsers() {
        $result = array();
        foreach($this->listAllUsers as $user) {
            if($user->isActive()) {
                $result[] = $user;
            }
        }
        return $result;
    }

    /**
     *
     */
    public function listAllInactiveUsers() {
        $result = array();
        foreach($this->listAllUsers as $user) {
            if(!$user->isActive()) {
                $result[] = $user;
            }
        }
        return $result;
    }

    /**
     *
     */
    public function submitFeed($url) {
        if($this->manager->findFeed($url) == NULL) {

            $id = $this->manager->getValidFeedId();
            $feed = new Feed($id, $url);
            $this->manager->storeFeed($feed);
            //TODO: processar acções relacionadas com a adição de uma nova feed
        } else {
            //TODO: lançar excepção/erro
        }
    }

    /**
     *
     */
    public function removeFeed(Feed $feed) {
        if($feed != NULL) {
            $this->manager->deleteFeed($feed);
        }
    }

    /**
     *
     */
    public function updateFeed(Feed $feed) {
        if($feed != null) {
            $this->manager->updateFeed($feed);
        }
    }

    /**
     *
     */
    public function listAllFeeds() {
        return $this->manager->listAllFeeds();
    }

    /**
     *
     */
    public function listAllActiveFeeds() {
        $result = array();
        foreach($this->listAllFeeds as $feed) {
            if(!$feed->isActive()) {
                $result[] = $feed;
            }
        }
        return $result;
    }

    /**
     *
     */
    public function listAllInactiveFeeds() {
        $result = array();
        foreach($this->listAllFeeds as $feed) {
            if(!$feed->isActive()) {
                $result[] = $feed;
            }
        }
        return $result;
    }

    public function listFeedsByStatus($status) {
        $result = array();
        if($status == Feed::$STATUS_APPROVED || $status == Feed::$STATUS_REJECTED ||
            $status == Feed::$STATUS_PENDING) {

            foreach($this->listAllFeeds as $feed) {
                if($feed->getStatus() == $status) {
                    $result[] = $feed;
                }
            }
            return $result;
        }
    }
}
?>
