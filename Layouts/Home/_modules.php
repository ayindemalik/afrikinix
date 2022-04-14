
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-newspaper"></i><span><?php echo count(selectAll("articles"))?></span></div>
              <h4 class="title"><a href="">Articles</a></h4>
              <p class="description">Afica related Articles are shared through this platform </p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-book"></i><span><?php echo count(selectAll("theses"))?></span></div>
              <h4 class="title"><a href="">Theses</a></h4>
              <p class="description">Theses develped by african students ans accademics arround the world</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-speedometer"></i><span><?php echo count(selectAll("projects"))?></span></div>
              <h4 class="title"><a href="">Projects</a></h4>
              <p class="description">Final and implementable projects</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-journal-bookmark"></i><span><?php echo count(selectAll("blog_posts"))?></span></div>
              <h4 class="title"><a href="">Blogs</a></h4>
              <p class="description">Educational and professional blogs.</p>
            </div>
          </div>

        </div>

      </div>
    </section>
