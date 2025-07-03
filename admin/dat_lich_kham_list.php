<?php
ob_start();
include 'inc/header.php';
include '../classes/khach_hang.php';

if (Session::get('role') === '1' || Session::get('role') === '3') {

$khach_hang = new KhachHang();


$message = null;

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $message = $khach_hang->delete_khachHang($id);
    if ($message['status'] == 'success') {
        $_SESSION['message'] = $message;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>


<?php
$endDate = '';
$startDate = '';
$sdt = '';
$limit = 25;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$sdt = isset($_GET['sdt']) ? $_GET['sdt'] : null;
$hoten = isset($_GET['hoten']) ? $_GET['hoten'] : null;
$form = isset($_GET['form']) ? $_GET['form'] : null;
$startDate = isset($_GET['start-date']) ? $_GET['start-date'] : null;
$endDate = isset($_GET['end-date']) ? $_GET['end-date'] : null;

if (($startDate && $startDate !== '') || ($endDate && $endDate !== '') || ($sdt && $sdt !== '') || ($hoten && $hoten !== '' ) || ($form && $form !== ''))  {
    $list_khachhang = $khach_hang->getPaginationLichKhamByNgayKham($limit, $offset, $startDate, $endDate, $sdt, $hoten, $form);
    $total_articles = $khach_hang->getTotalCountByNgayKham($startDate, $endDate, $sdt,$hoten,$form);
    $total_pages = ceil($total_articles / $limit);
} else {
    $list_khachhang = $khach_hang->getPaginationLichKham($limit, $offset);
    $total_articles = $khach_hang->getTotalCount();
    $total_pages = ceil($total_articles / $limit);
}
$getAllSelectKQ = $khach_hang->getAllSelectKQ();
?>

<style>
    .action .action_edit {
        text-decoration: none;
        color: orange;
    }

    .action .action_delete {
        text-decoration: none;
        color: red;
    }

    .action .action_view {
        text-decoration: none;
        color: #01969a;
    }
</style>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Lịch khám</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách người đăng ký khám bệnh</li>
    </ol>
</nav>
<form action="" method="get">
    <div class="row">
        <div class="col-sm-2">
            <label for="">Ngày bắt đầu :</label>
            <div class="form-group form-chat-input">
                <div class="datepicker date input-group">
                    <input value="<?php echo $startDate ?>" style="height: 40px;" name="start-date" type="text" placeholder="Ngày bắt đầu" class="form-control" id="fecha1">
                    <div style="height: 40px; margin-top: 0px; " class="input-group-append">
                        <span style="border-bottom: 2px; height: 40px; border-bottom-left-radius: 0px; border-top-left-radius: 0px  ; " class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label for="">Ngày kết thúc :</label>
            <div class="form-group form-chat-input">
                <div class="datepicker date input-group">
                    <input value="<?php echo $endDate ?>" style="height: 40px;" name="end-date" type="text" placeholder="Ngày kết thúc" class="form-control" id="fecha1">
                    <div style="height: 40px; margin-top: 0px; " class="input-group-append">
                        <span style="border-bottom: 2px; height: 40px; border-bottom-left-radius: 0px; border-top-left-radius: 0px  ; " class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <label for="">Nhấp số điện thoại :</label>
            <div class="input-group mb-3">
                <input value="<?php echo $sdt; ?>" name="sdt" type="number" class="form-control" placeholder="Số điện thoại">
            </div>
           
        </div>
        <div class="col-sm-2" >
            <label for="">Nhập họ và tên :</label>
            <div class="input-group mb-3">
                <input value="<?php echo $hoten; ?>" name="hoten" type="text" class="form-control" placeholder="Nhập họ và tên">
            </div>
        </div>
        <div class="col-sm-1" >
            <label for="">Form :</label>
            <select name="form" class="form-select" aria-label="Default select example">
                <option > </option>
                <?php if($form === 'đặt lịch khám') { ?>
                    <option selected value="đặt lịch khám">Đặt lịch khám</option>
                    <option value="tư vấn">Tư vấn</option>
                <?php } elseif($form === 'tư vấn')  { ?>
                    <option  value="đặt lịch khám">Đặt lịch khám</option>
                    <option selected value="tư vấn">Tư vấn</option>
                <?php } else { ?>
                    <option  value="đặt lịch khám">Đặt lịch khám</option>
                    <option  value="tư vấn">Tư vấn</option>
                    <?php }?>
            </select>
        </div>
        <div class="col-sm-3 mt-4">
            <button type="submit" class="btn btn-success">Tìm kiếm</button>
            <button style="margin-left: 10px;" class="btn btn-warning ">
                <a style="text-decoration: none; color: white;  " href="<?php echo $local ?>/admin/dat_lich_kham_list.php">Clear</a>
            </button>
            <button style="margin-left: 10px;" class="btn btn-info">
                <a style="text-decoration: none; color: white;" href="<?php echo $local ?>/admin/excel/export-dat-lich-kham.php?start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>">Xuất Excel</a>
            </button>
        </div>
    </div>
</form>
<div class="table-responsive" style="padding: 10px 0px;">
    <table style="background-color: #a9c2c3; border-collapse: inherit; border-radius: 10px; " class="table table-striped table-hover">
        <thead>
            <tr style="text-align: center;">
                <th style="border-top-left-radius: 8px; " scope="col">ID</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">Năm sinh</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Triệu chứng</th>
                <th scope="col">Ngày khám</th>
                <th scope="col">Giờ khám</th>
                <th scope="col">Tình trạng</th>

                <th scope="col">Kết quả</th>
               
                <th scope="col">Nguồn URL</th>
                <th scope="col">Người tư vấn</th>
                <th scope="col">Mã hẹn</th>
                <th scope="col">form</th>
                <th style="border-top-right-radius: 8px; " scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody style="border-bottom-right-radius: 8px; ">
            <?php if ($list_khachhang) {
                while ($result = $list_khachhang->fetch_assoc()) {
                    $formatNgaykham;
                    if(is_numeric($result['ngaykham'])){
                        $formatNgaykham = date('Y-m-d H:i:s', $result['ngaykham']);
                    } else {
                        $formatNgaykham = date('Y-m-d', strtotime($result['ngaykham']));
                    }
                    
                   
                    // var_dump()
            ?>
                    <tr style="text-align: center;">
                        <th scope="row"><?php echo $result['id']; ?></th>
                        <td style="min-width: 130px;"><?php echo $result['hoten']; ?></td>
                        <td><?php echo $result['ngaysinh']; ?></td>
                        <td><?php echo $result['sdt']; ?></td>
                        <td style="max-width: 250px;  word-break: break-all; white-space: normal;"><?php echo $result['trieuchung']; ?></td>
                        <td><?php echo $formatNgaykham; ?></td>
                        <td><?php echo $result['giokham']; ?></td>
                        <td style="min-width: 170px;" class="text-center">
                            <?php if ($result['status'] === '0') { ?>
                                <span style=" padding:5px 15px; border-radius:8px;  " class="bg-warning text-dark ">chưa được tư vấn</span>
                            <?php } else { ?>
                                <span style=" padding:5px 15px; border-radius:8px;  " class="bg-success text-white">Đã được tư vấn</span>
                            <?php } ?>
                        </td>
                        <td style="min-width: 160px; ">

                            <?php if ($getAllSelectKQ) : ?>
                                <?php foreach ($getAllSelectKQ as $resultkq) : ?>
                                    <?php if ($resultkq['id'] === $result['ketqua']) : ?>
                                        <span style=" border-radius: 8px; padding: 5px 15px ; background-color: 
                                    <?php
                                        switch ($resultkq['id']) {
                                            case '1':
                                                echo '#ff56ff';
                                                break;
                                            case '2':
                                                echo '#f23535';
                                                break;
                                            case '3':
                                                echo 'black';
                                                break;
                                            case '4':
                                                echo '#1eaa62';
                                                break;
                                            case '5':
                                                echo '#ffcc00';
                                                break;
                                            case '6':
                                                echo '#bf5f00';
                                                break;
                                            case '7':
                                                echo '#cccccc';
                                                break;
                                            default:
                                                echo 'transparent';
                                                break;
                                        }
                                    ?>;
                                    color: <?php
                                            switch ($resultkq['id']) {
                                                case '1':
                                                    echo 'white';
                                                    break;
                                                case '2':
                                                    echo 'white';
                                                    break;
                                                case '3':
                                                    echo 'white';
                                                    break;
                                                case '4':
                                                    echo 'white';
                                                    break;
                                                case '5':
                                                    echo 'white';
                                                    break;
                                                case '6':
                                                    echo 'white';
                                                    break;
                                                case '7':
                                                    echo 'white';
                                                    break;
                                                default:
                                                    echo 'transparent';
                                                    break;
                                            }
                                            ?>;
                                    ">
                                            <?php echo $resultkq['name']; ?>
                                        </span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </td>
                        <td style="max-width: 400px;  word-break: break-all; white-space: normal;"><?php echo $result['nguon']; ?></td>
                        <td style="min-width: 150px;"><?php echo $result['user_name']; ?></td>
                        <td style="min-width: 80px;"><?php echo $result['mahen']; ?></td>
                        <td style="min-width: 80px;"><?php echo $result['form']; ?></td>
                        <td class="action" style="min-width: 110px;">
                            <a class="action_edit" href="dat_lich_kham_edit.php?edit=<?php echo $result['id'] ?>"><i style="font-size: 25px;" class="lni lni-pencil"></i></a>
                            <?php if(Session::get('role') === '1') {?>
                                <a onclick="return confirm('Bạn có chắc là bạn muốn xóa khách hàng <?php echo $result['hoten']; ?>')" style="margin-left: 10px;" class="action_delete " href="?delete=<?php echo $result['id'] ?>"><i style="font-size: 24px;" class="fa-solid fa-trash"></i></a>
                            <?php } ?>
                        </td>

                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>
    <div style="display: flex; align-items: flex-end; justify-content: flex-end; ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if ($total_pages > 1) : ?>
                    <?php if ($page > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>&sdt=<?php echo $sdt ?>&page=<?php echo $page - 1; ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php if ($page > 2) : ?>
                        <li class="page-item"><a class="page-link" href="?start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>&sdt=<?php echo $sdt ?>&page=1">1</a></li>
                    <?php endif; ?>

                    <?php if ($page > 3) : ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>

                    <?php for ($i = max(1, $page - 1); $i <= min($page + 1, $total_pages); $i++) : ?>
                        <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>"><a class="page-link" href="?start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>&sdt=<?php echo $sdt ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>

                    <?php if ($page < $total_pages - 2) : ?>
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>

                    <?php if ($page < $total_pages - 1) : ?>
                        <li class="page-item"><a class="page-link" href="?start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>&sdt=<?php echo $sdt ?>&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
                    <?php endif; ?>

                    <?php if ($page < $total_pages) : ?>
                        <li class="page-item"><a class="page-link" href="?start-date=<?php echo $startDate ?>&end-date=<?php echo $endDate ?>&sdt=<?php echo $sdt ?>&page=<?php echo $page + 1; ?>">Next</a></li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>

        </nav>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {

        <?php if ($message) : ?>
            toastr.<?php echo $message['status']; ?>('<?php echo $message['message']; ?>');
        <?php endif; ?>
    });
</script>
<?php include 'inc/footer.php'; ?>

<?php } else { ?>
    <div style="display: flex; align-items: center; justify-content: center; font-size: 30px; text-transform: uppercase; font-weight: 600; height: 90vh; color: red; ">Trang này không tồn tại</div>
<?php } ?>