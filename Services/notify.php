<?php
    $Message = $_POST['message'];
?>

<style>
        .modal {
            z-index: 10001;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 40px;
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #00d9e1;
        }

        .modal span {
            margin-top: 0;
            text-align: center;
            margin-left:2%;
            color:white !important;
        }
        .modal a{
            font-family: 'IcoFont' !important;
            font-size: 10px;
            color: white !important;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
            cursor: pointer;
            margin-right:3px;
        }
</style>


<div class="modal">
    <span><?php echo $Message;?></span>
    <a id="removeMessage" class="icofont icofont-close"></a>
</div>

<script>
    $("#removeMessage").on("click", function () {
        $('.modal').fadeOut(1000);
    return false;
  });
  $(document).ready(function() {
                setTimeout(function() {
                  $(".modal").fadeOut(1000);
                }, 5000);
              });
</script>