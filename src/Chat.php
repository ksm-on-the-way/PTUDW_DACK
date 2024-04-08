<?php
namespace MyApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{

    protected $clients;
    private $selectedSeatsData = [];
    public function getSeats()
    {
        return $this->selectedSeatsData;
    }


    public function __construct()
    {
        $this->clients = new \SplObjectStorage;

    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        // Gửi lại dữ liệu selectedSeats cho client mới kết nối
        if (!empty($this->getSeats())) {
            $message = array(
                'event' => 'seat-selected',
                'selectedSeats' => $this->getSeats()
            );

            $conn->send(json_encode($message));
        }
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;
        echo sprintf(
            'Connection %d sending message "%s" to %d other connection%s' . "\n"
            ,
            $from->resourceId,
            $msg,
            $numRecv,
            $numRecv == 1 ? '' : 's'
        );
        $data = json_decode($msg, true);

        if ($data['event'] == 'pick-seat') {

            // Lưu lại selectedSeatsData
            // Thêm các phần tử mới vào mảng $selectedSeatsData
            foreach ($data['selectedSeats'] as $selectedSeat) {
                // Kiểm tra xem phần tử có tồn tại trong selectedSeatsData hay không
                $exists = false;
                foreach ($this->selectedSeatsData as $existingSeat) {
                    if ($existingSeat['id'] === $selectedSeat['id']) {
                        $exists = true;
                        break;
                    }
                }

                // Nếu phần tử không tồn tại, thêm vào mảng
                if (!$exists) {
                    $newSeatData = array(
                        'id' => $selectedSeat['id'],
                        'from' => $from->resourceId // Thêm key 'from' với giá trị là id của client
                    );
                    $this->selectedSeatsData[] = $newSeatData;
                }
            }


            // Gửi lại dữ liệu selectedSeats cho tất cả các client
            $message = array(
                'event' => 'seat-selected',
                'selectedSeats' => $this->getSeats()
            );

            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    $client->send(json_encode($message));
                }
            }
        }
        if ($data['event'] == 'delete-pick-seat') {


            // Lưu lại selectedSeatsData
            // Thêm các phần tử mới vào mảng $selectedSeatsData
            // Tạo một mảng mới để lưu các ghế đã chọn mà không thuộc về người dùng đã đóng kết nối
            $newSelectedSeatsData = [];
            foreach ($this->selectedSeatsData as $selectedSeat) {
                if ($selectedSeat['id'] != $data['seatId']) {
                    $newSelectedSeatsData[] = $selectedSeat;
                }
            }

            // Cập nhật lại selectedSeatsData với mảng mới
            $this->selectedSeatsData = $newSelectedSeatsData;


            // Gửi lại dữ liệu selectedSeats cho tất cả các client
            $message = array(
                'event' => 'seat-selected',
                'selectedSeats' => $this->getSeats()
            );

            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    $client->send(json_encode($message));
                }
            }
        }
        if ($data['event'] == 'delete-all-pick-seat') {


            $newSelectedSeatsData = [];
            foreach ($this->selectedSeatsData as $selectedSeat) {
                $found = false;
                foreach ($data['selectedSeats'] as $dataSelectedSeat) {
                    if ($selectedSeat['id'] == $dataSelectedSeat['id']) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $newSelectedSeatsData[] = $selectedSeat;
                }
            }

            // Cập nhật lại selectedSeatsData với mảng mới
            $this->selectedSeatsData = $newSelectedSeatsData;

            // Gửi lại dữ liệu selectedSeats cho tất cả các client
            $message = array(
                'event' => 'seat-selected',
                'selectedSeats' => $this->getSeats()
            );

            foreach ($this->clients as $client) {
                if ($from !== $client) {
                    $client->send(json_encode($message));
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $closedResourceId = $conn->resourceId;

        // Tạo một mảng mới để lưu các ghế đã chọn mà không thuộc về người dùng đã đóng kết nối
        $newSelectedSeatsData = [];
        foreach ($this->selectedSeatsData as $selectedSeat) {
            if ($selectedSeat['from'] != $closedResourceId) {
                $newSelectedSeatsData[] = $selectedSeat;
            }
        }

        // Cập nhật lại selectedSeatsData với mảng mới
        $this->selectedSeatsData = $newSelectedSeatsData;

        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
        $this->notifySeatSelcetedChange();

    }
    private function notifySeatSelcetedChange()
    {
        $seatSelected = [
            'event' => 'seat-selected',
            'selectedSeats' => $this->getSeats()
        ];

        foreach ($this->clients as $client) {
            $client->send(json_encode($seatSelected));
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}