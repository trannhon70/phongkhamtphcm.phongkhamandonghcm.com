<?php include "inc/header.php" ?>
<link rel="stylesheet" href="<?php echo $local ?>/css/chi-tiet-bai-viet.min.css">
</head>
<?php
$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$current_url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$slug = basename(parse_url($current_url, PHP_URL_PATH), '.html');

$getPostDetail = null;

$postDetail = $bai_viet->getBaiViet_bySlug($slug);

if (isset($postDetail) && isset($postDetail['name_khoa'])) {
    $getPostDetail = $postDetail;
}else {
    $postTinTuc = $bai_viet->getBaiVietDauTienByBenh($slug);
    if ($postTinTuc) {
        $getPostDetail = $postTinTuc;
    } else {
        $getPostDetail = null;
    }
}

if (isset($getPostDetail["hiden"]) && $getPostDetail["hiden"] === "1") {
    http_response_code(404);
    include '404.html'; // hoặc '404.php'
    exit();
}
?>

<body>
    <?php include_once 'layout/headerLayout.php' ?>
    <main>
        <article>
            <?php include "layout/sliderLayout.php" ?>

            <?php include_once 'layout/sendPhoneLayout.php' ?>
            <section id="menu_logo_mobile" >
                <?php include 'layout/menu_logo.php' ?> 
            </section>

            <section class="article" id="article">
                <div class="article__title">
                    <?php
                    function setTitleAndScroll($title)
                    {
                        $titleWithSpaces = $title . str_repeat(' ', 10);
                        echo "<script>document.title = '$titleWithSpaces';</script>";
                        echo "<script>
                                 var title = '$titleWithSpaces';
                                 var scrollSpeed = 300; // Speed in milliseconds
                                 var scrollPosition = 0;
                                 
                                 function scrollTitle() {
                                     document.title = title.substring(scrollPosition) + title.substring(0, scrollPosition);
                                     scrollPosition = (scrollPosition + 1) % title.length;
                                     setTimeout(scrollTitle, scrollSpeed);
                                 }
                                 
                                 scrollTitle();
                             </script>";
                    }

                    if (isset($getPostDetail) && isset($getPostDetail['name_khoa'])) {
                        $title = $getPostDetail['tieu_de'];
                        echo 'Trang chủ > ' . $getPostDetail['name_khoa'] . ' > ' . $getPostDetail['name_benh'];
                        setTitleAndScroll($title);
                    } else {
                        echo '';
                    }
                    ?>
                </div>
                <div class="article__container">
                    <div class="article__container-left">
                        <div class="article__container-left-div">
                            <!-- <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"  >
                            <img class="article__container-left-img" src="<?php echo $local ?>/images/banner/khuyen_mai.webp" height="auto" width="100%" alt="..."></img>
                            </a> -->
                           
                        </div>

                    </div>
                    <div class="article__container-right">
                    <?php if ($getPostDetail !== 'Hiện tại dữ liệu này chưa có bài viết!') { ?>
                        <div class="article__container-right-title">
                            <?php echo $getPostDetail['tieu_de'] ?>
                        </div>
                        <div class="article__container-right-banner">
                            <!-- <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en"  >
                                <img width="100%"  src="<?php echo $local ?>/images/banner/khuyen_mai_mobile.gif" alt="...">
                            </a> -->
                           <section class="cardbs">
                                <div class="cardbs__body">
                                    <div class="cardbs__body-left">
                                        <img loading="lazy" width="100%" src="<?php echo $local ?>/images/sui_mau_ga/icons/icon_bs.webp" alt="...">
                                    </div>
                                    <div class="cardbs__body-right">
                                        <div class="cardbs__body-right-bs">
                                            BS VÕ MINH NGUYỄN
                                        </div>
                                        <div class="cardbs__body-right-ck">
                                            Chuyên khoa ngoại
                                        </div>
                                        <div class="cardbs__body-right-ct">
                                            Từng công tác tại Bệnh viện Chuyên khoa Sainpaul Hà Nội <a href="#bs">xem thêm...</a>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="banner">
                                <div class="banner__button">
                                    <a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" aria-label="title" class="box">tư vấn với bác sĩ tại đây</a>
                                </div>
                            </section>
                        </div>
                        
                        <div class="article__container-right-content" id="bai-viet">
                            <?php if (Session::get('role') === '1' || Session::get('role') === '2') {?>
                                <a class="chinh-sua"
                                    href="<?php echo $local ?>/admin/bai-viet-edit.php?edit=<?php echo $getPostDetail['id'] ?>">
                                    <i style="font-size:19px" class="bx bxs-pencil"></i>chỉnh sửa
                                </a>
                            <?php } ?>
                            <?php echo htmlspecialchars_decode($getPostDetail['content']); ?>
                        </div>
                        <div class="bai-viet-footer">Nội dung bài viết cung cấp nhằm mục đích tham khảo thêm kiến thức y tế,
                            một số nội dung có thể không thuộc nghiệp vụ của phòng khám chúng tôi, Hiệu quả của việc hỗ trợ
                            điều trị phụ thuộc vào cơ địa của mỗi người. Cần biết thông tin liên hệ để được tư vấn trực
                            tuyến miễn phí.<a href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" >[TƯ VẤN TRỰC TUYẾN]</a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <?php include_once 'layout/benefitLayout.php' ?>
           
        </article>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            //images gây shock
            const shockElements = document.querySelectorAll('.shock_img');
            shockElements.forEach(shockElement => {

                shockElement.classList = 'hiden_img'
                const viewdiv = document.createElement('div');
                viewdiv.id = 'viewdiv';
                viewdiv.className = 'view';
                viewdiv.textContent = 'Hình ảnh có nội dung gây shock !! cân nhất trước khi xem';

                const viewbutton = document.createElement('button');
                viewbutton.id = 'viewbutton';
                viewbutton.className = 'view_button';
                viewbutton.textContent = 'click vào xem';
                // Append the button to the parent of the shockElement (image-container)
                shockElement.appendChild(viewdiv);
                shockElement.appendChild(viewbutton);

                // Add click event listener to the button
                viewbutton.addEventListener('click', () => {
                    // Remove the blur effect
                    shockElement.classList.remove('blurred');
                    shockElement.classList.remove('hiden_img');
                    // Hide the button
                    viewdiv.classList.add('hidden');
                    viewbutton.classList.add('hidden');
                });
            })

            let baiVietElement = document.getElementById('bai-viet');
            if (baiVietElement) {
                let pElements = baiVietElement.getElementsByTagName('p');
                for (let i = 0; i < pElements.length; i++) {
                    pElements[i].style.color = '#000000'; // Ghi đè CSS trước đó
                    pElements[i].style.fontWeight = 400;
                    pElements[i].style.fontSize = '13px';
                    pElements[i].style.lineHeight = '27px';
                }

                
            }

           

            let imgElements = baiVietElement.getElementsByTagName('img');
            if (imgElements) {
                for (let i = 0; i < imgElements.length; i++) {
                    // convert link img
                    if (imgElements[i].src.startsWith('<?php echo $local ?>/ckeditor/uploads/') == true) {
                        let urlParts = imgElements[i].src.split('/');
                        let fileName = urlParts[urlParts.length - 1];
                        imgElements[i].src = '<?php echo $local ?>/admin/ckeditor/uploads/' + fileName;
                    }

                    //hiển thị css img chatbox
                    if (imgElements[i].src.startsWith('<?php echo $local ?>/ckfinder/userfiles/images/Chat/Chat-Dakhoa.gif') ==
                    // if (imgElements[i].src.startsWith('http://localhost/ckfinder/userfiles/images/Chat/Chat-Dakhoa.gif') ==
                        true) {
                        imgElements[i].style.borderRadius = '8px';
                        let divWrapper = document.createElement('a');
                        divWrapper.href = "https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en";
                        
                        divWrapper.className = 'glow-on-hover';
                        imgElements[i].parentNode.insertBefore(divWrapper, imgElements[i]);
                        divWrapper.appendChild(imgElements[i])
                       
                    }
                }
            }

            // css h2, h3
            if (baiVietElement) {
                let h2Elements = baiVietElement.getElementsByTagName('h2');
                for (let i = 0; i < h2Elements?.length; i++) {
                    h2Elements[i].style.color = '#1F99D5';
                    h2Elements[i].style.fontWeight = '700';
                    h2Elements[i].style.fontSize = '23px';
                    h2Elements[i].style.textTransform = 'capitalize';
                    h2Elements[i].style.background =
                        'url("<?php echo $local ?>/images/icons/icon_cong.webp") no-repeat left center';
                    h2Elements[i].style.backgroundSize = '23px 23px';
                    h2Elements[i].style.paddingLeft = '25px';
                    // h2Elements[i].style.margin = '10px 0px';

                }

                let h3Element = baiVietElement.getElementsByTagName('h3');

                for (let i = 0; i < h3Element.length; i++) {
                    h3Element[i].style.color = '#00D8D8';
                    h3Element[i].style.fontWeight = '700';
                    h3Element[i].style.fontSize = '21px';
                    h3Element[i].style.textTransform = 'capitalize';
                    h3Element[i].style.background =
                        'url("<?php echo $local ?>/images/icons/icon_mui.gif") no-repeat left center';
                    h3Element[i].style.backgroundSize = '21px 21px';
                    h3Element[i].style.paddingLeft = '25px';
                    h3Element[i].style.display = 'flex';
                    h3Element[i].style.alignItems = 'center';
                    h3Element[i].style.height = '25px';
                    // h3Element[i].style.margin = '10px 0px';
                }
            }

            //menu bên trái croll theo bài viết
            var rightBottom = document.querySelector('.article__container-left-div');
            var containerRow = document.querySelector('.article__container');
            var rightColumn = document.querySelector('.article__container-right');
            var rightCenter = document.querySelector('.article__container-left-div');
            var baiViet = document.getElementById('bai-viet');

            if (rightBottom && containerRow && rightColumn && rightCenter && baiViet) {
                window.addEventListener('scroll', function() {
                    var containerRowRect = containerRow.getBoundingClientRect();
                    var rightColumnRect = rightColumn.getBoundingClientRect();
                    var rightBottomHeight = rightBottom.offsetHeight;
                    var rightCenterRect = rightCenter.getBoundingClientRect();
                    var baiVietRect = baiViet.getBoundingClientRect();

                    // Kiểm tra khi scroll đến hết nội dung của id="bai-viet"
                    if (baiVietRect.bottom > window.innerHeight) {
                        if (containerRowRect.bottom - (rightBottomHeight - 700) <= window.innerHeight) {
                            rightBottom.style.position = 'absolute';
                            rightBottom.style.bottom = '0';
                            rightBottom.style.top = 'unset';

                        } else if (rightColumnRect.top + rightCenterRect.height <= 0) {
                            rightBottom.style.position = 'fixed';
                            rightBottom.style.top = '20px';
                            rightBottom.style.bottom = 'unset';
                            rightBottom.style.width = '275px';
                        } else {
                            rightBottom.style.position = 'relative';
                            rightBottom.style.top = 'unset';
                            rightBottom.style.bottom = 'unset';
                        }
                    } else {
                        rightBottom.style.position = 'relative';
                        rightBottom.style.top = 'unset';
                        rightBottom.style.bottom = 'unset';
                    }
                });
            } else {
                console.warn("One or more elements were not found in the DOM.");
            }

        })
    </script>

<script defer>
    let baiVietElement = document.getElementById('bai-viet');
    if (baiVietElement) {
        // Lấy nội dung HTML của phần tử
        let content = baiVietElement.innerHTML;

        // Thay số điện thoại
        content = content.replace(/0968\s063\s109/g, '0968 063 109, 028 7777 9888');

        // Thay "Đa Khoa" bất kể viết hoa/thường
        content = content.replace(/Đa\s+Khoa/gi, 'Chuyên khoa');

        // Cập nhật lại nội dung của thẻ
        baiVietElement.innerHTML = content;
    }
</script>

    <?php include_once 'inc/footer.php' ?>