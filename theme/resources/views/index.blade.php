@extends('master')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">We offer modern solutions for growing your business</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">We are team of talented designers making websites with
                    Bootstrap</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a href="#about"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Get Started</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('img/hero-img.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        @foreach($data as $row)
        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h3>{{$row->title}}</h3>
                        <h2>{{$row->body}}</h2>
                        <p>
                            {{$row->description}}
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="#"
                                class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('img/'.$row->image) }}" class="img-fluid" alt="">
                </div>

            </div>
        </div>
        @endforeach
    </section><!-- End About Section -->

    <!-- ======= Values Section ======= -->
    <section id="values" class="values">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Our Values</h2>
                <p>Odit est perspiciatis laborum et dicta</p>
            </header>

            <div class="row">
                @foreach($ourvalue as $row)
                <div class="col-lg-4">
                    <div class="box" data-aos="fade-up" data-aos-delay="200">

                        <img src="{{ asset('img/'.$row->image)}}" class="img-fluid" alt="">
                        <h3>{{$row->body}}</h3>
                        <p>{{$row->description}}</p>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </section><!-- End Values Section -->


    <!-- ======= Features Section ======= -->
    <section id="features" class="features">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Features</h2>
                <p>Laboriosam et omnis fuga quis dolor direda fara</p>
            </header>

            <div class="row">

                <div class="col-lg-6">

                    <img src=" {{asset('img/features.png')}}" class="img-fluid" alt="">
                </div>

                <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">
                        @foreach($feature as $row)
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>{{$row->body}}</h3>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>

            </div> <!-- / row -->


            <!-- Feature Icons -->

        </div>

    </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h2>Services</h2>
                <p>Veritatis et dolores facere numquam et praesentium</p>
            </header>

            <div class="row gy-4">
                @foreach($service as $row)

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-box blue">
                        <i class="ri-discuss-line icon"></i>
                        <h3>{{$row->body}}</h3>
                        <p>{{$row->description}}</p>
                        <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach

            </div>

        </div>

    </section><!-- End Services Section -->
    <section id="pricing" class="pricing">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Pricing</h2>
    <p>Check our Pricing</p>
  </header>

  <div class="row gy-4" data-aos="fade-left">
@foreach($price as $prices)
    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
      <div class="box">
        <h3 style="color: #07d5c0;">{{$prices->plan}}</h3>
        <div class="price"><sup>$</sup>{{$prices->price}}<span> / mo</span></div>
        <img src="{{ asset('img/'.$prices->image)}}" class="img-fluid" alt="">
        <ul>
          <li>Aida dere</li>
          <li>Nec feugiat nisl</li>
          <li>Nulla at volutpat dola</li>
          <li class="na">Pharetra massa</li>
          <li class="na">Massa ultricies mi</li>
        </ul>
        <a href="#" class="btn-buy">Buy Now</a>
      </div>
    </div>

@endforeach
  </div>

</div>

</section><!-- End Pricing Section -->


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Portfolio</h2>
          <p>Check our latest work</p>
        </header>    
        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach($portfolio as $portfolios)
          <div class="col-lg-4 col-md-6 portfolio-item "class="p-5">
            <div class="portfolio-wrap">
              <img src="{{asset('img/'.$portfolios->image)}}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <a href="{{asset('img/'.$portfolios->image)}}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i class="bi bi-plus"></i></a>
                  <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>

    </section><!-- End Portfolio Section -->
<section id="team" class="team">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Team</h2>
    <p>Our hard working team</p>
  </header>

  <div class="row gy-4">
@foreach($team as $teams)
    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
      <div class="member">
        <div class="member-img">
          <img src="{{ asset('img/'.$teams->image)}}" class="img-fluid" alt="">
          <div class="social">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="member-info">
          <h4>{{$teams->title}}</h4>
          <span>{{$teams->body}}</span>
          <p>{{$teams->description}}</p>
        </div>
      </div>
      
    </div>
    @endforeach
   

  </div>

