<?PHP
require_once('./v5/connect.php');

$query = "SELECT * FROM `app_list_word` WHERE STATUS = 0 LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$id = $row[0];
$updateQuery = "UPDATE app_list_word SET status = 1 where id = '" . $id . "'";
$word = $row[1];
$title = "Want To know the meaning of '" . $word . "' in Bangla?";
if (mysqli_query($conn, $updateQuery)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

$content = array(
    "en" => $title
);
$hashes_array = array();
$fields = array(
    'app_id' => "95107b58-dabf-4409-b52c-130636d9ec4a",
    'included_segments' => array(
        'Subscribed Users'
    ),
    'data' => array(
        "foo" => "bar"
    ),
    'contents' => $content,
    'web_buttons' => $hashes_array,
    'small_icon' => 'https://www.bdword.com/mobile_logo/bengali.png',
);

$fields = json_encode($fields);
print("\nJSON sent:\n");
print($fields);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charset=utf-8',
    'Authorization: Basic YjZlZjkwN2EtZGE3NC00MTcxLTg4MjAtZDlhMDk0NDhhNWEz'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

$response = curl_exec($ch);
curl_close($ch);

$return["allresponses"] = $response;
$return = json_encode($return);

$data = json_decode($response, true);
print_r($data);
$id = $data['id'];
print_r($id);

print("\n\nJSON received:\n");
print($return);
print("\n");
?>