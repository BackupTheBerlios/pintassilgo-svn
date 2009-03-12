<?php
//TODO: completar esta classe
class Proposal extends Model implements Storable {

    const STATUS_APPROVED = 0;
    const STATUS_REJECTED = 1;
    const STATUS_PENDING = 2;

    private $feed;
    private $user;
    private $proposalStatus;
    private $statusMessage;

    /**
     *
     * @param integer $status valor do estado desta submissão, como definido pelas
     * constantes da classe <em>STATUS_APPROVED</em>, <em>STATUS_REJECTED</em>
     * ou <em>STATUS_PENDING</em>
     */
    public function setStatus($status) {
        if($status != Proposal::STATUS_APPROVED ||
            $status != Proposal::STATUS_REJECTED || $status != Proposal::STATUS_PENDING) {
                return;
            }

            $this->proposalStatus = $status;
    }

    public function store($id = 0) {

    }

    public function remove() {

    }

    public function update() {

    }

    public function load($id = 0) {

    }

    public function findById($id) {

    }

    public function findAll() {

    }

?>
