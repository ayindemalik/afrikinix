<?php include("path.php");?>
<?php include(ROOT_PATH."/app/controllers/common_process.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Afrikinix Articles</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include("assets/includes/head_links.php");?>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages">
    <?php include ROOT_PATH."/Layouts/Master/_top_bar.php"?>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center " style="background: rgba(5, 87, 158, 0.9);">
    <?php include ROOT_PATH."/Layouts/Master/_header.php" ?>
  </header>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.html">Home</a></li>
        </ol>
        <h2>Article's name</h2>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-md-9 pb-5 ">
                <form id="search_product_form" class="" method="post" onsubmit="return false">
                    <div class="input-group ">
                      <div class="input-group">
                        <input type="text" id="article_search" class="form-control"
                          placeholder="Type article name" aria-describedby="basic-addon2" />
                        <div class="input-group-append">
                          <button class="btn btn-warning" type="button"><i class="bi bi-search"></i></button>
                        </div>
                      </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-8 entries" >
            <!-- <div class="sidebar-item recent-posts"> -->

            <article class="entry">
                <div class="artic_thes">
                    <div class="col-md-12" id="artic_thes_result">
                      <div class="section-title pb-2" >
                        <h2>Latest Articles Found</h2>
                      </div>
                      <div class="content" style="height: 720px" >
                        <?php foreach ($articles as $key => $artic){?>
                          <div class="col-md-12 d-flex align-items-stretch mt-4 mt-md-0"
                          data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                              <i class="bi bi-calendar4-week"></i>
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
                                     <a>|<strong>Abstract</strong></a>&nbsp;&nbsp; <i type ="button" class="fas fa-book-open  view_abstract"
                                    id="v_abstract<?php echo $artic['article_id']?>">
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
            </article>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Articles' Main Fields</h3>
              <div class="sidebar-item categories">

                <ul>
                  <?php foreach ($domain_fields as $key => $domain){?>
                    <li><a class="domain_field" id="domainF_<?php echo $domain['domain_id'] ?>"
                       href="#"><?php echo $domain['domain_name'];?> <span>(25)</span></a></li>
                <?php }?>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Related Articles</h3>
              <div class="sidebar-item recent-posts">
                <?php $count=0;
                  foreach ($articles as $key => $artic){
                    if($count<=50){ ?>
                      <a href="article_page.php?art_id=<?php echo $artic['article_id']; ?>"class="mb-5">
                        <div class="post-item clearfix ">
                            <img src="assets/img/blog/blog-recent-2.jpg" alt="">
                            <h4><a href="blog-single.html"><?php echo $artic['article_title'];$count++;?></a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>
                      </a>
                <?php }}?>



              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>

                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ROOT_PATH."/Layouts/Master/_footer.php"?>

  <?php include(ROOT_PATH."/app/includes/modals.php");?>

  <?php include("assets/includes/script_links.php");?>
  <!-- SCRIPT LINKS -->
  <script type="text/javascript" src="common_scripts.js"></script>

  <script type="text/javascript">
   $(document).ready(function () {
       console.log("in artiles....");
     // VARIABLES
     var article_id;
     var index = 0
     var count = 0;
     var action = '';
     var art_input_text = '';

     loadArticles();

     $("#article_search").keyup(function () {
        let searchText = $(this).val();
        console.log("searching....");
        if (searchText != "") {
          $.ajax({
            url: "common_process.php",
            method: "post",
            data: {
              _article_query: searchText,
            },
            success: function (response) {
              console.log(response);
              $("#artic_thes_result").html(response);
            },
          });
        } else {
          $("#artic_thes_result").html("please type a any word in search box");
        }
      });

       // Searching
     $(document).on('input', '#search_article', function(){
       $("#search_article").autocomplete({
         source: "<?php echo BASE_URL.'assets/thesis_search.php'?>",
           select:function(event, ui){
             event.preventDefault();
             var data = ui.item.value;
             $("#search_article").val(ui.item.value);
           }
       });
     });

     $('#find_article').click(function(e){
       event.preventDefault();
       console.log("Call for search");
       art_input_text = $('#search_article').val();
       if(art_input_text =="" || art_input_text ==" "){
         alert("Please enter word for searching...");
         $('#search_article').focus();
         return false;
       }
       action = "SEARCH_ARTICLE";
       $('#search_art_form').submit();
     });

     $(document).on('submit', '#search_art_form', function(event){
         event.preventDefault();
         if(action === "SEARCH_ARTICLE"){

           var post_url;
           var request_method = $(this).attr("method");
           var form_data = new FormData(this);

           form_data.append("need_action",action);
           form_data.append("search_term",art_input_text);

           console.log("needed action->"+action);
           console.log("txt inpt ->"+art_input_text);

           $.ajax({
             url:'common_process.php',
             type:'POST',
             data:form_data,
             contentType: false,
             processData: false,
             success: function(result_data){
               console.log("Result-> "+result_data);
               if(result_data != ""){
                 $("#artic_search_result").html(result_data);
               }
               else{
                 $("#artic_search_result").html('<div class="alert alert-warning">Sorry, No result found or an unexpected error occured in background...</div>');
               }
             }
           })
         }
     });

     $(document).on('click', '.domain_field', function(event){
       var domainF_id = event.target.id;
           domainF_id = this.id;
           console.log("dom id->" + domainF_id);
           domainF_id = domainF_id.substring(8);
           console.log("dom id->" + domainF_id);
           // console.log("dom name->" + $('#domainF_NAme'+domainF_id).text());

           $('#search_result_title').text("Articles realted to * " +$('#domainF_NAme'+domainF_id).text());

           action = "GET_ARTICLE_BY_DOMAIN_FIELD";
           $.ajax({
             url:'common_process.php',
             method:"POST",
             data:{need_action:action,domain_field_id:domainF_id},
             success:function(result_data){
               console.log("Result-> "+result_data);
               if(result_data != ""){
                 if(result_data != ""){
                   $("#artic_thes_result").html("No result found");
                 }
                 $("#artic_thes_result").html(result_data);
               }
               else{
                 $("#artic_thes_result").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
               }
             }
           })
     });

     function loadArticles(){
       action = "LOAD_LATEST_ARTICLES";
       console.log("act ->"+action);
       $.ajax({
         url:'common_process.php',
         method:"POST",
         // data:{need_action:action,domain_field_id:domainF_id},
         data:{need_action:action},
         success:function(result_data){
           console.log("Result-> "+result_data);
           if(result_data != ""){
             // if(result_data != ""){
             //   $("#artic_thes_result").html("No result found");
             // }
             $("#artic_thes_result").html(result_data);
           }
           else{
             $("#artic_thes_result").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
           }
         }
       });
     }
   });
 </script>

</body>

</html>
