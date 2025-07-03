<?php
// $local = '/phongkhamandonghcm.com';
$local = 'https://phongkhamandonghcm.com';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Phòng khám</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preload" href="<?php echo $local ?>/css/toastr.min.css" as="style" onload='this.onload=null,this.rel="stylesheet"'>
</head>

<style>
    @media only screen and (max-width: 600px) {
        body {
            width: 100% !important;
        }

        .container{
            height: auto !important;
        }

        .form{
            width: 100% !important;
        }
    }
    
    .container{
        display: flex; align-items: center; justify-content: center; width: 100%; height: 100vh; 
        padding-left: 0px;
        padding-right: 0px;
    }

    .form{
        width: 500px; margin: 0 auto; background-color: #b0b9a8; padding: 10px 20px; border-radius: 10px;
        
    }
</style>

<body style="background-color: #f2f2f2;">

    <div class="container">
        <div>
            <div style="margin-bottom: 10px;" >
                <img width="100%" height="auto" src="<?php echo $local ?>/images/banner/banner_form.jpg" alt="...">
            </div>
            <form id="form" class="form">

                <div style="text-align: center; font-size: 20px; font-weight: 600; ">Form điền thông tin</div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Họ và tên</label>
                    <input name="hoten" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập họ và tên">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Số điện thoại</label>
                    <input name="sdt" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Số điện thoại">
                </div>
                <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="flexCheckbox" id="flexCheckbox1" value="Bao quy đầu" checked>
                        <label class="form-check-label" for="flexCheckbox1">
                            Bao quy đầu
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="flexCheckbox" id="flexCheckbox2" value="Gói khám 190k">
                        <label class="form-check-label" for="flexCheckbox2">
                            Gói khám 190k
                        </label>
                    </div>
                </div>
                <div style="display: flex; align-items: center; justify-content: center;">
                    <button type="button" class="btn btn-primary">Gửi thông tin</button>
                </div>
            </form>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var checkboxes = document.querySelectorAll('input[name="flexCheckbox"]');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('click', function() {
                    checkboxes.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                });
            });
        });
        // function formatPhoneNumber(phoneNumber) {
        //     let cleaned = ('' + phoneNumber).replace(/\D/g, '');
        //     let match = cleaned.match(/^(\d{10})$/);  // Check if the phone number has exactly 10 digits
        //     if (match) {
        //         return '(' + cleaned.substring(0, 4) + ') ' + cleaned.substring(4, 7) + '-' + cleaned.substring(7);
        //     }
        //     return null;
        // }
        function getCurrentVietnamTimestamp() {
            const utcOffset = 7 * 60 * 60 * 1000; // UTC+7 in milliseconds
            const localTime = Date.now() + utcOffset; // Adjust for Vietnam time
            return Math.floor(localTime / 1000); // Convert to Unix timestamp
        }
        document.querySelector('button').addEventListener('click', function() {
            // Lấy giá trị từ các trường trong form
            var hoten = document.getElementById('exampleFormControlInput1').value;
            var sdt = document.querySelector('input[name="sdt"]').value;
            var trieuchung = document.querySelector('input[name="flexCheckbox"]:checked').value;

            let formData = {
                hoten: hoten,
                sdt: sdt,
                trieuchung: trieuchung,
                ngaykham: getCurrentVietnamTimestamp()
            };


            // if (formatPhoneNumber(formData.sdt)) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo $local; ?>/api/tu-van/creare-form-tikok.php", true); // PHP local variable
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    let response = JSON.parse(xhr.responseText);
                    if (response.status === 'success') {
                        toastr.success(response.message);

                        // Clear form fields after submission
                        document.getElementById('form').reset();
                    } else {
                        toastr.error(response.message);
                    }
                }
            };

            xhr.send(JSON.stringify(formData));
            // } else {
            //     toastr.error("Số điện thoại không hợp lệ! Vui lòng nhập số điện thoại đúng 10 số.");
            // }
        });
    </script>

    <script src="<?php echo $local ?>/js/jquery-3.7.1.min.js" defer></script>
    <script src="<?php echo $local ?>/js/cdn_image.min.js" defer></script>
    <script src="<?php echo $local ?>/js/toastr.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>