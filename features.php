<?php
   require("layout.php");

   ?>

<section class="services-section hk-section ">
        <div class="container">
        <div class="row">
           <div class="col-12 text-center">
              <h5 class="section-title">Features</h5>
              <p class="section-subtitle mt-3"> The web site offers many features, creates easy and safe registration process for visitors </p>
           </div>
           <div class="col-12 col-md-6 col-lg-3">
              <div class="service-box text-center">
                 <div class="service-box-icon"><i class="fas fa-qrcode"></i></div>
                 <h3 class="service-box-title">QR Code</h3>
                 <p class="service-box-desc" style="font-size: medium;">The web site sends a special QR code for each visitor, which differs from others.</p>
                 <a href="#Qr" class="btn btn-main-outline mt-2">Read More <i class="fas fa-chevron-right"></i></a>
              </div>
           </div>
           <div class="col-12 col-md-6 col-lg-3">
              <div class="service-box text-center">
                 <div class="service-box-icon"><i class="fas fa-parking"></i></div>
                 <h3 class="service-box-title">Parking</h3>
                 <p class="service-box-desc"style="font-size: medium;">The visitor can reserve a place for his car in the parking  through the web site.</p>
                 <a href="#parking" class="btn btn-main-outline mt-2">Read More <i class="fas fa-chevron-right"></i></a>
              </div>
           </div>
           <div class="col-12 col-md-6 col-lg-3">
              <div class="service-box text-center">
                 <div class="service-box-icon"><i class="fas fa-hands-wash"></i></div>
                 <h3 class="service-box-title">Sterilization 
                </h3>
                 <p class="service-box-desc" style="font-size: small;">The web site links the visitor with another application that forces him to use the sterilization device located at the entrance</p>
                 <a href="#sterilization" class="btn btn-main-outline mt-2">Read More <i class="fas fa-chevron-right"></i></a>
              </div>
           </div>
           <div class="col-12 col-md-6 col-lg-3">
              <div class="service-box text-center">
                 <div class="service-box-icon"><i class="fas fa-trash-alt"></i></div>
                 <h4 class="service-box-title" >Automatic Data Deletion
                </h4>
                 <p class="service-box-desc" style="font-size: 78%;">Your data will  be automatically deleted from the data base once your visitation ends</p>
                 <a href="#Deletion" class="btn btn-main-outline mt-2">Read More <i class="fas fa-chevron-right"></i></a>
              </div>
           </div>
          
        </div>
        </div>
    </section>

        <section id="Qr" class="feature-box-section hk-section ">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="feature-box-img d-flex align-items-center h-100">
                     <img src="assets/images/qr.svg">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="feature-box">
                     <h3 class="service-box-title">QR Code</h3>

                     <p>
                     The visitor must have a QR code to identify himself as a registerd person. 
                     The visitor shows his QR code to the device, 
                     the device analyzes the QR code to ensure that its presence in the database, 
                     if it was, the visitor can enter the hospital. 
                     Each user using the system shall be uniquely identified by his own QR code.
 
                     </p>
 
                  </div>
               </div>
            </div>
         </div>
      </section>

      
      <section id="parking" class="feature-box-section hk-section ">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="feature-box-img d-flex align-items-center h-100">
                     <img src="assets/images/parking.webp">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="feature-box">
                     <h3 class="service-box-title">Parking</h3>

                     <p>
                        Allowing visitors to pre-register and receive email confirmations with information such as directions, special needs accommodations, parking maps, security requirements, guest Wi-Fi passwords, and more.
 
                     </p>
 
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section id="sterilization" class="feature-box-section hk-section ">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="feature-box-img d-flex align-items-center h-100">
                     <img src="assets/images/ster.jpg">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="feature-box">
                     <h3 class="service-box-title">Sterilization 
                     </h3>

                     <p>
                        There will be an electronic sterilization device on the gate of the health centers, which does not allow anyone to enter except after sterilizing the hands, thus ensuring the safety  of the patient from viruses and their diseases .
 
                     </p>
 
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section id="Deletion" class="feature-box-section hk-section ">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="feature-box-img d-flex align-items-center h-100">
                     <img src="assets/images/delete.jpg">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="feature-box">
                     <h3 class="service-box-title">Automatic Data Deletion

                     </h3>

                     <p>
                        The data will be deleted from the database once a period of time has expired, such as the visit times data will be updated every 24 hours.

 
                     </p>
 
                  </div>
               </div>
            </div>
         </div>
      </section>
