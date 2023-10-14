@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')

<section class="py-5 mb-5" style="background: url(images/Banner/background-pattern.png);">
    <div class="container-fluid">
      <div class="d-flex justify-content-between">
        <h1 class="page-title pb-2">Contact info</h1>
        <nav class="breadcrumb fs-6">
          <a class="breadcrumb-item nav-link" href="#">Home</a>
          <a class="breadcrumb-item nav-link" href="#">Pages</a>
          <span class="breadcrumb-item active" aria-current="page">Contact info</span>
        </nav>
      </div>
    </div>
  </section>

  <section class="contact-us py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="contact-info col-lg-6 pb-3">
          <div class="page-content d-flex flex-wrap">
            <div class="col-lg-6 col-sm-12">
              <div class="content-box text-dark pe-4 mb-5">
                <h3 class="card-title">Office</h3>
                <div class="contact-address pt-3">
                  <p>Bashundhara R/A</p>
                </div>
                <div class="contact-number">
                  <p>
                    <a href="#">01619996782</a>
                  </p>
                  <p>
                    <a href="#">01627199815</a>
                  </p>
                </div>
                <div class="email-address">
                  <p>
                    <a href="#">zantechbd@gmail.com</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="inquiry-item col-lg-6">
          <div class="bg-light p-5 rounded-5">
            <h2 class="display-7 text-dark">Get in Touch</h2>
            <p>Use the form below to get in touch with us.</p>
            <form id="form" class="form-group flex-wrap">
              <div class="form-input col-lg-12 d-flex mb-3">
                <input type="text" name="email" placeholder="Write Your Name Here" class="form-control ps-3 me-3">
                <input type="text" name="email" placeholder="Write Your Email Here" class="form-control ps-3">
              </div>
              <div class="col-lg-12 mb-3">
                <input type="text" name="email" placeholder="Phone Number" class="form-control ps-3">
              </div>
              <div class="col-lg-12 mb-3">
                <input type="text" name="email" placeholder="Write Your Subject Here" class="form-control ps-3">
              </div>
              <div class="col-lg-12 mb-3">
                <textarea placeholder="Write Your Message Here" class="form-control ps-3" style="height:150px;"></textarea>
              </div>
            </form>
            <div class="d-grid">
              <button class="btn btn-primary btn-lg text-uppercase btn-rounded-none">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@include('dashboard.footer')
