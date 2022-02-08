<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
   <!--font-->
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&display=swap" rel="stylesheet">
   <!--font-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'common/frontend/css/main.css'; ?>">

   <title><?php echo $page_title; ?></title>
</head>

<body>
   <section class="booking_header">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <a href="https://rrkresort.com/"><img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/logo.png" width="180">
               </a>
            </div>
            <div class="col-md-8">
               <ul class="header-list">
                  <li><a href="https://rrkresort.com/">Home</a></li>
                  <li><a href="tel:+91 9330727184" class="callbtn"><i class="fa fa-phone" aria-hidden="true"></i> +91 9330727184</a></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <section class="booking_banner">
      <div class="single-slider owl-carousel">
         <div class="item">
            <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-1.jpg" alt="images">
         </div>
         <div class="item">
            <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-2.jpg" alt="images">
         </div>
         <div class="item">
            <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-3.jpg" alt="images">
         </div>
      </div>
      <div class="booking_form">
         <form action="<?php echo base_url(); ?>check-availability" method="POST" enctype="">
            <ul>
               <li>
                  <label>Check In</label>
                  <input type="date" name="from_date">
               </li>
               <li>
                  <label>Check Out</label>
                  <input type="date" name="to_date">
               </li>
               <li>
                  <label>&nbsp;</label>
                  <input type="submit" name="submit" value="Check Availability" class="wpcf7-form-control has-spinner wpcf7-submit">
               </li>
            </ul>
         </form>
      </div>
   </section>
   <section class="fare-calendarpart">
      <div class="container">
         <div class="fare-calendarslide owl-carousel">

            <?php
            if (!empty($avl_data)) {
               foreach ($avl_data as $key => $value) {
                  if ($value['from_date'] >= DT && $value['to_date'] <= DT) {
            ?>
                     <div class="item">
                        <div class="calendar-day current_date">
                           <h3><?php echo $value['from_date']; ?></h3>
                           <p>From</p>
                           <p><i class="fa fa-inr"></i> <?php echo $value['discounted_rate']; ?><span></span></p>
                        </div>
                     </div>
                  <?php
                  } else {
                  ?>
                     <div class="item">
                        <div class="calendar-day">
                           <h3><?php echo $value['from_date']; ?></h3>
                           <p>From</p>
                           <p><i class="fa fa-inr"></i> <?php echo $value['discounted_rate']; ?><span></span></p>
                        </div>
                     </div>
                  <?php
                  }
                  ?>

            <?php
               }
            }
            ?>

         </div>
      </div>
   </section>
   <section class="room-part">
      <div class="container">
         <div class="row">
            <div class="col-md-9">

               <?php
               if (!empty($room_data)) {
                  foreach ($room_data as $key => $value) {
                     $avl_data = (!empty($value['avl_data'])) ? $value['avl_data'] : [];
                     if ($value['avl_status'] == '1') {
                        //available
               ?>
                        <div class="room-box">
                           <div class="rm-images">
                              <img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="main-image img-fluid" alt="images">
                              <ul class="thumb-img">
                                 <li><a href="#"><img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="img-fluid" alt="images"></a></li>
                                 <li><a href="#"><img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="img-fluid" alt="images"></a></li>
                                 <li><a href="#"><img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="img-fluid" alt="images"></a></li>
                              </ul>
                           </div>
                           <div class="rm-info">
                              <div class="row">
                                 <div class="col-md-7">
                                    <h3><?php echo $value['name']; ?></h3>
                                    <p>Bed type: <?php echo ucfirst($value['bedtype']); ?></p>
                                    <p>Max Room capacity: <?php echo $value['roomcap']; ?></p>
                                    <p>Amenities: <?php echo $value['amenities']; ?></p>
                                 </div>
                                 <div class="col-md-5">
                                    <div class="room-price">
                                       <span>
                                          <p class="save-price"><span>You Save</span> <i class="fa fa-inr"></i><?php echo (!empty($avl_data)) ? ($avl_data['actual_rate'] - $avl_data['discounted_rate']) : '0.00'; ?> <span class="tag"><?php echo (!empty($avl_data)) ? $avl_data['discount_percentage'] : '0.00'; ?> %</span></p>
                                          <p class="strike-price"><strike> <i class="fa fa-inr"></i> <?php echo (!empty($avl_data)) ? $avl_data['actual_rate'] : '0.00'; ?></strike></p>
                                       </span>
                                       <p class="main-price"><i class="fa fa-inr"></i> <?php echo (!empty($avl_data)) ? $avl_data['discounted_rate'] : '0.00'; ?></p>
                                       <p class="per-day-price">per room / night</p>
                                       <p class="per-day-price">Excluding GST</p>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="button-list">
                                       <span> <a href="javascript:volid(0)" data-toggle="modal" data-target="#myModal_<?php echo $key; ?>" class="bl-btn rdmore">Read more</a></span>
                                       <span> <a href="#" class="bl-btn" style="background: #308b1f;">Available</a></span>
                                    </div>
                                 </div>
                              </div>
                              <!-- The Modal -->
                              <div class="modal theme_modal" id="myModal_<?php echo $key; ?>">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <!-- Modal body -->
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="col-md-5">
                                                <div class="single-slider owl-carousel">
                                                   <div class="item">
                                                      <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-1.jpg" alt="images">
                                                   </div>
                                                   <div class="item">
                                                      <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-2.jpg" alt="images">
                                                   </div>
                                                   <div class="item">
                                                      <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-3.jpg" alt="images">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-7">
                                                <h3>DELUXE ROOM</h3>
                                                <p><?php echo $value['roomdesc']; ?></p>
                                                <p><strong>BED TYPE</strong></p>
                                                <p><?php echo ucfirst($value['bedtype']); ?></p>
                                                <p><strong>ROOM VIEW TYPE</strong></p>
                                                <p><?php echo $value['viewtype']; ?></p>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Modal footer -->
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="room-select">
                              <div class="rms-box rm-slcttitle">
                                 <?php echo ($value['withbfast'] == 'yes') ? '<h4>Room With Breakfast</h4>' : 'Room With Breakfast: No'; ?>
                              </div>
                              <div class="rms-box room-guest-details">
                                 <h4>Rooms|Guests</h4>
                                 <p>1 Room(s) <?php echo $value['totaladults']; ?> Adults, <?php echo $value['totalkids']; ?> Kids </p>
                                 <div class="select-box">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <p>No. Of Rooms</p>
                                          <select>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                             <option value="5">5</option>
                                             <option value="6">6</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="multiple-room-wrap">
                                       <div class="row rminfo-box">
                                          <div class="col-sm-12">
                                             <p><span class="room-text">Room1</span></p>
                                          </div>
                                          <div class="col-sm-4">
                                             <label class="label-room-booking">Adults</label>
                                             <select>
                                                <option value="0">Adults</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                             </select>
                                          </div>
                                          <div class="col-sm-4">
                                             <label class="label-room-booking">(5 - 12 yrs)</label>
                                             <select name="">
                                                <option value="0">0</option>
                                             </select>
                                          </div>
                                          <div class="col-sm-4">
                                             <label class="label-room-booking">(0 < 5 yrs)</label>
                                                   <select name="">
                                                      <option value="0">0</option>
                                                   </select>
                                          </div>
                                          <span class="delete-position"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                                       </div>
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <div class="button-list shrtbtn">
                                                <span> <a href="javascript:volid(0)" class="bl-btn cncbtn">Cancel</a></span>
                                                <span> <a href="#" class="bl-btn ylbtn">Confirm</a></span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="rms-box price-small">
                                 <i class="fa fa-inr"></i><?php echo (!empty($avl_data)) ? $avl_data['discounted_rate'] : '0.00'; ?>
                              </div>
                              <div class="rms-box button-list">
                                 <span> <a href="javascrit:void(0)" class="bl-btn ylbtn addrm-btn">Add Rooms</a></span>
                              </div>
                           </div>
                        </div>
                     <?php
                     } else {
                        // not available
                     ?>
                        <div class="room-box">
                           <div class="rm-images">
                              <img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="main-image img-fluid" alt="images">
                              <ul class="thumb-img">
                                 <li><a href="#"><img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="img-fluid" alt="images"></a></li>
                                 <li><a href="#"><img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="img-fluid" alt="images"></a></li>
                                 <li><a href="#"><img src="https://d3ki85qs1zca4t.cloudfront.net/bookingEngine/uploads/1612165760387392.jpg" class="img-fluid" alt="images"></a></li>
                              </ul>
                           </div>
                           <div class="rm-info">
                              <div class="row">
                                 <div class="col-md-7">
                                    <h3><?php echo $value['name']; ?></h3>
                                    <p>Bed type: <?php echo ucfirst($value['bedtype']); ?></p>
                                    <p>Max Room capacity: <?php echo $value['roomcap']; ?></p>
                                    <p>Amenities: <?php echo $value['amenities']; ?></p>
                                 </div>
                                 <div class="col-md-5">
                                    <div class="room-price">
                                       <span>
                                          <p class="save-price"><span>You Save</span> <i class="fa fa-inr"></i><?php echo (!empty($avl_data)) ? ($avl_data['actual_rate'] - $avl_data['discounted_rate']) : '0.00'; ?> <span class="tag"><?php echo (!empty($avl_data)) ? $avl_data['discount_percentage'] : '0.00'; ?> %</span></p>
                                          <p class="strike-price"><strike> <i class="fa fa-inr"></i> <?php echo (!empty($avl_data)) ? $avl_data['actual_rate'] : '0.00'; ?></strike></p>
                                       </span>
                                       <p class="main-price"><i class="fa fa-inr"></i> <?php echo (!empty($avl_data)) ? $avl_data['discounted_rate'] : '0.00'; ?></p>
                                       <p class="per-day-price">per room / night</p>
                                       <p class="per-day-price">Excluding GST</p>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="button-list">
                                       <span> <a href="javascript:volid(0)" data-toggle="modal" data-target="#myModal_<?php echo $key; ?>" class="bl-btn rdmore">Read more</a></span>
                                       <span> <a href="#" class="bl-btn nabtn">Not Available</a></span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                         <!-- The Modal -->
                         <div class="modal theme_modal" id="myModal_<?php echo $key; ?>">
                                 <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                       <!-- Modal body -->
                                       <div class="modal-body">
                                          <div class="row">
                                             <div class="col-md-5">
                                                <div class="single-slider owl-carousel">
                                                   <div class="item">
                                                      <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-1.jpg" alt="images">
                                                   </div>
                                                   <div class="item">
                                                      <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-2.jpg" alt="images">
                                                   </div>
                                                   <div class="item">
                                                      <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-3.jpg" alt="images">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-7">
                                                <h3>DELUXE ROOM</h3>
                                                <p><?php echo $value['roomdesc']; ?></p>
                                                <p><strong>BED TYPE</strong></p>
                                                <p><?php echo ucfirst($value['bedtype']); ?></p>
                                                <p><strong>ROOM VIEW TYPE</strong></p>
                                                <p><?php echo $value['viewtype']; ?></p>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- Modal footer -->
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
               <?php
                     }
                  }
               }
               ?>

            </div>


            <div class="col-md-3">
               <div class="sideadd-part">
                  <img src="https://rrkresort.bookingjini.com/static/media/covid3.2423747a.jpg" alt="images" class="img-fluid">
               </div>
               <div class="booking-summary-box">
                  <div class="day-list">
                     <div class="row">
                        <div class="col m4">
                           <p>20th Jan <span>Check In</span></p>
                        </div>
                        <div class="col m4"><span class="num-day-show flow-text">1<br>Nights</span></div>
                        <div class="col m4">
                           <p>21st Jan <span>Check Out</span></p>
                        </div>
                     </div>
                  </div>
                  <div class="room-summary-box">
                     <span class="roomBtnedit"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                     <p>Super deluxe (CP)</p>
                     <p><span>Rooms: 1, </span><span>Adults: 3, </span><span>Child: 0,</span><span>kids: 0</span></p>
                     <p>Room Price: <i class="fa fa-inr"></i> 5,000</p>
                  </div>
                  <h6>View Breakup</h6>
                  <div id="full-room-pay" class="full-room-pay">
                     <ul class="clearfix">
                        <li>Total Amount</li>
                        <li> <i class="fa fa-inr"></i>5,600</li>
                     </ul>
                  </div>
                  <div class="pay-btn-wrap">
                     <button type="submit" class="cnt-btn clickbtn">Continue</button>
                  </div>
                  <div class="guest-details">
                     <p>Guest Details</p>
                     <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="pill" href="#personal">Personal</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="pill" href="#business">Business</a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div id="personal" class="tab-pane active">
                           <input type="text" placeholder="Name" value="">
                           <input type="email" placeholder="Email Id" value="">
                           <input type="text" placeholder="Mobile Number" value="">
                           <textarea placeholder="Address"></textarea>
                           <select>
                              <option>Select Country</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="China">China</option>
                              <option value="India">India</option>
                              <option value="USA">USA</option>
                           </select>
                           <select>
                              <option>Select State</option>
                              <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                              <option value="Andhra Pradesh">Andhra Pradesh</option>
                              <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                              <option value="Assam">Assam</option>
                              <option value="Bakkhali">Bakkhali</option>
                              <option value="Bareli">Bareli</option>
                              <option value="Bihar">Bihar</option>
                           </select>
                           <select>
                              <option>Select City</option>
                              <input type="text" placeholder="Zip Code" value="">
                           </select>
                           <input type="submit" value="Continue">
                        </div>
                        <div id="business" class="tab-pane fade">
                           <input type="text" placeholder="Name" value="">
                           <input type="email" placeholder="Email Id" value="">
                           <input type="text" placeholder="Mobile Number" value="">
                           <input type="text" placeholder="Company Name" value="">
                           <input type="text" placeholder="GSTIN" value="">
                           <input type="submit" value="Continue">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="rm-tabpart">
      <div class="container">
         <!-- Nav pills -->
         <ul class="nav nav-pills" role="tablist">
            <li class="nav-item">
               <a class="nav-link active" data-toggle="pill" href="#about-hotel">About Hotel</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="pill" href="#policies">Policies</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="pill" href="#hotel-map">Hotel Map</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" data-toggle="pill" href="#addon-services">Addon Services</a>
            </li>
         </ul>
         <!-- Tab panes -->
         <div class="tab-content">
            <div id="about-hotel" class="tab-pane active">
               <div class="tab-banner">
                  <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/banner-3.jpg" alt="images" class="img-fluid">
               </div>
               <h3>RUPASI RUPNARAYAN KUTHI</h3>
               <p>Vill. Orphulli, P.o. Orphulli, P.S.-Bagnan,Howrah</p>
               <p><i class="fa fa-envelope" aria-hidden="true"></i> rohondas12@gmail.com / kolaghatrupasi@gmail.com </p>
               <p><i class="fa fa-phone" aria-hidden="true"></i> +91 9330465660 / +91 9330727184</p>
               <p><strong>Description</strong></p>
               <p>Rupasi Rupnarayan Kuthi in Bganan, sited on the bank of the river Rupnarayan, is a remarkable resort across the state. It is the majestic opportunity to step into a luxury resort that plays the role of host to a number of dignitaries and eminent personalities as well as the common people with better sensitivity. It is no exaggeration to say that it is next to the leader in hospitality.</p>
               <p>Rupasi Rupnarayan Kuthi in Bganan, sited on the bank of the river Rupnarayan, is a remarkable resort across the state. It is the majestic opportunity to step into a luxury resort that plays the role of host to a number of dignitaries and eminent personalities as well as the common people with better sensitivity. It is no exaggeration to say that it is next to the leader in hospitality. </p>
               <p>All the rooms and suites of Rupasi Runarayan Kuthi are a wonderful blend of elegance and modern facilities. It is strategically located in the Howrah district. As it is a flourishing art and heritage area, there are some must-visit places nearby.</p>
               <p><strong>Important Tourist Places</strong></p>
               <p>Khargeswar Temple</p>
               <p>Gopegarh Ecopark</p>
               <p>Jora Masjid</p>
               <p>Rasmancha Temple</p>
               <p>Sarat Chandra Chattopadhyay Kuthi</p>
               <p>Jhargram Raj Palace</p>
               <p><strong>Amenities</strong></p>
               <div class="row">
                  <div class="col-md-6">
                     <h6><strong><i class="fa fa-cutlery" aria-hidden="true"></i> F&B :</strong></h6>
                     <p>Welcome drink, Complimentary Breakfast, Food and beverage outlets, Halal food available, Restaurant</p>
                  </div>
                  <div class="col-md-6">
                     <h6><strong><i class="fa fa-futbol-o" aria-hidden="true"></i> Facility :</strong></h6>
                     <p>Terrace, Multilingulal staff, Swimming Pool, Smoke-free property, Lobby, Meeting rooms, Fire safety compliant, Non-smoking rooms, Wheelchair access, Pool, Parking, Outdoor pool, On-Site parking, Free parking, Gym, 24-hour security</p>
                  </div>
                  <div class="col-md-6">
                     <h6><strong><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Front office :</strong></h6>
                     <p>Contactless checkout, Contactless checkin, Front desk, Express check-out, Express check-in</p>
                  </div>
                  <div class="col-md-6">
                     <h6><strong><i class="fa fa-star" aria-hidden="true"></i> Services :</strong></h6>
                     <p>Complimentary newspaper in lobby, Bell staff, Valet parking, Doctor on call</p>
                  </div>
               </div>
               <div class="details-list">
                  <ul>
                     <li><i class="fa fa-clock-o" aria-hidden="true"></i> Check In : 12:00</li>
                     <li><i class="fa fa-clock-o" aria-hidden="true"></i> Check Out : 10:00</li>
                     <li><i class="fa fa-plane" aria-hidden="true"></i> Netaji Subhash Chandra Bose International Airport (61 K.M)</li>
                     <li><i class="fa fa-bus" aria-hidden="true"></i> Mecheda (13.6 K.M)</li>
                     <li><i class="fa fa-bus" aria-hidden="true"></i> Kolaghat (11 K.M)</li>
                     <li><i class="fa fa-commenting" aria-hidden="true"></i> Feedback Links:</li>
                     <li><i class="fa fa-whatsapp" aria-hidden="true"></i> 9330465660</li>
                  </ul>
               </div>
            </div>
            <div id="policies" class="tab-pane fade">
               <br>
               <h3>Policies</h3>
               <p><strong>Cancellation Policy</strong></p>
               <ol>
                  <li>The refund amount on cancellation on or before 7 days of arrival date is 75%.</li>
                  <li>The refund amount on cancellation on or before 3 days of arrival date is 50%.</li>
                  <li>No refund on cancellation within 3 days of arrival date.</li>
               </ol>
               <p><strong>Child Policy</strong></p>
               <ol>
                  <li>Complimentary up to 6 Years</li>
               </ol>
               <p><strong>Terms and conditions</strong></p>
               <ol>
                  <li>It is mandatory for guests to present valid photo identification at the time of check-in. According to government regulations, a valid Photo ID has to be carried by every person above the age of 18 staying at the hotel.</li>
                  <li>The identification proofs accepted are Driver’s License, Voters Card, Passport. Without a valid ID, the guest will not be allowed to check-in. Note- PAN Cards will not be accepted as valid ID cards.</li>
                  <li>We take at least 14 working days to process refunds. Your bank may debit its own separate charges from refunds made to your credit card or bank account.</li>
                  <li>The standard check-in time is 12:00 PM and the standard check-out time is 11:00 AM. </li>
                  <li>We are pet friendly (terms & conditions apply)</li>
               </ol>
            </div>
            <div id="hotel-map" class="tab-pane fade"><br>
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.8372311272074!2d87.89578461482779!3d22.435151385253647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0299d07a3b715f%3A0x1460996a7d6a7e31!2sRupasi%20Rupnarayan%20Kuthi!5e0!3m2!1sen!2sin!4v1642426202486!5m2!1sen!2sin" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div id="addon-services" class="tab-pane fade">
               <br>
               <p><strong>No Addon Services available!</strong></p>
            </div>
         </div>
      </div>
   </section>
   <section class="footer-part">
      <div class="container">
         <p class="text-center">
            <img src="https://v1.nitrocdn.com/LwrCfqwHSCzbNVKgWmTOCaMbFijMAVnt/assets/static/optimized/rev-3a30274/wp-content/uploads/2021/12/footer-logo.png">
         </p>
         <p class="copyright-text">Copyright 2021 Rupasi Rupnarayan Kuthi | All rights reserved Designed By <a href="">LNSEL</a></p>
      </div>
   </section>

   <script src="<?php echo base_url() . 'common/frontend/js/main.js'; ?>"></script>
</body>

</html>