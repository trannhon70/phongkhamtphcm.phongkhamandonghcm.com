<footer class="footer" id="footer">
    <div class="footer__container">
        <div class="footer__container-left">
            <amp-img class="footer__container-left-img" src="<?php echo $local ?>/images/logos/logo_footer.webp" height="100px" width="300px" alt="..."></amp-img>
            <hr>
            <div class="footer__container-left-body">
                <ul class="footer__container-left-body-ul">
                    <li class="footer__container-left-body-ul-li">
                        <div class="toggle-menu"> Danh Mục Bệnh <span class="triangle-down"></span></div>
                        <ul class="footer__container-menu">
                        <li>
                                <a href="<?php echo $local ?>">Ngoại Khoa</a>
                            </li>
                            <li>
                                <a href="<?php echo $local ?>">Da Liễu</a>
                            </li>
                            <li>
                                <a href="<?php echo $local ?>">Xét Nghiệm</a>
                            </li>
                            <li>
                                <a href="<?php echo $local ?>">Chuẩn Đoán Hình Ảnh</a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a href="<?php echo $local ?>">quy trình thăm khám</a>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a href="<?php echo $local ?>">tin tức</a>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a href="<?php echo $local ?>">tư vấn trực tuyến</a>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a  href="<?php echo $local ?>">đặt lịch khám</a>
                    </li>
                </ul>
                <div class="footer__container-left-body-div">
                    <div class="footer__container-left-body-div-title">
                        Thông Tin Liên Hệ
                    </div>
                    <div class="footer__container-left-body-div-item">
                        <span class="footer__container-left-body-div-item-add">+</span>
                        <div class="footer__container-left-body-div-item-line">
                            <h5>Hotline: </h5>
                            <div>028 7777 9888</div>
                        </div>
                    </div>
                    <div class="footer__container-left-body-div-item">
                        <span class="footer__container-left-body-div-item-add">+</span>
                        <div class="footer__container-left-body-div-item-line">
                            <h5>Địa Chỉ: </h5>
                            <div>360 An Dương Vương, P.4, Q.5, TP.HCM</div>
                        </div>
                    </div>
                    <div class="footer__container-left-body-div-item">
                        <span class="footer__container-left-body-div-item-add">+</span>
                        <div class="footer__container-left-body-div-item-line">
                            <h5>Mail: </h5>
                            <div>pkdkad360@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
       
            <div class="footer__container-right ">
                <div class="footer__container-right-title">
                    <div>THỜI GIAN</div>
                    <amp-img class="footer__container-left-img" src="<?php echo $local ?>/images/icons/icon_clock1.webp" height="60px" width="60px" alt="..."></amp-img>
                    <div>LÀM VIỆC</div>
                </div>
                <hr>
                <div class="footer__container-right-hour">
                    8:00 - 20:00
                </div>
                <span>Tất cả các ngày trong tuần, kể cả ngày lễ</span>
                <div onclick="openModal_footer()" class="footer__container-right-map">
                    <img width="100%" height="auto" src="<?php echo $local ?>/images/banner/map.webp" alt="...">
                    <amp-img class="footer__container-right-map-img" src="<?php echo $local ?>/images/icons/icon_eye.webp" height="50px" width="50px" alt="..."></amp-img>
                </div>
            </div>
      
    </div>
    <hr>
    <div class="footer__copyRight">
        <div>Copyright © <?php echo date('Y'); ?> Phòng Khám Chuyên khoa An Đông</div>
    </div>

    <!-- Modal footer -->
    <div id="modal__footer" class="modal__footer" style="display:none;">
        <div class="modal__footer-content">
            <span class="close" onclick="closeModal_footer()">&times;</span>
            <div style="margin-top: 30px;">
                <img width="100%" height="auto" src="<?php echo $local ?>/images/banner/map_zoom.webp" alt="">
            </div>
        </div>
    </div>
</footer>

