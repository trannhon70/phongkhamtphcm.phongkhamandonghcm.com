<?php
ob_start("ob_gzhandler");
header("Timing-Allow-Origin: *");
header("Cache-Control: public, max-age=31536000, must-revalidate");

// $local = 'http://localhost/phongkhamtphcm.phongkhamandonghcm.com';
$local = 'https://phongkhamtphcm.phongkhamandonghcm.com';
?>
<!DOCTYPE html>
<html ⚡ lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta name="description"
        content="Phòng khám chuyên khoa chuyên điều trị bệnh nam khoa, bệnh xã hội, da liễu, hậu môn - trực tràng uy tính tại thành phố Hồ Chí Minh">
    <title>Phòng khám chuyên khoa</title>
    <link rel="icon" href="<?php echo $local ?>/images/nam_khoa/icons/icon_logo.webp" type="image/x-icon">
    <link rel="preload" href="css/chuyen-de-nam-khoa.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
    <noscript>
        <link rel="stylesheet" href="css/chuyen-de-nam-khoa.min.css">
    </noscript>
    <script>
        // Chỉ tải Google Analytics khi người dùng cuộn xuống
        document.addEventListener('scroll', function loadGA() {
            console.log('Người dùng cuộn xuống - Tải Google Analytics');

            // Tạo thẻ script
            var g = document.createElement('script'),
                s = document.scripts[0];
            g.src = 'https://www.googletagmanager.com/gtag/js?id=G-68K71TYX1K';
            g.async = true;
            s.parentNode.insertBefore(g, s);

            // Cấu hình gtag
            g.onload = function() {
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());
                gtag('config', 'G-68K71TYX1K');
            };

            // Xóa sự kiện lắng nghe để không tải lại
            document.removeEventListener('scroll', loadGA);
        });
    </script>
</head>
<?php
$slides = [
    [
        "image" => "/images/nam_khoa/banner/sui_mau_ga.webp",
        "alt" => "Sùi mào gà",
        "symptom" => "Nổi các nốt sần, gai thịt mềm tại lỗ sáo, quy đầu, bao quy đầu, thân dương vật.",
        "complication" => "Ảnh hưởng đến tâm lý, chất lượng cuộc sống và sức khỏe tổng thể. Thậm chí dẫn tới dương vật."
    ],
    [
        "image" => "/images/nam_khoa/banner/benh_lau.webp",
        "alt" => "Bệnh lậu",
        "symptom" => "Tiểu buốt, tiểu rát, nước tiểu đục, nặng mùi, có thể lẫn máu hoặc mủ. Lỗ sáo sưng đỏ, chảy mủ trắng đục hoặc vàng xanh.",
        "complication" => "Ảnh hưởng đến tâm lý, chất lượng cuộc sống và sức khỏe tổng thể, làm tăng nguy cơ vô sinh hiếm muộn."
    ],
    [
        "image" => "/images/nam_khoa/banner/roi_loan_cuong_duong.webp",
        "alt" => "Rối loạn cương dương",
        "symptom" => "Dương vật khó cương, cương không đủ cứng để thực hiện quan hệ, thời gian cương cứng ngắn, dương vật đau nhức khi sau xuất tinh.",
        "complication" => "Tác động tiêu cực đến tâm lý, gây suy giảm ham muốn và có thể dẫn đến liệt dương, tăng vô sinh hiếm muộn."
    ],
    [
        "image" => "/images/nam_khoa/banner/viem_bao_quy_dau.webp",
        "alt" => "Rối loạn cương dương",
        "symptom" => "Quy đầu, bao quy đầu tấy đỏ, mọng nước và nổi nhiều nốt mụn nhỏ, tiết dịch nhầy và bợn trắng, gây ngứa ngáy và đau rát khó chịu.",
        "complication" => "Viêm nhiễm lan sang có bộ phận khác, ảnh hưởng đến tâm lý và sức khỏe tổng thể của nam giới. Có thể gây hoại tử quy đầu, ung thư dương vật."
    ],
    [
        "image" => "/images/nam_khoa/banner/benh_tinh_hoan.webp",
        "alt" => "Bệnh tinh hoàn",
        "symptom" => "Đau một hoặc cả hai bên tinh hoàn, tinh hoàn sưng tấy, bầm tím hoặc to mọng, lệch bên. Sốt cao và ớn lạnh, buồn nôn và nôn, tiểu buốt rát…",
        "complication" => "Bệnh tinh hoàn cần được hỗ trợ điều trị sớm, tránh để lâu có thể dẫn đến hoại tử hoặc teo tinh hoàn, tăng nguy cơ vô sinh nam, thậm chí ung thư tinh hoàn."
    ],

    [
        "image" => "/images/nam_khoa/banner/viem_nhiem_nam_khoa.webp",
        "alt" => "Bệnh tinh hoàn",
        "symptom" => " Dương vật nổi mụn và tiết dịch lạ, tiểu buốt rát, tiểu nhiều lần, nước tiểu đục. Dương vật có mùi hôi, khó cương và đau nhức khi cương…",
        "complication" => "Ảnh hưởng trực tiếp đến sức khỏe tình dục, sinh sản và tiết niệu của nam giới. Bệnh tiến triển nặng có thể gây ung thư, vô sinh nam."
    ],
    [
        "image" => "/images/nam_khoa/banner/xuat_tinh_som.webp",
        "alt" => "Bệnh tinh hoàn",
        "symptom" => "Xuất tinh rất nhanh, từ 1 – 2 phút. Xuất tinh khi vừa đưa dương vật vào âm đạo hoặc ngay trong khúc dạo đầu. Dương vật xìu liền sau khi xuất tinh.",
        "complication" => "Lo lắng và căng thẳng, ảnh hưởng công việc và cuộc sống. Né tránh quan hệ, lâu dần dẫn đến lãnh cảm, rối loạn cương dương, thậm chí liệt dương."
    ],

];
?>

