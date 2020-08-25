<?php
require_once("../includes/init.php");
if(!$session->is_signed_id()){redirect("login.php");}


if(empty($_GET["photo"]))
{
    redirect("photos.php");
}
else
{
    $photo = Photo::find_by_id($_GET["photo"]);
    if(@$_POST['title'])
    {
        $photo->title = $_POST['title'];
        $photo->description = $_POST['title'];

        if(!empty($_FILES['upload']))
        {
            $photo->set_file($_FILES['upload']);
        }else
        {
            $photo->filename =$_POST['previousimg'];
        }

        if($photo->save())
        {
            $message = "آپدیت با موفقیت انجام شد";
        }else
        {
            $message = $photo->errors;
        }
    }

}






?>

<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/font-awesome.css">

    <title>پنل مدیریت</title>
</head>
<body>

<header> <!--    start header-->
    <DIV class="right">
        <span>پیشخوان</span>
    </DIV>

    <DIV class="left">
        <div class="avatar">
            <img src="admin/images/user-avatar.jpg" alt="">
        </div>
        <ul class="navProfileDropdown">

            <li class="head">
                <a href="">
                    <img src="admin/images/user-avatar.jpg" alt="">
                    <span class="labelName">نام و نام خانوادگی فرد</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="admin/images/small-nofi.jpg"/>

                    <span>تنظیمات اطلاع رسانی</span>
                </a>
            </li>
            <li>
                <a href="">
                    <img src="admin/images/settings-profile.jpg"/>

                    <span>تنظیمات اصلی سایت</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <img src="admin/images/exit-profile.jpg"/>
                    <span>خروج</span>
                </a>
            </li>

        </ul>
        <div class="notification">
            <img src="admin/images/notifications-bell-button.png" alt="">
        </div>
    </DIV>
</header><!--    end header -->



<style>
    .active {
        background: #fff !important;
        color: #4d4d4d !important;
        border-right: 1px solid #dfdfdf;
        border-left: 1px solid #ccc;
        border-top: 1px solid #ccc;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    .content {
        width: 1088px;
        height: 500px;
        float: right;
        margin-top: 2px;
    }

    .middle {
        width: 97%;
        height: 0;
        margin: 0 auto;
    }

    .tab-box {
        width: 100%;
        height: auto;
        /*background: orange;*/
        font-size: 13px;

    }

    .title-box {
        font-size: 20px;
        margin: 10px 0;
    }

    .tab-box ul li {
        float: right;
        margin-left: 10px;
        padding: 9px 12px;
        color: #427acc;
    }

    .tab {
        width: 100%;
        height: 42px;
        border-bottom: 2px solid #1538dd;
        cursor: pointer;
    }



    .tab-content {
        width: 100%;
        height: auto;
    }

    .section {
        width: 100%;
        height: auto;
        padding: 30px 30px;
        background: #fff;
        float: right;
        border-right: 1px solid #ddd;
        display: none;
    }

    .block {
        display: block;
    }

    .tab-content .tabel1 tr td {
        float: right;
        padding: 7px 0;
        width: 27%;
    }

    .tab-content .tabel1 tr td:nth-child(even) {
        color: #427acc;
    }

    .table2 {
        text-align: center;
    }

    .table2 td {
        padding: 10px 0;
    }

    .table2 tr:nth-of-type(2n+1) {
        background: #f9f9f9;
        border: 1px solid #ccc !important;
    }
</style>


<div class="sidebar">
    <div class="head">
        <img src="../images/avatar4.jpg">
        <h3>سیستم گالری عکس با شی گرایی</h3>

        <div class="level-user">
            <span class="label-name">سطح مدیریتی : </span>
            <span class="label-level">مدیر اصلی </span>
        </div>
        <div class="clear"></div>
    </div>

    <div class="menu">
        <UL>
            <li><a href="/../admin">پیشخوان</a></li>
            <li class="has-sub"><a href="#">مدیریت کاربران</a>
                <ul>
                    <li><a href="#">افزودن</a></li>
                    <li><a href="#">همه کاربران</a></li>
                </ul>
            </li>


            <li class="has-sub"><a href="#">آپلود عکس</a>
                <ul>
                    <li><a href="upload.php">آپلود</a></li>
                </ul>
            </li>

            <li class="has-sub"><a href="#">گالری عکس</a>
                <ul>
                    <li><a href="photos.php">نمایش عکس ها</a></li>

                </ul>
            </li>


            <li class="has-sub"><a href="#">بخش نظرات</a>
                <ul>
                    <li><a href="#">نمایش نظرات</a></li>

                </ul>
            </li>


            <li><a href="#">تنضیمات</a></li>

        </UL>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="content">
    <div class="middle"><!-- start middle -->
        <h1 class="title-box">داشبورد</h1>

        <div class="upload">
            <div class="message"><?= is_array(@$message) ? @$message[0] : @$message; ?></div>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="text" name="title" value="<?= $photo->title ?>" placeholder="عنوان عکس را وارد کنید!" /><br />
                <input type="hidden" name="id" id="id" value="<?= $photo->id ?>">
                <input type="hidden" name="filename" id="photo_filename" value="<?= $photo->filename ?>">
                <img id="myImg" class="myImg" src="../<?= $photo->picture_path(); ?>" width="120" height="120" style="margin-right: 233px; cursor: pointer;" />
                <input type="submit" name="submit" value="آپلود عکس">
            </form>



        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>

                <?php $phtos = Photo::find_all();
                foreach ($phtos as $phto){
                ?>
                <img class="modal-img" src="../<?= $phto->picture_path(); ?>" data="<?= $phto->id ?>"  width="90" height="90" style="margin: 10px; cursor: cell" />
                <?php } ?>

                <div class="modal-left"></div>
                <br />
                <hr />
                <button disabled="true" class="btn-outline-primary" id="update_image">انتخاب عکس</button>
            </div>

        </div>


        <div class="clear"></div>
    </div><!-- end middle -->
    <div class="clear"></div>
</div>

</body>


<script src="../js/jquery.js"></script>
<script src="../js/script.js"></script>
</html>
