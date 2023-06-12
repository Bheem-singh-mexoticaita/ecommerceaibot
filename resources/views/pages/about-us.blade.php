<title>About Us</title>
<x-app-layout>
    <section class="inner_banner bg_style" style="background-image: url({{ asset('frontend/assets/img/about-us.jpg') }});">
        <div class="container">
            <div class="inner_banner_txt">
                <h2>About Us</h2>
            </div>
        </div>
      </section>
      <section class="why_choose_sec about_us py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="choose_img">
                <img src="{{ asset('frontend/assets/img/about-us-img.jpg') }}">
              </div>
            </div>
            <div class="col-md-7">  
              <div class="choose_text title_head mb-0">
                <h2>About  Us</h2>
                <h5>
                  Lorem Ipsum is simply dummy text of the printing and
                  typesetting industry.
                </h5>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors.</p>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="who_we_sec who_we_are py_8">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-8">
                <div class="choose_text title_head mb-0">
                  <h2>Who We Are</h2>
                  <h5>
                    Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry.
                  </h5>
                  <p>
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                    The point of using Lorem Ipsum is that it has a more-or-less
                    normal distribution of letters, as opposed to using 'Content
                    here, content here', making it look like readable English.
                    Many desktop publishing packages and web page editors.
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                    The point of using Lorem Ipsum is that it has a more-or-less
                    normal distribution of letters, as opposed to using 'Content
                    here, content here', making it look like readable English.
                    Many desktop publishing packages and web page editors.
                  </p>
                </div>
              </div>
            <div class="col-md-4">
              <div class="who_img">
                <img src="{{ asset('frontend/assets/img/who_we.png') }}">
              </div>
            </div>
            
          </div>
        </div>
      </section>
      <section class="our_team py_8">
          <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-4 mb-xl-0">
                        <div class="team_card">
                            <div class="team_img">
                                <img src="{{ asset('frontend/assets/img/team-1.jpg') }}" alt="">
                            </div>
                            <div class="team_card_cntnt">
                                <h3>Emily Clark</h3>
                                <p>C.E.O</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-4 mb-xl-0">
                        <div class="team_card">
                            <div class="team_img">
                                <img src="{{ asset('frontend/assets/img/team-2.jpg') }}" alt="">
                            </div>
                            <div class="team_card_cntnt">
                                <h3>Emily Clark</h3>
                                <p>Sales Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mb-4 mb-xl-0">
                        <div class="team_card">
                            <div class="team_img">
                                <img src="{{ asset('frontend/assets/img/team-3.jpg') }}" alt="">
                            </div>
                            <div class="team_card_cntnt">
                                <h3>Emily Clark</h3>
                                <p>Executive</p>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </section>
</x-app-layout>
