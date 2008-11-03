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
 * Classe que representa o registo de uma acção de moderação sobre um utilizador por 
 * parte de um moderador.
 * Mantém registo de quem moderou, quando moderou e quem foi o alvo da moderação.
 * Acrescenta também uma mensagem descritiva do processo de moderação.
 * 
 * TODO: NOTE:Esta classe pode passar para uma classe de utilitários que processe este pedido
 */
class LogMessage {

    private $id;
    private $userId;
    private $moderatorId;
    private $message;
    private $date;
    
    public function __construct($id, $userId, $moderatorId, $message, $date) {
        $this->id = $id;
        $this->userId = $userId;
        $this->moderatorId = $moderatorId;
        $this->logMessage = $message;
        $this->date = $date;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getUserId() {
        return $this->userId;
    }
    
    public function getModeratorId() {
        return $this->moderatorId;
    }

    /**
     *
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }
    
    public function getDate() {
        return $this->date;
    }
}
?>
