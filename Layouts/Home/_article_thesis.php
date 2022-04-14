<section id="services" class="">
      <div class="container" data-aos="fade-up">

        <div class="text-center" >
          <!-- <h2>Articles & Theses</h2> -->
          <h3><strong>Find latest articles & theses uploaded by afrikinix members.</strong></h3>
        </div>

        <div class="row">
          <div class="col-md-6 blog" id="articleSide">
            <div class="section-title pb-2">
              <h2>Articles</h2>
            </div>
            <div class="entry" style="height: 720px; overflow:auto;">
                <div class="artic_thes">
                  <?php foreach ($articles as $key => $artic){?>
                      <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                          <i class="bi bi-newspaper"></i>
                          <h4><a href="article_page.php?art_id=<?php echo $artic['article_id'] ?>">
                            <?php echo $artic['article_title'];?>
                          </a></h4>
                          <p id="abstract_<?php echo $key+1?>">
                            <?php echo html_entity_decode(substr($artic['abstract'], 0, 100));  ?>
                          </p>
                          <div class="entry-meta mt-2">
                            <ul>
                              <li class="d-flex align-items-center">
                                <i class="fa fa-calendar-alt"></i>
                                <?php echo " ".$artic['year'];?></li>
                              <li class="d-flex align-items-center">
                                <i class="fas fa-book-reader"></i>
                                  <?php echo " ".$artic['no_read'];?> reads</li>
                              <li class="d-flex align-items-center">
                                <i class="fas fa-eye"></i><?php echo " ".$artic['no_view']?> views</li>
                              <li class="d-flex align-items-center">
                                 <a>|<strong>Abstract</strong></a>&nbsp;&nbsp;
                                 <i type ="button" class="fas fa-book-open  view_art_abstract"
                                id="v_art_abstract<?php echo $artic['article_id']?>">
                                </i></li>
                            </ul>
                          </div>
                          <div class="">
                             |<b><u>Authors:</u></b><?php echo " ".$artic['authors']?>
                          </div>
                        </div>
                      </div>
                    <?php }?>
                </div>
            </div>
          </div>
          <div class="col-md-6 blog" id="thesisSide">
            <div class="section-title pb-2">
              <h2>Theses</h2>
            </div>
            <div class="entry" style="height: 720px; overflow:auto;">
                <div class="artic_thes">

                  <?php foreach ($theses as $key => $thesis){ ?>
                    <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
                      <div class="icon-box" style="width:100%;">
                        <i class="bi bi-book"></i>
                        <h4><a href="article_page.php?art_id=<?php echo $thesis['thesis_id'] ?>">
                          <?php echo $thesis['thesis_title'];?>
                        </a></h4>
                        <p id="abstract_<?php echo $key+1?>">
                          <?php echo html_entity_decode(substr($thesis['abstract'], 0, 100));  ?>
                        </p>
                        <div class="entry-meta mt-2">
                          <ul>
                            <li class="d-flex align-items-center">
                              <i class="fa fa-calendar-alt"></i>
                              <?php echo " ".$thesis['year'];?></li>
                            <li class="d-flex align-items-center">
                              <i class="fas fa-book-reader"></i>
                                <?php echo " ".$thesis['no_read'];?> reads</li>
                            <li class="d-flex align-items-center">
                              <i class="fas fa-eye"></i><?php echo " ".$thesis['no_view']?> views</li>
                            <li class="d-flex align-items-center">
                               <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button"
                               class="fas fa-book-open  view_abstract"
                              id="v_abstract<?php echo $thesis['thesis_id']?>">
                              </i></li>
                          </ul>
                        </div>
                        <div class="">
                           |<b><u>Authors:</u></b><?php echo " ".$thesis['authors']?>
                        </div>
                      </div>
                    </div>
                  <?php }?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
