<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sequential Ping Effect with Spacing</title>
  <style>
    .ping-wrapper {
      position: relative;
      display: inline-block;
    }

    .ping-border {
      position: relative;
      padding: 20px;
      border: 2px solid black; /* Border của thẻ chính */
      background-color: white; /* Màu nền của phần tử chứa */
      z-index: 2; /* Đảm bảo nằm trên các lớp ping */
    }

    .ping-layer {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0); /* Đặt vào giữa và bắt đầu từ kích thước 0 */
      opacity: 0; /* Bắt đầu không nhìn thấy */
      pointer-events: none; /* Đảm bảo pseudo-elements không can thiệp vào các tương tác */
      animation: pingLayer 2s infinite;
    }

    @keyframes pingLayer {
      0% {
        transform: translate(-50%, -50%) scale(0); /* Bắt đầu với kích thước 0 */
        opacity: 1; /* Bắt đầu với độ mờ 1 */
      }
      50% {
        transform: translate(-50%, -50%) scale(1); /* Mở rộng */
        opacity: 0; /* Biến mất khi mở rộng */
      }
      100% {
        transform: translate(-50%, -50%) scale(0); /* Quay lại kích thước 0 */
        opacity: 0; /* Đảm bảo không còn nhìn thấy khi kết thúc */
      }
    }
  </style>
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh;">
  <div class="ping-wrapper">
    <div class="ping-border">
      Sequential Ping Layers with Spacing!
    </div>
    <!-- Các lớp ping sẽ được thêm vào đây bằng JavaScript -->
  </div>

  <script>
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
