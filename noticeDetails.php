<!--============================= HEADER =============================-->
<?php
include('config.php');
include('header.php');
include('./include/public_fuction.php');
// fetch single published notices by slug
if (isset($_GET['slug'])) {
    $notice = getNoticeBySlug($_GET['slug']);
}
if (isset($_SESSION["user"])) {
    $user = $_SESSION['user'];
} else {
    $_SESSION['user']['user_role'] = 'user';
    $user = $_SESSION['user'];
}

?>
<!--============================= HEADER =============================-->

<section class="light-bg booking-details_wrap">
    <?php if (!$notice) : ?>
        <?php include('./404.php'); ?>
    <?php else : ?>
        <div class="styled-heading">
            <h3> নোটিশ বোর্ড </h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 responsive-wrap" style="text-align: justify;">
                    <div class="booking-checkbox_wrap mt-4">
                        <div class="customer-review_wrap">
                            <!-- <div class="customer-img">
                            <img src="images/dummy_profilePhoto.jpg" style="width: 250px;" class="img-fluid" alt="#">
                        </div> -->
                            <div class="" style="margin: 0;">
                                <div class="full-post-div">

                                    <?php if ($user['user_role'] == 'admin' || $user['user_role'] == 'editor' || $notice['is_published'] == true) : ?>
                                        <h1 class="post-title"><?php echo $notice['title']; ?></h1>
                                        <hr>
                                        <div class="row">
                                            <div class='col-md-6 publish_date_div'> Published: <?php echo date("j F,Y", strtotime($notice["created_time"])); ?></div>
                                            <?php if (!empty($notice['file'])) : ?>
                                                <div class="col-md-6  download_btn_div">
                                                    <a class="fa fa-download dowload_btn" title="Download File" href='<?php echo BASE_URL . "upload/notices/" . $notice['file']; ?>' download>

                                                    </a>
                                                </div>
                                            <?php endif ?>
                                        </div>

                                        <hr>
                                        <div class="post-body-div">
                                            <?php echo html_entity_decode($notice['description']); ?>
                                        </div>
                                    <?php else : ?>
                                        <h2 class="post-title">Notice was not Found</h2>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>
</section>

<!--============================= FOOTER =============================-->
<?php
include('footer.php')
?>
<!--//END FOOTER -->