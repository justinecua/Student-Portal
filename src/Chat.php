<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use MyApp\ChatUserInfo;
require_once '../StudentChatInfo.php';

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $dbconnect;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->dbconnect = new ChatUserInfo();
        echo "Server Started";
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $data = json_decode($msg, true);
        $accID = $data['AccId'];

        $UserInfo = $this->dbconnect->IncludeUserInfo($accID);

        $data['FirstName'] = $UserInfo['FName'];
        $data['StudentProf'] = $UserInfo['ImageProf'];

        date_default_timezone_set('Asia/Manila');
        $data['Time'] = date("h:i A");
        

        foreach ($this->clients as $client) {
           if($from == $client){
                $data['from'] = 'You';
           }
           else{
                $data['from'] = $data['FirstName'];
           }
           $client->send(json_encode($data));
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}