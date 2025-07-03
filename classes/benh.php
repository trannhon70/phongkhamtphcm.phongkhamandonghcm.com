
<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php 
  class Benh 
  {
      private $db;
      private $fm;
      public function __construct()
      {
          $this->db = new Database();
          $this->fm = new Format();
      }

      //thêm danh mục 
      public function getByIdKhoa(){
        $query = "SELECT * FROM admin_benh ";
        $result = $this->db->select($query);
        return $result;
        
      }
      
      public function getAllDanhSachBenh(){
        $query = "SELECT * FROM admin_benh WHERE 1";
        $result = $this->db->select($query);
        return $result;
        
      }

      function getDanhSachBenhByIdKhoa($idKhoa){
        $query = "SELECT * FROM `admin_benh` WHERE id_khoa = '$idKhoa' AND hidden = '0' ";
        $result = $this->db->select($query);
        
        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
      }

      public function getPaginationBenhs($limit, $offset,$tenBenh,$IdKhoa){
        if($tenBenh !== '' || $IdKhoa !== ''){
          $query = "SELECT admin_benh.id AS benh_id, admin_benh.name, admin_benh.slug, admin_benh.hidden, admin_benh.created_at,
            khoa.name AS nameKhoa,
            user.full_name
            FROM `admin_benh`
            JOIN admin_khoa khoa ON admin_benh.id_khoa = khoa.id
            JOIN admin_user user ON admin_benh.user_id = user.id
            WHERE admin_benh.name LIKE '%$tenBenh%'";
            if (!empty($IdKhoa)) {
              $query .= " AND khoa.id = '$IdKhoa'";
            }
  
            $query .= "ORDER BY admin_benh.id DESC LIMIT $limit OFFSET $offset";
        }else {
          $query = "SELECT admin_benh.id AS benh_id, admin_benh.name, admin_benh.slug, admin_benh.hidden , admin_benh.created_at,
            khoa.name AS nameKhoa,
            user.full_name
            FROM `admin_benh`
            JOIN admin_khoa khoa ON admin_benh.id_khoa = khoa.id
            JOIN admin_user user ON admin_benh.user_id = user.id
            ORDER BY admin_benh.id DESC LIMIT $limit OFFSET $offset";
        }
        
          $result = $this->db->select($query);
          return $result;
      }

      public function getTotalCountBenhs($tenBenh,$IdKhoa){
        if($tenBenh !== '' || $IdKhoa !==''){
          $query = "SELECT COUNT(*) AS total FROM admin_benh WHERE admin_benh.name LIKE '%$tenBenh%'";

          if (!empty($IdKhoa)) {
            $query .= " AND admin_benh.id_khoa = '$IdKhoa'";
          }
        } else {
          $query = "SELECT COUNT(*) AS total FROM admin_benh ";
        }
        
        $result = $this->db->select($query);
        $row = $result->fetch_assoc();
        return $row['total'];
      }

      public function getDSBenhThuocKhoaTTYK(){
        $query = "SELECT * FROM admin_benh WHERE id_khoa = 8 AND hidden = 0 ORDER BY admin_benh.id ASC ";
        $result = $this->db->select($query);
        return $result->fetch_all(MYSQLI_ASSOC);
      }
  }
  
?>