</div>

</section><!-- End Team Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Our Clients</h2>
    <p>Temporibus omnis officia</p>
  </header>

  <div class="clients-slider swiper-container">
    <div class="swiper-wrapper align-items-center">
    @foreach($client as $clients)
      <div class="swiper-slide"><img src=" {{asset('img/'.$clients->image)}}" class="img-fluid" alt=""></div>
      @endforeach
    </div>
   
    <div class="swiper-pagination"></div>
  </div>
 
</div>

</section><!-- End Clients Section -->
<section id="recent-blog-posts" class="recent-blog-posts">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Blog</h2>
          <p>Recent posts form our Blog</p>
        </header>

        <div class="row">
@foreach ($blog as $blogs)
          <div class="col-lg-4">
            <div class="post-box">
              <div class="post-img"><img src="{{asset('img/'.$blogs->image)}}" class="img-fluid" alt=""></div>
              <span class="post-date">{{$blogs->date}}</span>
              <h3 class="post-title">{{$blogs->title}}</h3>
              <a href="blog-singe.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

         @endforeach

        </div>

      </div>

    </section><!-- End Recent Blog Posts Section -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Contact</h2>
    <p>Contact Us</p>
  </header>

  <div class="row gy-4">

    <div class="col-lg-6">

      <div class="row gy-4">
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-geo-alt"></i>
            <h3>Address</h3>
            <p>A108 Adam Street,<br>New York, NY 535022</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-telephone"></i>
            <h3>Call Us</h3>
            <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-envelope"></i>
            <h3>Email Us</h3>
            <p>info@example.com<br>contact@example.com</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info-box">
            <i class="bi bi-clock"></i>
            <h3>Open Hours</h3>
            <p>Monday - Friday<br>9:00AM - 05:00PM</p>
          </div>
        </div>
      </div>

    </div>

    <div class="col-lg-6">
      <form id="studentForm">
      @csrf
        <div class="row gy-4">

          <div class="col-md-6">
            <input type="text" id="name" class="form-control"  placeholder="Your Name" >
            <span class="text-danger" id="name-error"></span>
          </div>

          <div class="col-md-6 ">
            <input type="email" class="form-control " id="email" placeholder="Your Email" >
            <span class="text-danger" id="email-error"></span>
          </div>

          <div class="col-md-12">
            <input type="text" class="form-control " id="subject" placeholder="Subject" >
            <span class="text-danger" id="subject-error"></span>
          </div></br>

          <div class="col-md-12">
            <textarea class="form-control" id="message" rows="6" placeholder="Message" ></textarea>
            <span class="text-danger" id="message-error"></span>
          </div><br><br>

          <div class="col-md-12 text-center">
            

            <button type="submit" class="btn btn-info btn-block">Send Message</button>
          </div>

        </div>
      </form>

    </div>

  </div>

</div>

</section><!-- End Contact Section -->
</main><!-- End #main -->

<script>
    $("#studentForm").submit(function (e) {

  
        e.preventDefault();
        $('#name-error').text('');
        $('#email-error').text('');
        $('#subject-error').text('');
        $('#message-error').text('');
        

        let name = $("#name").val();
        let email = $("#email").val();
        let subject = $("#subject").val();
        let message = $("#message").val();
        let _token = $("input[name=_token]").val();
        
        $.ajax({

            url: "{{route('contact')}}",
            type: "POST",

            data: {

                name: name,
                email: email,
                subject: subject,
                message: message,
                _token: _token,

            },

            
            success: function (response) {

                if (response) {
                  $("#studentForm")[0].reset();
                    swal("Data is inserted successfully", {

                        button: "ok",

                    });
                }

            },

            error: function(response) {
              $('#name-error').text(response.responseJSON.errors.name);
              $('#email-error').text(response.responseJSON.errors.email);
              $('#subject-error').text(response.responseJSON.errors.subject);
             
              $('#message-error').text(response.responseJSON.errors.message);
          }
        });

    });
</script>

@endsection
