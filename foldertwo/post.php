<?php
header("Content-Type: application/json"); // JSON Content type за правилно подаване на данните

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['key']) && $_POST['key'] == "0987654321") { // Проверка на метода и аутентикация
    include 'config.php';

    $query = "INSERT INTO space_objects VALUES (NULL, :title, :size, :type, :satellites)"; // Съставпне на INSERT заявка
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":title", $_POST['title']);
    $stmt->bindParam(":size", $_POST['size']);
    $stmt->bindParam(":type", $_POST['type']);
    $stmt->bindParam(":satellites", $_POST['satellites']);

    try{
        $stmt->execute(); // Изпълняване на ISNERT заявката
    }
    catch(Exception $e) { // В случай на грешка - връяаме ststus - error
        echo json_encode(
            [
                'status' => "error",
                'data' => "",
                'mesage' => "Error with the databse.",
            ]
        );
        die();
    }

    $id = $pdo->lastInsertId(); // Ако заявката я изпълнена - взимаме посленото поставено ID

    if(!empty($id)) {
        echo json_encode( // Връщаме изпратените данни, ако посленото поставено ID е различно от 0.
            [
                'status' => "ok",
                'data' => [
                    'title' => $_POST['title'],
                    'size' => $_POST['size'],
                    'type' => $_POST['type'],
                    'satellites' => $_POST['satellites'],
                ],
                'mesage' => "Record successfully added to the database.",
            ]
        );
    }
    else { // В случай, че има някаква грешка, върнатата стойност ще е 0.
        echo json_encode( // В този случай въщаме грешка.
            [
                'status' => "error",
                'data' => '',
                'mesage' => "No records inserted in the database.",
            ]
        );
    }
}
else {
    echo json_encode( // Връщаме грешка, ако метода не е POST или аутентикацията - неуспешна.
        [
            'status' => "error",
            'data' => '',
            'mesage' => "Request method not supproted.",
        ]
    );
}
die();