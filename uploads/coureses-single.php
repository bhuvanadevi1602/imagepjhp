<!DOCTYPE html>
<html lang="zxx">
    <head>
     <!--================= Meta tag =================-->
        <meta charset="utf-8">
        <title>Single Course | COURSE </title>
<?php
include('header.php');
?>
<?php 
$id=$_GET['id'];
$mail=isset($_COOKIE['email'])?$_COOKIE['email']:"";
$sqlpro="select * from register where email='$mail'";
$exepro=mysqli_query($con,$sqlpro);
$purchase=mysqli_fetch_assoc($exepro);
$mobile=$purchase['mobile'];

$id = $_REQUEST['id'];

mysqli_set_charset($con,'utf8');
  $sql = "SELECT * FROM course WHERE id = $id";
    $result = $con->query($sql);
    $courseTable = $result->fetch_assoc();
    
    $sqlp = "SELECT * FROM buy WHERE email = '$mail' and proid='$id'";
    $resultp = $con->query($sqlp);
    $courseTablep = $resultp->fetch_assoc();
    $no = $resultp->num_rows;
    


?>
<style>

.ak{
    background:#fff;
    color:rgb(42,32,132);
    font-size: 15px !important;
    font-weight: 600 !important;
    border-radius: 30px !important;
    display: inline-block !important;
    padding: 10px 38px !important;
    border: 2px solid rgb(42,32,132) !important;
    transition: all 0.5s ease 0s !important;
}
    .back-courses__single-page .course-single-tab #back-tab-content .back-objectives li {
        float: none !important;
    }

    .back-courses__single-page .course-single-tab #back-tab-content .back-objectives {
        background: #fff !important;
        margin-top: 0px !important;
        padding: 5px !important;
    }

    .ll ul,
    li {
        font-weight: 600;
        color: #020334;
        font-size: 15px !important;
    }
    nav-tabs {
    border-bottom: 1px solid #fff !important;
}
    /*    .back-nav li:before {*/
    /*    content: "";*/
    /*    margin: 0 6px 0 12px;*/
    /*    background: black;*/
    /*    width: 7px;*/
    /*    height: 7px;*/
    /*    border-radius: 50%;*/
    /*    display: inline-block;*/
    /*}*/
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
      $(document).ready(function() {

        $("#payButton").click(function(e) {
          var proid = $('#proid').val();
          var email = $('#email').val();
         var mobile = $('#mobile').val();
         var special = $('#special').val();
         var price = $('#price').val();
         var cost;
         if(special!=0){
             cost = special;
         }
         else{
             cost=price;
         }
      
          var options = {
            "key": "rzp_test_1rKrLzOAE6EOqH", // rzp_live_uSeXyyORiPbfRw your Razorpay Key Id   rzp_live_cyrVEUqtN0pCLq
            "amount": cost * 100, 
            "name": "Blog",
            "description": "Course Purchase",
            "image": "https://freepayper.com/assets/images/Free1.png",
            "handler": function(response) {
              $.ajax({
                url: 'order.php',
                type: 'post',
                dataType: 'json',
                data: {
                        proid:proid,
                        mobile:mobile,
                     razorpay_payment_id: response.razorpay_payment_id,
                          },
                       success: function(data) {
                  if (data.success) {
                     window.location.href = "purchase-course.php";
        
                  }
                },
                error: function (data) {
              //     console.log("Error");
                     window.location.href = "purchase-course.php";
         
 }
              });
            },
            "prefill": {
              "email": email,
              "contact": mobile,
            },
            "theme": {
              "color": "#528FF0"
            }
          };

          var rzp1 = new Razorpay(options);
          rzp1.open();
          e.preventDefault();
        });

      });
    </script>

