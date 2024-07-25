<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tracking_number = $_POST['tracking_number'];

    // Mock data for permit status. Replace this with actual database queries.
    $permit_statuses = array(
        'ABC123' => 'Pending',
        'XYZ789' => 'In Process',
        'LMN456' => 'Completed',
        'JKL321' => 'Ready for Pickup'
    );

    if (array_key_exists($tracking_number, $permit_statuses)) {
        $status = $permit_statuses[$tracking_number];
        echo json_encode(array('status' => 'success', 'message' => $status));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Invalid tracking number.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
