<?php
header("Content-Type: application/json"); // JSON Content type за правилно подаване на данните

$data = 
[
    'status' => "",
    'data' => "",
    'mesage' => "",
]; // Дефиниране структурата на масива с данни.

if($_SERVER['REQUEST_METHOD'] == 'GET') { // Проверка на HTTP метода.
    include 'config.php';
    
    $query = "SELECT * FROM space_objects"; // Конструоране на SELECT заявка.
    $stmt = $pdo->query($query); // Изпълнение на заявката.
    $result = $stmt->fetchAll(); // Взимане на резултати.

    $data['status'] = 'ok';
    $data['data'] = $result; // Задаване на резултатите в data масива.

    if(count($result) > 0) { // Ако има получени резултати - задаваме подхядящо съобщение.
        $data['mesage'] = count($result) . " rows fetched.";
    }
    else { // Ако няма - още по-подходящо.
        $data['mesage'] = 'No records found.';
    }
}
else { // Ако метода не е GET - грешка.
    $data['status'] = 'error';
    $data['mesage'] = 'Request method not supproted.';
}

echo json_encode($data);
die();