<!--================= back wrapper Start Here =================-->
<div class="back-wrapper">
    <div class="back-wrapper-inner">
        <!--================= Back Breadcrumbs Section Start Here =================-->
        <div class="back-breadcrumbs back-breadcrumbs-single breadcrumbs-courses__single">
            <div class="breadcrumbs-wrap">
                <!-- <img class="desktop" src="assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs">
                <img class="mobile" src="./admin/uploads/course/<?= $courseTable['image']?>" alt="Breadcrumbs"> -->
                <div class="breadcrumbs-inner">
                    <div class="container">
                     
                    <div class="breadcrumbs-text">
                                    <h1 class="breadcrumbs-title" style="color:#000"><?= $courseTable['title']?></h1>
                                    <div class="back-nav">
                                        <ul>
                                            <li><a href="index.php" style="color:#000">Home</a></li>
                                            <li style="color:#000">Course</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- <div class="breadcrumbs-text text-left">
                            <span class="single-cate"><?= $courseTable['category']?></span>
                            <h1 class="breadcrumbs-title"><?= $courseTable['title']?></h1>
                            <div class="back-nav mt-30">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li>Course</li>
                                    <li><?= $courseTable['coursecode']?></li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!--================= Back Breadcrumbs Section End Here =================-->

        <!--================= Course Single Section Start Here =================-->
        <div class="back__course__area back__course__page_grid back-courses__single-page pt-50 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <!--<ul class="user-section">-->
                        <!--    <li class="user">-->
                        <!--        <span><img src="assets/images/course-single/user.jpg" alt="user"></span>-->
                        <!--        <span>Teacher<em> Elon Gated</em></span>-->
                        <!--    </li>-->
                        <!--    <li>Last Update: <em>July 24, 2022</em></li>-->
                        <!--    <li>Review: -->
                        <!--        <em class="back-ratings"> -->
                        <!--            <i class="icon_star"></i>-->
                        <!--            <i class="icon_star"></i>-->
                        <!--            <i class="icon_star"></i>-->
                        <!--            <i class="icon_star"></i>-->
                        <!--            <i class="icon_star"></i> 4.5-->
                        <!--        </em> -->
                        <!--    </li>-->
                        <!--</ul>-->
                        <div class="image-banner"><img src="./admin/uploads/course/<?= $courseTable['image']?>" alt="user"></div>
                        <div class="course-single-tab">
                            <ul class="nav nav-tabs" style="border-bottom: none !important;" id="back-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="discriptions" data-bs-toggle="tab" href="#discription" role="tab" aria-controls="discription" aria-selected="true" style=" width: 100%;border-radius: 5px;">
                                     Description</a>
                                </li>
                            </ul>
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <a class="nav-link" id="curriculums" data-bs-toggle="tab" href="#curriculum" role="tab" aria-controls="curriculum" aria-selected="false"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Curriculum</a>-->
                            <!--</li>-->

                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <a class="nav-link" id="reviewss" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg> Reviews</a>-->
                            <!--</li>-->
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <a class="nav-link" id="members" data-bs-toggle="tab" href="#member" role="tab" aria-controls="member" aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> Member</a>-->
                            <!--</li>-->

                            <div class="tab-content" id="back-tab-content">
                                <div class="tab-pane fade show active ll back-nav" id="discription" role="tabpanel" aria-labelledby="discription">
                                <?= $courseTable['description']; ?>
                              <!-- <h3>Requirement</h3>
                                    <ul class="back-objectives">

                                        <li>
                                            <h6 style="padding-left: 43px; font-weight: 600;font-size: 15px;"> Any Basic video editing software PC / Mobile app</h6>
                                        </li>
                                        <li>
                                            No experience required
                                        </li>
                                        <li>
                                            Good quality camera (for video shoot only)
                                        </li>
                                        <li>
                                            Cheap lapel mic / noiseless closed room (If required)
                                        </li>

                                    </ul> -->
                                    <!-- <div class="mt-3">
                                        <h3>What you will learn?</h3>
                                        <ul class="back-objectives">

                                            <li>
                                                <h6 style="padding-left: 43px; font-weight: 600;font-size: 15px;"> What are the top video categories to Earn more money from Youtube?</h6>
                                            </li>
                                            <li>
                                                What is a Good Average View Duration on YouTube?
                                            </li>
                                            <li>
                                                How to Increase Average View Duration on YouTube?
                                            </li>
                                            <li>
                                                How to get sponsor ads?
                                            </li>
                                            <li>
                                                How much does sponsors pay YouTubers?</li>
                                            <li>
                                                How To Attract YouTube Sponsorships?</li>
                                        </ul>
                                    </div>

                                    <div class="mt-3">
                                        <h3>Expected monthly earning?</h3>
                                        <ul class="back-objectives">
                                            <li>
                                                <h6 style="padding-left: 43px; font-weight: 600;font-size: 15px;"> Minimum Rs.1 lakh per month</h6>
                                            </li>

                                        </ul>
                                    </div> -->


                                    <!--<div class="back-tag"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg> <a href="#">big data,</a> <a href="#">data,</a> <a href="#">data analysis,</a> <a href="#">data modeling</a></div>-->
                                    <!--<ul class="back-objectives">-->
                                    <!--    <li><h3>Learning Objectives</h3></li>-->
                                    <!--    <li><i class="icon_check"></i> Find a new position involving <br> Data modeling.</li>-->
                                    <!--    <li><i class="icon_check"></i> Expanded responsibilities as part of <br>an existing role.</li>-->
                                    <!--    <li><i class="icon_check"></i> Ready to begin working on real-world <br> data modeling projects.</li>-->
                                    <!--</ul>-->
                                </div>
                                <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum">
                                    <h3>Course Curriculum</h3>
                                    <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.</p>

                                    <div class="single-week">
                                        <ul class="week__top">
                                            <li>Week 1</li>
                                            <li>0/4</li>
                                        </ul>
                                        <h3>Beginners level</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur dolorili adipiscing elit. Felis donec massa aliquam id.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                                        <h3>2 Videos,1 Audio,1 Reading</h3>
                                        <ul class="course__title">
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                                </svg> <b>Video:</b> Greetings and Introductions <em class="questions">2 questions</em> <em><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg> 12 minutes</em></li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                                </svg> <b>Video:</b> Introducing Elizabeth Gerber <em> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg> 26 minutes</em></li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones">
                                                    <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                                                    <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
                                                </svg> <b>Audio:</b> Michael Chapman of IDEO on Interviewing <em><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 +12 16 14"></polyline>
                                                    </svg> 14 minutes</em></li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg> <b>Reading:</b> Slides <em><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg> 19 minutes</em></li>
                                        </ul>
                                    </div>

                                    <div class="single-week">
                                        <ul class="week__top">
                                            <li>Week 2</li>
                                            <li>0/6</li>
                                        </ul>
                                        <h3>Diplomatic Language</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur dolorili adipiscing elit. Felis donec massa aliquam id.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

                                        <h3>1Videos,1 Audio,2 Reading</h3>
                                        <ul class="course__title">
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg> <b>Reading:</b> Collocations For Job Interview <em><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg> 12 minutes</em></li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-video">
                                                    <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                                    <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                                                </svg> <b>Video:</b> Connecting through Technology <em> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg> 26 minutes</em></li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-headphones">
                                                    <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
                                                    <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
                                                </svg> <b>Audio:</b> Strategic Leadership <em class="questions">3 questions</em> <em><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg> 8 minutes</em></li>
                                            <li><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg> <b>Reading:</b> Web Coding Basics <em><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock">
                                                        <circle cx="12" cy="12" r="10"></circle>
                                                        <polyline points="12 6 12 12 16 14"></polyline>
                                                    </svg> 6 minutes</em></li>
                                        </ul>
                                    </div>

                                    <ul class="social-links pt-20">
                                        <li>
                                            <h4>Follow us</h4>
                                        </li>
                                        <li><a href="#"><span aria-hidden="true" class="social_facebook"></span></a></li>
                                        <li><a href="#"><span aria-hidden="true" class="social_twitter"></span></a></li>
                                        <li><a href="#"><span aria-hidden="true" class="social_linkedin"></span></a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews">
                                    <h3>Reviews</h3>
                                    <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit.</p>
                                    <div class="row mt-40">
                                        <div class="col-lg-4">
                                            <div class="five__number">
                                                <em>5</em>
                                                <div class="back-ratings">
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                    <i class="icon_star"></i>
                                                </div>
                                                <h6>4 Ratings</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 pl-40 md-pl-15">
                                            <div class="back-progress-bar md-mt-60">
                                                <div class="skillbar-style2">
                                                    <h3 class="pb-25">Detailed Rating</h3>
                                                    <div class="skillbar green-dark-bg" data-percent="100">
                                                        <span class="skillbar-title">5 stars</span>
                                                        <p class="skillbar-bar"><span class="skill-bar-percent"></span></p>
                                                    </div>
                                                    <div class="skillbar" data-percent="30">
                                                        <span class="skillbar-title">4 stars</span>
                                                        <p class="skillbar-bar"><span class="skill-bar-percent"></span></p>
                                                    </div>
                                                    <div class="skillbar pink-bg" data-percent="0">
                                                        <span class="skillbar-title">3 stars</span>
                                                        <p class="skillbar-bar"></p>
                                                    </div>
                                                    <div class="skillbar sky-bg" data-percent="0">
                                                        <span class="skillbar-title">2 stars</span>
                                                        <p class="skillbar-bar"></p>
                                                    </div>
                                                    <div class="skillbar sky-bg" data-percent="">
                                                        <span class="skillbar-title">1 stars</span>
                                                        <p class="skillbar-bar"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="pt-25 pb-15">2 Comments</h3>
                                    <a href="#" class="post-author">
                                        <div class="avatar">
                                            <img src="assets/images/course-single/user4.jpg" alt="user">
                                        </div>
                                        <div class="info">
                                            <div class="back-ratings">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <p>David blatant have it, standard A bit of how's your father my lady absolutely.</p>
                                            <h4 class="name">Daniel Smith</h4>
                                            <span class="designation">April 16, 2022</span>
                                        </div>
                                    </a>

                                    <a href="#" class="post-author">
                                        <div class="avatar">
                                            <img src="assets/images/course-single/user5.jpg" alt="user">
                                        </div>
                                        <div class="info">
                                            <div class="back-ratings">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <p>David blatant have it, standard A bit of how's your father my lady absolutely.</p>
                                            <h4 class="name">Mark Garcia</h4>
                                            <span class="designation">Jun 24, 2022</span>
                                        </div>
                                    </a>
                                    <div class="blog-form pt-30">
                                        <h3 class="pb-15">Write a Review</h3>
                                        <form id="contact-form">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="back-input">
                                                        <input id="name" type="text" name="name" placeholder="Name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 pdl-5">
                                                    <div class="back-input">
                                                        <input id="email" type="email" name="email" placeholder="Email">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="back-input">
                                                        <input id="subject" type="text" name="subject" placeholder="Subject">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="back-ratings"> <b>Ratings:</b>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                        <i class="icon_star"></i>
                                                    </div>
                                                    <div class="back-textarea">
                                                        <textarea id="message" name="message" placeholder="Message"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <button type="submit" class="back-btn">Submit Review</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <ul class="social-links pt-40">
                                        <li>
                                            <h4>Follow us</h4>
                                        </li>
                                        <li><a href="#"><span aria-hidden="true" class="social_facebook"></span></a></li>
                                        <li><a href="#"><span aria-hidden="true" class="social_twitter"></span></a></li>
                                        <li><a href="#"><span aria-hidden="true" class="social_linkedin"></span></a></li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="member" role="tabpanel" aria-labelledby="member">
                                    <h3>Members Info</h3>
                                    <p>Lorem Ipsn gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auci elit consequat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitaes erat consequat auctor eu in elit.</p>
                                    <div class="member-sec mt-50">
                                        <h3>Total number of students in course: 24</h3>
                                        <ul class="user-section">
                                            <li class="user">
                                                <span><img src="assets/images/course-single/user.jpg" alt="user"></span>
                                                <span><em>Douglas Lyphe</em> Instructor</span>
                                            </li>
                                            <li><em>04</em> Courses</li>
                                            <li><em> 02 </em> Reviews</li>
                                            <li><em> 2.50 </em> Rating</li>
                                        </ul>
                                        <ul class="user-section">
                                            <li class="user">
                                                <span><img src="assets/images/course-single/user2.jpg" alt="user"></span>
                                                <span><em>Jason Response</em> Teacher </span>
                                            </li>
                                            <li><em>07</em> Courses</li>
                                            <li><em> 8 </em> Reviews</li>
                                            <li><em> 3.50 </em> Rating</li>
                                        </ul>
                                        <ul class="user-section">
                                            <li class="user">
                                                <span><img src="assets/images/course-single/user3.jpg" alt="user"></span>
                                                <span><em>Eleanor Fant</em> Associate </span>
                                            </li>
                                            <li><em>02</em> Courses</li>
                                            <li><em> 05 </em> Reviews</li>
                                            <li><em> 4.00 </em> Rating</li>
                                        </ul>
                                    </div>
                                    <ul class="social-links pt-50">
                                        <li>
                                            <h4>Follow us</h4>
                                        </li>
                                        <li><a href="#"><span aria-hidden="true" class="social_facebook"></span></a></li>
                                        <li><a href="#"><span aria-hidden="true" class="social_twitter"></span></a></li>
                                        <li><a href="#"><span aria-hidden="true" class="social_linkedin"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 md-mt-60">
                        <div class="back-sidebar pl-30 md-pl-0">
                            <div class="widget get-back-course" style="text-align:center !important">
                                <!--<h3 class="widget-title">Get the course</h3>-->
                                <!-- <select class="from-control">-->
                                <!--    <option>Course Option</option>-->
                                <!--    <option>Scholarship</option>-->
                                <!--    <option>Bangla</option>-->
                                <!--    <option>Music</option>-->
                                <!--    <option>English</option>-->
                                <!--</select> -->
                                <?php if($courseTable['price']!=0){
                                ?>  
                                <del><b>Price  : ₹ <?= $courseTable['price']?></b></del>
                                <?php } ?>
                                <br/>
                                <?php if($courseTable['special']!=0){
                             ?>
                                <b>Special Price  : ₹ <?= $courseTable['special']?></b>
                              <?php
                                } ?>
                                <br/>
                                <!--<ul class="price">-->
                                <!--    <li>Special Price : <b>₹ <?= $courseTable['price']?></b></li>-->
                                <!--    <li>Price : <b>₹ <?= $courseTable['special']?></b></li>-->
                                    <!-- <li>68% OFF</li> -->
                                <!--</ul>-->
                                <br/>
                                <?php if($mail!="" && $no==0) { ?>
 <form method="POST">
                                   <input type="hidden" id="razorpay_payment_id" name="razorpay_payment_id" value="" />
                                   <input type="hidden" id="mobile" name="mobile" value="<?=$mobile?>" />
                                   <input type="hidden" id="email" name="email" value="<?=$_COOKIE['email']?>" />
                                   <input type="hidden" id="proid" name="proid" value="<?=$id?>" />
                                   <input type="hidden" id="price" name="price" value="<?=$courseTable['price']?>" />
                                   <input type="hidden" id="special" name="special" value="<?=$courseTable['special']?>" />
                                   <input type="hidden" id="proid" name="proid" value="<?=$id?>" />
                                   
                                  <input type="submit" id="payButton" class="cart__btn back-btn" value="Purchase Course" />
          </form>
                                <!--<a href="" id="payButton" class="cart__btn back-btn">Purchase Course</a>-->
                                <?php } else if($mail=="" && $no==0) { ?>
                                <a href="register.php" class="cart__btn back-btn mb-2" style="background:rgb(42,32,132) !important;">Purchase Course</a>
                                <a href="register.php" class="cart__btn back-btn1 ak">View Material</a>
                                <?php } 
                                else if($no>0 && $mail!="") {?>
                                <a href="#" style="pointer-events:none" class="cart__btn back-btn">Already Purchased</a>
                                <a href="material.php?code=<?=$id?>" class="cart__btn back-btn1 ak mt-3">View Material</a>
                                <!--<ul class="price__course">-->
                                <!--    <li><i class="icon_house"></i><b>Instructor:</b> Eleanor Fant</li>-->
                                <!--    <li><i class="icon_book_alt"></i><b>Lectures:</b> 14</li>-->
                                <!--    <li><i class="icon_clock"></i><b>Duration:</b> 6 weeks</li>-->
                                <!--    <li><i class="icon_profile"></i><b>Enrolled:</b> 20 students</li>-->
                                <!--    <li><i class="icon_globe-2"></i><b>Language:</b> English</li>-->
                                <!--</ul>-->
                                <?php } ?>
                            </div>
                            <div class="widget back-post related__courses">
                                <h3 class="widget-title">Related courses</h3>
                                <ul class="related-courses">
                                <?php
                                    $sql1 = "SELECT * FROM course ORDER BY id DESC LIMIT 3";
                                    $result1 = $con->query($sql1);
                                    while($courseTable1 = $result1->fetch_assoc()){
                                ?>
                                    <li>
                                        <a href="coureses-single.php?id=<?= $courseTable1['id'] ?>">
                                            <span class="post-images">
                                                <img src="./admin/uploads/course/<?= $courseTable1['image']?>" alt="post">
                                            </span>
                                        </a>
                                        <div class="titles">
                                            <h6><a href="coureses-single.php?id=<?= $courseTable1['id'] ?>"><?= $courseTable1['title'] ?></a></h6>
                                            <span>₹<?= $courseTable['special']?></</span>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================= Course Single Section End Here =================-->

    </div>
</div>
<!--================= Back Wrapper End Here =================-->






<!--================= Scroll Top Start Here =================-->
<div id="backscrollUp">
    <span aria-hidden="true" class="arrow_carrot-up"></span>
</div>
<!--================= Scroll Top End Here =================-->

<!--================= jquery latest version =================-->
<!--<script src="assets/js/jquery.min.js"></script>-->
<!--================= modernizr js =================-->
<!--<script src="assets/js/modernizr-2.8.3.min.js"></script>-->
<!--================= bootstrap js =================-->
<!--<script src="assets/js/bootstrap.min.js"></script>-->
<!--================= owl.carousel js =================-->
<!--<script src="assets/js/owl.carousel.min.js"></script>-->
<!--================= magnific popup =================-->
<!--<script src="assets/js/jquery.magnific-popup.min.js"></script>-->
<!--================= counter up js =================-->
<!--<script src="assets/js/jquery.counterup.min.js"></script>-->
<!--<script src="assets/js/waypoints.min.js"></script>-->
<!--================= wow js =================-->
<!--<script src="assets/js/wow.min.js"></script>-->
<!--================= isotope.pkgd.min js =================-->
<!--<script src="assets/js/isotope.pkgd.min.js"></script>-->
<!--================= imagesloaded.pkgd.min js =================-->
<!--<script src="assets/js/imagesloaded.pkgd.min.js"></script>-->
<!--================= skill.bars.jquery.js =================-->
<!--<script src="assets/js/skill.bars.jquery.js"></script>-->
<!--================= Back menus js =================-->
<!--<script src="assets/js/back-menus.js"></script>-->
<!--================= plugins js =================-->
<!--<script src="assets/js/plugins.js"></script>-->
<!--================= main js =================-->
<!--<script src="assets/js/main.js"></script>-->


<?php include('footer.php') ?>