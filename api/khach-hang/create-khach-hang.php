<?php
// header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

include_once('../../lib/database.php');
include_once('../../helpers/format.php');

$fm = new Format();
$db = new Database();

$data = json_decode(file_get_contents("php://input"), true);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($data)) {
    // Xử lý và chuẩn bị dữ liệu
    $hoten = isset($data['hoten']) ? htmlspecialchars(strip_tags($data['hoten'])) : '';
    
    $sdt = isset($data['sdt']) ? htmlspecialchars(strip_tags($data['sdt'])) : '';
    $trieuchung = isset($data['trieuchung']) ? htmlspecialchars(strip_tags($data['trieuchung'])) : '';
    $ngaykham = isset($data['ngaykham']) ? htmlspecialchars(strip_tags($data['ngaykham'])) : '';
    $giokham = isset($data['giokham']) ? htmlspecialchars(strip_tags($data['giokham'])) : '';
    $nguon = isset($data['url']) ? htmlspecialchars(strip_tags($data['url'])) : '';

    $ngaykham_timestamp = strtotime(str_replace('/', '-', $ngaykham));
    $ngaykham_formatted = date('Y-m-d H:i:s', $ngaykham_timestamp);

    $created_at = $fm->created_at();
    $formatted_date = date('Y-m-d', strtotime($created_at));
    if (!empty($sdt)  && !empty($hoten) && !empty($trieuchung) && !empty($ngaykham) && !empty($giokham)) {
        $check_created = "SELECT * FROM `admin_khachhang` WHERE sdt = '$sdt' AND DATE(created_at) = '$formatted_date'";
        $check_result = $db->select($check_created);
        if ($check_result && $check_result->num_rows > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Số điện thoại này đã được đăng ký trong ngày hôm nay']);
            exit();
        } else {
            
            $sql = "INSERT INTO admin_khachhang (hoten, ngaysinh, sdt, trieuchung,ngaykham,giokham, status, note, ketqua, nguon, user_tuvan, created_at,form) 
                VALUES ('$hoten', '', '$sdt', '$trieuchung','$ngaykham_formatted','$giokham', 0, '', 0, '$nguon', 0, '$created_at', 'đặt lịch khám')";

            $result = $db->insert($sql);

            if ($result) {
                echo json_encode(['status' => 'success', 'message' => 'Cảm ơn quý khách đã để lại thông tin, chúng tôi sẽ liên hệ với khách hàng trong thời sớm nhất!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Lỗi khi lưu dữ liệu']);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Tất cả các trường không được bỏ trống!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Yêu cầu không hợp lệ']);
}
