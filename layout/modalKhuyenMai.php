<style>
    .modal {
        display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 10%;
            width: 100%;
            height: 100%;
            overflow: auto;
    }

    .modal-content {
        margin: 15% auto;
        width: 500px;
        height: auto;
        animation-duration: 1s;
        animation-name: slidein;
    }

    @keyframes slidein {
            from {
                transform: translateX(150vw) scaleX(2);
            }
            to {
                transform: translateX(0) scaleX(1);
            }
        }

        @keyframes slideout {
            from {
                transform: translateX(0) scaleX(1);
            }

            to {
                transform: translateX(150vw) scaleX(2);
            }
        }


    .closeKM {
        color: red;
        float: right;
        font-size: 25px;
        font-weight: bold;
        position: absolute;
        top: 1px;
        right: -23px;
        border: 3px solid;
        border-radius: 50%;
        padding: 0px 7px;
    }

    .closeKM:hover,
    .closeKM:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    @media only screen and (max-width: 999px) {
        .modal-content {
            margin: 15% 8%;
            width: auto;
            height: auto;
            animation-duration: 1s;
            animation-name: slidein;
         }
            
         .closeKM {
            font-size: 20px;
            padding: 0px 5px;
        }
        }
</style>


<div id="myModalKM" class="modal">
    <div class="modal-content">

        <div style="position: relative;">
            <span class="closeKM" id="closeModalKM">&times;</span>
            <img width="100%" height="auto" src="<?php echo $local ?>/images/banner/uudai.gif" alt="...">
            <div style="position: absolute; bottom: 0; left: 0; display: flex; align-items: center; height: 40px; width: 100%; ">
                <div style="width: 23%; height:40px" ></div>
                <div id="clickSloseModal" style="width: 23%;  height:40px " ></div>
                <a style="width: 54%;  height:40px; display: block; " href="https://npa.zoosnet.net/LR/Chatpre.aspx?id=NPA46777247&lng=en" ></a>
            </div>

        </div>
    </div>
</div>

<script>
    const modal = document.getElementById("myModalKM");
    const btn = document.getElementById("openModalKM");
    const span = document.getElementById("closeModalKM");
    const sloseModal = document.getElementById("clickSloseModal");

    // Khi người dùng nhấp vào nút, mở modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    sloseModal.onclick = function() {
        modal.style.display = "none";
    }

    // Khi người dùng nhấp vào "×", đóng modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // Khi người dùng nhấp ra ngoài modal, đóng modal
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>