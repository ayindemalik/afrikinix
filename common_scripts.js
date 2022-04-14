
$(document).ready(function () {
  console.log("common script js....");

  var yes_no = '';
  // VARIABLES
  var thesis_id, article_id;
  var tatil_kod =0;
  var index = 0
  var count = 0;
  var total_ekList = 0;

  loadArticleInHome();
  loadThesesInHome();
  loadProjectsInHome();
  loadBlogsInHome();

  // $('.view_abstract').click(function(e){
  $(document).on('click', '.close', function(e){
    e.preventDefault();
    $('.modal').modal('hide');
  });

  $(document).on('click', '.hideModal', function(e){
    e.preventDefault();
    $('.modal').modal('hide');
  });

  $(document).on('click', '.view_abstract', function(e){
    e.preventDefault();
    var btn_id = $(this).attr("id");
    thesis_id = btn_id.substr(10);
    console.log( "id => "+thesis_id);

    need_action = "LOAD_THESIS_ABSTRACT";
    console.log("act ->"+need_action);

      // AJAX request
      $.ajax({
          url: 'common_process.php',
          type: 'post',
          data: {need_action: need_action,thesis_id:thesis_id},
          success: function(response){
              console.log(response);
              $('#modalTitle').html("<h4>Thesis's abstract</h4>");
              $('#AbstractModal').modal('show');
              $('#result_data').html(response);
          }
      });
  });

  // $('.view_art_abstract').click(function(e){
  $(document).on('click', '.view_art_abstract', function(e){
    e.preventDefault();
    var btn_id = $(this).attr("id");
    article_id = btn_id.substr(14);
    console.log( "id => "+article_id);

    need_action = "LOAD_ARTICLE_ABSTRACT";
    console.log("act ->"+need_action);

      // AJAX request
      $.ajax({
          url: 'common_process.php',
          type: 'post',
          data: {need_action: need_action,article_id:article_id},
          success: function(response){
              console.log(response);
              $('#modalTitle').html("<h4>Article's abstract</h4>");
              $('#AbstractModal').modal('show');
              $('#result_data').html(response);
          }
      });
  });

  // USER LOGIN
  $(document).on('click', '#userLogin', function(e){
    e.preventDefault();
    console.log('login ...');
    $('#userLoginForm').submit();
  });

  // LOGIN FORM SUBMITING
  $(document).on('submit', '#userLoginForm', function(e){
    e.preventDefault();
    $('#userAccountModal').modal({
  			backdrop: 'static'
  		});

    console.log('form submiting ...');
    let post_url = $(this).attr("action"); //get form action url
  	let request_method = $(this).attr("method"); //get form GET/POST method
  	let form_data = new FormData(this);

    form_data.append("userLogin",1);
    form_data.append("username", $('#login_username').val());
    form_data.append("password", $('#login_password').val());

    console.log(form_data);

    $.ajax({
      type: 'POST',
      url: 'common_process.php',
      data:form_data,
      contentType:false,
      cache:false,
      processData:false,
      success: function(responseData){
        console.log("resp > " + responseData);
        if(responseData != ''){
          if(responseData.includes('success')){
            window.location.reload();
          }
          else{
            $('#accountMessage').html(responseData);
          }
        }

      }
    });
  });

  // USER REGISTRATION
  $(document).on('click', '#userRegBtn', function(e){
    e.preventDefault();
    console.log('signup ...');
    $('#userRegistForm').submit();
  });

  // REGISTRATION FORM SUBMITING
  $(document).on('submit', '#userRegistForm', function(e){
    e.preventDefault();
    $('#userAccountModal').modal({
        backdrop: 'static'
      });

    console.log('form submiting ...');
    // let post_url = $(this).attr("action"); //get form action url
    // let request_method = $(this).attr("method"); //get form GET/POST method
    let form_data = new FormData(this);

    form_data.append("userRegist",1);
    form_data.append("firstname", $('#reg_firstname').val());
    form_data.append("midlename", $('#reg_midlename').val());
    form_data.append("lastname", $('#reg_lastname').val());
    form_data.append("username", $('#reg_username').val());
    form_data.append("email", $('#reg_email').val());
    form_data.append("password", $('#reg_password').val());
    form_data.append("passwordConf", $('#reg_passwordConf').val());

    console.log(form_data);

    $.ajax({
      type: 'POST',
      url: 'common_process.php',
      data:form_data,
      contentType:false,
      cache:false,
      processData:false,
      success: function(responseData){
        console.log("resp > " + responseData);
        if(responseData != ''){
          if(responseData.includes('successfully')){
            // window.location.reload();
            $('#registration').html(responseData);
          }
          else{
            $('#accountMessage').html(responseData);
          }
        }else {
          $('#accountMessage').html(responseData);
        }

      }
    });
  });

  $(document).on('click', '#NO', function(e){
    e.preventDefault();
    yes_no = 'NO';
    console.log(yes_no);
  });

  // ARTICLES
  function loadArticleInHome(){
    action = "LOAD_HOME_LATEST_ARTICLES";
    // console.log("act ->"+action);
    $.ajax({
      url:'common_process.php',
      method:"POST",
      data:{need_action:action},
        success:function(result_data){
          if(result_data != ""){
            $("#articleSide").html(result_data);
          }
          else{
            $("#articleSide").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
          }
        }
    });
  }

  // THESES
  function loadThesesInHome(){
    action = "LOAD_HOME_LATEST_THESES";
    // console.log("act ->"+action);
    $.ajax({
      url:'common_process.php',
      method:"POST",
      data:{need_action:action},
        success:function(result_data){
          if(result_data != ""){
            $("#thesisSide").html(result_data);
          }
          else{
            $("#thesisSide").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
          }
        }
    });
  }

  function loadProjectsInHome(){
    action = "LOAD_HOME_LATEST_PROJECTS";
    // console.log("act ->"+action);
    $.ajax({
      url:'common_process.php',
      method:"POST",
      data:{need_action:action},
        success:function(result_data){
          if(result_data != ""){
            $("#home_projects").html(result_data);
          }
          else{
            $("#home_projects").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
          }
        }
    });
  }

  function loadBlogsInHome(){
    action = "LOAD_HOME_LATEST_BLOGS";
    $.ajax({
      url:'common_process.php',
      method:"POST",
      data:{need_action:action},
        success:function(result_data){
          if(result_data != ""){
            $("#home_blogs").html(result_data);
          }
          else{
            $("#home_blogs").html('<div class="alert alert-warning">Sorry unexpected error occured...</div>');
          }
        }
    });
  }

});