<body>

    <header class="header">
        <div class="header__body">
            <img loading="lazy" width="100%" height="auto" srcset="<?php echo $local ?>/images/nam_khoa/banner/banner.webp 1024w, <?php echo $local ?>/images/nam_khoa/banner/banner.webp 640w" sizes="(max-width: 640px) 100vw, 1024px" src="<?php echo $local ?>/images/nam_khoa/banner/banner.webp" alt="...">
        </div>
    </header>
    <section class="section__button">
        <a aria-label="liên hệ" class="animated-button" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            tư vấn với bác sĩ tại đây</a>
    </section>

    <session class="expert">
        <h2 class="expert__title">
            KHI NÀO NAM GIỚI CẦN ĐI KHÁM NAM KHOA
        </h2>
        <div class="expert__text" >
            Khi gặp vấn đề về chức năng tình dục
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
                Xuất tinh sớm, khó xuất tinh, giảm ham muốn
            </div>
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
                Dương vật không đủ độ cương để quan hệ tình dục
            </div>
        </div>
    </section>

    <session class="expert">
        <div class="expert__text" >
            Bất thường về bộ phận sinh dục 
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
                Dài / hẹp / nghẹt bao quy đầu
            </div>
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
             Dương vật: Viêm nhiễm, nổi mụn, ngứa, đau, sưng, chảy máu, mùi hôi
            </div>
        </div>
    </session>

    <session class="expert">
        <div class="expert__text" >
            Viêm đường tiết niệu - sinh dục 
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
            Tiểu buốt, tiểu rắt, chảy mủ miệng sáo
            </div>
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
            Nước tiểu màu bất thường, tiểu nhiều lần
            </div>
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
            Viêm niệu đạo, viêm tuyến tiền liệt, viêm mào tinh hoàn, viêm tinh hoàn
            </div>
        </div>
    </session>

    <session class="expert">
        <div class="expert__text" >
        Một số bệnh lây qua đường quan hệ không an toàn
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
            Sùi mào gà: Nổi mụn thịt, mụn li ti không đau, sần sùi ở bộ phận sinh dục
            </div>
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
            Bệnh lậu: Dương vật chảy mủ, tiểu có mủ sau quan hệ không an toàn
            </div>
        </div>
        <div class="expert__span" >
            <img width="20px" height="17px" loading="lazy"  src="<?php echo $local ?>/images/nam_khoa/icons/icon_next1.gif" alt="...">
            <div>
            Mụn rộp: Cậu nhỏ nổi mụn đỏ, mụn nước, mụn ngứa có mủ
            </div>
        </div>
    </session>

    <section class="expert expert__container">
       
            <img class="expert__img" width="100%" height="auto" loading="lazy" src="<?php echo $local ?>/images/nam_khoa/banner/bacsi_kham.webp" alt="...">
    </section>
    <section class="treatment">
        <a aria-label="chat" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="expert__chat">
            <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/icons/chat_dakhoa.gif" alt="...">
        </a>
    </section>
    <section class="expert">
        <h2 class="expert__title">
         BS. VÕ MINH NGUYỄN - Phòng Khám Nam Khoa Uy Tín Tại TPHCM
        </h2>
    </section>
   
   

    <session class="expert">
        <!-- <div class="expert__title">
            GIỚI THIỆU THÔNG TIN BÁC SĨ
        </div> -->
        <div class="expert__content">
            Đi thăm khám Nam khoa hiệu quả và an toàn bắt buộc cần có bác sĩ trình độ cao,
            chuyên môn tốt và nhiều kinh nghiệm thăm khám.
        </div>
        <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/nam_khoa/banner/bac_si_1.webp" alt="...">

    </session>
    <section class="expert">
        <div class="expert__title1">
            BS. VÕ MINH NGUYỄN
        </div>
        <span>
            Quá trình công tác
        </span>
    </section>
    <section class="expert expert_ul">
        <ul>
            <li><strong>+ </strong> CÔNG TÁC TẠI KHỐI NGOẠI tại Bệnh viện Chuyên khoa Sainpaul Hà Nội</li>
            <li><strong>+ </strong> CHUYÊN GIA Y TẾ TẠI NƯỚC NGOÀI</li>
            <li><strong>+ </strong> TRƯỞNG KHOA NGOẠI BỆNH VIỆN Chuyên khoa TÂM TRÍ SÀI GÒN</li>
        </ul>
    </section>
    <section class="expert">
        <div class="expert__spacialty">
            <div class="expert__spacialty-title">
                Chuyên khoa :
            </div>
            <ul>
                <li>- Sinh sản nam</li>
                <li>- Bệnh ngoại tiết niệu</li>
                <li>- Rối lọa tiết tố nam</li>
                <li>- Cấp cưu nam khoa</li>
            </ul>
        </div>
    </section>
    <section class="treatment treatment__card">
        <div class="treatment__namkhoa">

            <ul>
                <li class="treatment__namkhoa-title">ĐIỀU TRỊ CHUYÊN KHOA</li>
                <li class="treatment__namkhoa-titleN">+ bệnh nam khoa</li>
                <li><a aria-label="1" href="">1. Bệnh bao quy đầu</a></li>
                <li><a aria-label="1" href="">2. Rối loạn xuất tinh</a></li>
                <li><a aria-label="1" href="">3. Bệnh tinh hoàn</a></li>
                <li><a aria-label="1" href="">4. Bệnh tuyến tiền liệt</a></li>
                <li><a aria-label="1" href="">5. Bệnh đường tiết niệu</a></li>
                <li><a aria-label="1" href="">6. Vô sinh hiến muộn</a></li>
                <li><a aria-label="1" href="">7. Rối loạn chức năng sinh dục</a></li>
                <li><a aria-label="1" href="">8. Bệnh dương vật</a></li>

                <li class="treatment__namkhoa-titleN">+ bệnh xã hội</li>
                <li><a aria-label="1" href="">1. Sùi màu gà</a></li>
                <li><a aria-label="1" href="">2. Bệnh lậu</a></li>
                <li><a aria-label="1" href="">3. Giang mai</a></li>
                <li><a aria-label="1" href="">4. Mụn sinh dục</a></li>
                <li><a aria-label="1" href="">5. Rận mu</a></li>

            </ul>
        </div>

    </section>
    <section class="expert">
        
        <a aria-label="chat" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" class="expert__chat">
            <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/icons/chat_dakhoa.gif" alt="...">
        </a>
        <!-- <div class="expert__certificate">
            <button>CHỨNG CHỈ</button>
        </div> -->
    </section>
    
    <!-- <section class="expert">
        <div class="expert__certificate-img">
            <img loading="lazy" width="100%" height="auto" src="<?php echo $local ?>/images/nam_khoa/banner/chung_chi.webp" alt="...">
        </div>
    </section> -->
    <section class="section__button">
        <a aria-label="liên hệ" class="animated-button" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Đặt lịch khám ngay</a>
    </section>

    <section class="treatment">
        <div class="treatment__title">
            CÁC BỆNH NAM KHOA THƯỜNG GẶP
        </div>

    </section>

    <section class="treatment">
        <?php foreach ($slides as $slide): ?>
            <div class="list_image_card">
                <img loading="lazy" height="100%" width="100%" src="<?php echo $local . $slide['image']; ?>" alt="<?php echo $slide['alt']; ?>">
                <div class="list_image_card-text">
                    <div>
                        <strong>Biểu hiện : </strong>
                        <span><?php echo $slide['symptom']; ?></span>
                    </div>
                    <div>
                        <strong>Biến chứng: </strong>
                        <span><?php echo $slide['complication']; ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
    <section class="feedback">
        <div class="feedback_body">
            <div class="feedback_body-container">
                <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/banner/feedback.webp" alt="...">
                <div class="feedback_body-list">
                    <div class="feedback_body-list-item activeFeedback">
                        <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/banner/chat.webp" alt="...">
                    </div>
                    <div class="feedback_body-list-item ">
                        <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/banner/chat1.webp" alt="...">
                    </div>
                </div>
                <div class="index-feedbacks">
                    <div class="feedback-item feedback-item-0 activeFeedback"></div>
                    <div class="feedback-item feedback-item-1"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="section__button">
        <a aria-label="liên hệ" class="animated-button" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Liên hệ ngay</a>
    </section>
    <section class="service">
        <div class="service__body">
            <div class="service__body-item">
                <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/icons/icon_bs.webp" alt="...">
            </div>
            <div class="service__body-item">
                <div class="service__body-item-card">
                    <img width="44px" height="44px" loading="lazy" src="<?php echo $local ?>/images/nam_khoa/icons/icon_check.webp" alt="...">
                    <div>
                        Mức chi phí hợp lý, rõ ràng
                    </div>
                </div>
                <div class="service__body-item-card">
                    <img width="44px" height="44px" loading="lazy" src="<?php echo $local ?>/images/nam_khoa/icons/icon_check.webp" alt="...">
                    <div>
                        Dịch vụ chuyên nghiệp
                    </div>
                </div>
                <div class="service__body-item-card">
                    <img width="44px" height="44px" loading="lazy" src="<?php echo $local ?>/images/nam_khoa/icons/icon_check.webp" alt="...">
                    <div>
                        Bảo mật thông tin
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="license">
        <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/banner/giay_phep.webp" alt="...">
    </section>
    <section class="time">
        <div class="ping-wrapper">
            <div class="ping-border">
                <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/banner/time.webp" alt="...">
            </div>
        </div>
    </section>
    <section class="contact">
        <div class="contact__title">
            LIÊN HỆ TƯ VẤN VÀ ĐẶT LỊCH KHÁM
        </div>
        <div class="contact__body">
            <div>
                <a aria-label="phone" href="tel:+0968063109">
                    <strong>HOTLINE: </strong> <span>0968 063 109</span>
                </a>
            </div>
            <div>
                <a aria-label="phone" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                    <strong>ZALO: </strong> <span>0968 063 109</span>
                </a>
            </div>
            <div>
                <a aria-label="phone" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">
                    <strong>CHAT TRỰC TIẾP </strong>
                </a>
            </div>
            <div>
                <strong>ĐỊA CHỈ: </strong> <span>360 An Dương Vương, P.4, Q.5, TP.HCM</span>
            </div>
        </div>
    </section>
    <footer class="footer" >
    <img loading="lazy" src="<?php echo $local ?>/images/nam_khoa/banner/footer.webp" alt="...">
    <div class="footer__body" >
        <div class="footer__body-top" >
            <a aria-label="left" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"></a>
            <a aria-label="center" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"></a>
            <a aria-label="right" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"></a>
        </div>
        <div class="footer__body-botom" >
            <a aria-label="bottom" href="tel:+0968063109"></a>
        </div>
    </div>
