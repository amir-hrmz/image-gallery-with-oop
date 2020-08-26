<?php
require_once('includes/init.php');
require_once('header.php');
require_once('sidebar.php');
?>


<style>
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
<div class="content">
    <div class="middle"><!-- start middle -->
        <h1 class="title-box">داشبورد</h1>
        <div class="tab-box"><!-- start tab-box -->
            <Ul class="tab">
                <li class="active">پیشخوان</li>
                <li>نمودار ها</li>

            </Ul>
            <div class="tab-content"> <!-- start tab-content -->
                <section class="section block">


                    <div class="sitevisits">
                        <span class="txt">تعداد بازدید سایت</span>
                        <span class="number"></span>
                    </div>
                    <div class="sitevisits" style="background: #5cb85c;">
                        <span class="txt">تعداد کل کاربران</span>
                        <span class="number"></span>
                    </div>

                    <div class="sitevisits" style="background: #f0ad4e;;">
                        <span class="txt">تعداد کل نظرات</span>
                        <span class="number"></span>
                    </div>

                    <div class="sitevisits" style="background: #d9534f;">
                        <span class="txt">تعداد کل عکس ها</span>
                        <span class="number"></span>
                    </div>

                    <?php
                    if ($database->connection) {
                        $found_user = $User->find_user_by_id(1);
                        $user = $User->instantiation($found_user);
                        echo "نام کاربری:".$user->username;
                    }
                    ?>
                </section>
                <section class="section">

                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                </section>
                <section class="section">3</section>
                <div class="clear"></div>
            </div><!-- end tab-content -->
            <div class="clear"></div>
        </div><!-- end tab-box -->
        <div class="clear"></div>
    </div><!-- end middle -->
    <div class="clear"></div>
</div>


<?php require_once('footer.php') ?>
