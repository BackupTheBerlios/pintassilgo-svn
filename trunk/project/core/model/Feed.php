<?php
class Feed {

    //TODO: documentação

    public static final $STATUS_APPROVED = 0;
    public static final $STATUS_REJECTED = 1;
    public static final $STATUS_PENDING = 2;

    private $id;
    private $url;
    private $status;

    public function __construct($id, $url) {
        $this->id = $id;
        $this->url = $url;
        $this->active = false;
        $this->status = Feed::$STATUS_PENDING;
    }

    /**
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     *
     * @param string $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        if($status == Feed::$STATUS_APPROVED || $status == Feed::$STATUS_REJECTED ||
            $status == Feed::$STATUS_PENDING) {

            $this->status = $status;
        }
    }

    public function isApproved() {
        return $this->status == Feed::$STATUS_APPROVED;
    }

    public function approve() {
        $this->status = Feed::$STATUS_APPROVED;
    }
}


?>