</footer>
<?php include_once 'layout/modalKhuyenMai.php' ?>

<script language="javascript" src="https://npa.zoosnet.net/JS/LsJS.aspx?siteid=NPA46777247&float=1&lng=en"></script>

<script defer>
    const feedbacks = document.querySelectorAll('.feedback_body-list-item');
    const listItems = document.querySelectorAll('.feedback-item');
    let currentIndex = 0;

    const showFeedback = (index) => {
        feedbacks.forEach((feedback, idx) => {
            feedback.classList.toggle('activeFeedback', idx === index);
        });
        listItems.forEach((listItem, idx) => {
            listItem.classList.toggle('activeFeedback', idx === index);
        });
    };

    const handleChangeSlideFeedback = () => {
        currentIndex = (currentIndex + 1) % feedbacks.length;
        showFeedback(currentIndex);
    };

    showFeedback(currentIndex); // Initialize the first feedback as active
    setInterval(handleChangeSlideFeedback, 4000);
</script>
<script defer >
    // Số lượng lớp ping cần tạo
    const numberOfLayers = 10;
    // Lấy phần tử chứa các lớp ping
    const pingWrapper = document.querySelector('.ping-wrapper');
    // Hàm tạo màu ngẫu nhiên tươi sáng
    function getRandomBrightColor() {
      // Sử dụng HSL để tạo màu với độ bão hòa và độ sáng cao
      const hue = Math.floor(Math.random() * 360); 
      const saturation = 50; 
      const lightness = Math.floor(Math.random() * 21) + 20; 
      return `hsl(${hue}, ${saturation}%, ${lightness}%)`;
    }

    // Tạo các lớp ping
    for (let i = 1; i <= numberOfLayers; i++) {
      const pingLayer = document.createElement('div');
      pingLayer.className = `ping-layer ping-layer${i}`;
      pingLayer.style.width = `calc(100% + ${10 * i}px)`;
      pingLayer.style.height = `calc(100% + ${10 * i}px)`;
      pingLayer.style.border = '4px solid';
      pingLayer.style.borderColor = getRandomBrightColor(); 
      pingLayer.style.animationDelay = `${0.2 * (i - 0.6)}s`; 
      pingWrapper.appendChild(pingLayer);
    }
  </script>

</body>

</html>