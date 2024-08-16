<?php
include "./includes/db.php";
include "./includes/head.php";
?>
<section class="py-5 contact">
  <div class="container-fluid">
    <h2 style="text-align: center;">Contact Us</h2>

    <div class="bg-secondary py-2 my-5 rounded-5">
      <div class="container my-5">

        <div class="row">
          <div class="col-md-6 p-5">

            <div class="section-header">
              <h2>Crackers Online</h2>
              <p>We are the leading supplier of a wide range of fireworks, including
                Sparklers,
                Ground Chakkars, Fountains, Sound Crackers, Rockets, and more.</p>
              <h4>Address</h4>
              <p>3/149, South Street, Appayanaickenpatti, Sivakasi Tamilnadu 626127</p>
              <h4>Mobile Number</h4>
              <p>+91 8015027029</p>
              <h4>Email</h4>
              <p>crackersonlineecom@gmail.com</p>
            </div>

          </div>
          <div class="col-md-6 p-5">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control form-control-lg" name="name" id="name"
                  placeholder="Enter Name">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control form-control-lg" name="email" id="email"
                  placeholder="Enter Email">
              </div>
              <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control form-control-lg" name="subject" id="subject" placeholder="Enter Subject">
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control form-control-lg" name="message" id="message" rows="6"
                  placeholder="Your Message"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>

            </form>

          </div>

        </div>

      </div>
    </div>

  </div>
</section>


<!-- </div> -->
<div class="col-md-12">
  <div class="map-responsive">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3937.4230860492403!2d77.67109177406972!3d9.295727484758727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zOcKwMTcnNDQuNiJOIDc3wrA0MCcyNS4yIkU!5e0!3m2!1sen!2sin!4v1722865319697!5m2!1sen!2sin"
      width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
      tabindex="0"></iframe>
  </div>
</div>

<?php
include "./includes/footer.php";
?>