<footer id="footer__mobile" class="footer__mobile" >
    <div class="footer__mobile-top ping-wrapper" >
        <div class="footer__mobile-top-body ping-border" >
            <div class="footer__mobile-top-body-title" >
                <div>THỜI GIAN</div>
                <amp-img class="footer__container-left-img" src="<?php echo $local ?>/images/icons/icon_clock-black.webp" height="60px" width="60px" alt="..."></amp-img>
                <div>LÀM VIỆC</div>
            </div>
            <hr>
            <div class="footer__mobile-top-body-hour" >
             8:00 - 20:00 
            </div>
            <div class="footer__mobile-top-body-text" >Tất cả các ngày trong tuần, kể cả ngày lễ</div>
        </div>  
    </div>
    <div class="footer__mobile-bottom" >
        <div class="footer__mobile-bottom-title" >
            <amp-img class="footer__mobile-bottom-img" src="<?php echo $local ?>/images/logos/logo_footer.webp" height="100px" width="300px" alt="..."></amp-img>
            <hr>
        </div>

        <div class="footer__container-left-body">
                <ul class="footer__container-left-body-ul">
                    <li class="footer__container-left-body-ul-li">
                        <div class="toggle-menu"> Danh Mục Bệnh <span class="triangle-down"></span></div>
                        <ul class="footer__container-menu">
                           
                            <li>
                                <a href="<?php echo $local ?>">Ngoại Khoa</a>
                            </li>
                            <li>
                                <a href="<?php echo $local ?>">Da Liễu</a>
                            </li>
                            <li>
                                <a href="<?php echo $local ?>">Xét Nghiệm</a>
                            </li>
                            <li>
                                <a href="<?php echo $local ?>">Chuẩn Đoán Hình Ảnh</a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a href="<?php echo $local ?>">quy trình thăm khám</a>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a href="<?php echo $local ?>">tin tức</a>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">tư vấn trực tuyến</a>
                    </li>
                    <li class="footer__container-left-body-ul-li footer__container-left-hover">
                        <a  href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en">đặt lịch khám</a>
                    </li>
                </ul>
                <div class="footer__container-left-body-div">
                    <div class="footer__container-left-body-div-title">
                        Thông Tin Liên Hệ
                    </div>
                    <div class="footer__container-left-body-div-item">
                        <span class="footer__container-left-body-div-item-add">+</span>
                        <div class="footer__container-left-body-div-item-line">
                            <h5>Hotline: </h5>
                            <div>028 7777 9888</div>
                        </div>
                    </div>
                    <div class="footer__container-left-body-div-item">
                        <span class="footer__container-left-body-div-item-add">+</span>
                        <div class="footer__container-left-body-div-item-line">
                            <h5>Địa Chỉ: </h5>
                            <div>360 An Dương Vương, P.4, Q.5, TP.HCM</div>
                        </div>
                    </div>
                    <div class="footer__container-left-body-div-item">
                        <span class="footer__container-left-body-div-item-add">+</span>
                        <div class="footer__container-left-body-div-item-line">
                            <h5>Mail: </h5>
                            <div>pkdkad360@gmail.com</div>
                        </div>
                    </div>
                </div>
            </div>
        <div>
            <img width="100%" height="auto" src="<?php echo $local ?>/images/banner/map.webp" alt="...">
        </div>
    </div>
    <div class="footer__mobile-position" >
        <div class="footer__mobile-position-div" >
            <a class="footer__mobile-position-div-left" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"  >
                <div style="position: relative;" >
                    <div class="footer_list_icon_number1">10</div>
                </div>
            </a>
            <a class="footer__mobile-position-div-center" href="tel:02877779888"></a>
            <a class="footer__mobile-position-div-right" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" ></a>
        </div>
    </div>
</footer>

<div class="footer_list_icon">
    <div>
        <div class="footer_icon_happy" id="openModalKM" >
            <amp-img src="<?php echo $local ?>/images/icons/icon_happy.gif" height="50px" width="50px" alt="..."></amp-img>
        </div>
    </div>
    
    <div style="margin-top:20px">
        <a class="footer_icon_mess" href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" ><amp-img style="margin-left:3px" src="<?php echo $local ?>/images/icons/icon_message.webp" height="45px" width="45px" alt="..."></amp-img>
            <div class="ping"></div>
            <div class="footer_list_icon_number">10</div>
        </a>
    </div>
</div>

<?php include_once 'layout/modalKhuyenMai.php' ?>

<script>
    function openModal_footer() {
        document.getElementById('modal__footer').style.display = 'block';
    }

    function closeModal_footer() {
        document.getElementById('modal__footer').style.display = 'none';
    }

    document.querySelector('.toggle-menu').addEventListener('click', function() {
        var menu = this.nextElementSibling; // Lấy phần tử <ul> kế tiếp
        if (menu.style.display === 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    });
    
</script>

<script>
        const feedbacks = document.querySelectorAll('.client__container-item');
        const listItems = document.querySelectorAll('.client-item');
        let currentIndex = 0;
        const showFeedback = (index) => {
            feedbacks.forEach((feedback, idx) => {
                feedback.classList.toggle('activeClient', idx === index);
            });
            listItems.forEach((listItem, idx) => {
                listItem.classList.toggle('activeClient', idx === index);
            });
        };
        const handleChangeSlideFeedback = () => {
            currentIndex = (currentIndex + 1) % feedbacks.length;
            showFeedback(currentIndex);
        };
        showFeedback(currentIndex); 
        setInterval(handleChangeSlideFeedback, 4000);
    </script>

</body>

</html>
<script language="javascript" src="https://npa.zoosnet.net/JS/LsJS.aspx?siteid=NPA46777247&float=1&lng=en"></script>
<script src="<?php echo $local ?>/js/jquery-3.7.1.min.js" defer></script>
<script src="<?php echo $local ?>/js/cdn_image.min.js" defer></script>
<script src="<?php echo $local ?>/js/toastr.min.js" defer></script>
<script src="<?php echo $local ?>/js/form_tu_van.min.js" defer></script>
<script src="<?php echo $local ?>/js/random_number.min.js" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function updateHeaderScripts() {
            // Xóa các script cũ nếu có
            const existingMobileScripts = document.querySelectorAll('script[id^="mobile-"]');
            const existingDesktopScripts = document.querySelectorAll('script[id^="desktop-"]');
            existingMobileScripts.forEach(script => script.remove());
            existingDesktopScripts.forEach(script => script.remove());

            // Thêm script mới dựa trên kích thước cửa sổ
            if (window.innerWidth < 1000) {
                const mobileScripts = [
                    // {
                    //     src: 'js/slider_feedback.min.js',
                    //     id: 'mobile-0'
                    // },
                    {
                        src: 'js/sidebar_mobile.min.js',
                        id: 'mobile-1'
                    },

                ];
                mobileScripts.forEach(({
                    src,
                    id
                }) => {
                    const script = document.createElement('script');
                    script.src = src;
                    script.id = id;
                    document.body.appendChild(script);
                });
            } else {
                const desktopScripts = [{
                        src: 'js/slider.min.js',
                        id: 'desktop-0'
                    },

                ];
                desktopScripts.forEach(({
                    src,
                    id
                }) => {
                    const script = document.createElement('script');
                    script.src = src;
                    script.id = id;
                    document.body.appendChild(script);
                });
            }
        }

        updateHeaderScripts();

        window.addEventListener('resize', () => {
            // console.log('Window resized to:', window.innerWidth);
            updateHeaderScripts();
        });
    });
</script>

