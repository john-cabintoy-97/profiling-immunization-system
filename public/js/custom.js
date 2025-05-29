new WOW().init();
let users_ctrl_login = document.querySelector("#users_hide_login");
let users_ctrl_register = document.querySelector("#users_hide_register");
let register_hide = document.querySelector(".register_hide");
let login_hide = document.querySelector(".login_hide");
let btn_form_one_edit = document.querySelector("#form_one_btn_edit");
let form_two_btn_edit = document.querySelector("#form_two_btn_edit");
let form_three_btn_edit = document.querySelector("#form_three_btn_edit");
let form_four_btn_edit = document.querySelector("#form_four_btn_edit");

let key = 1001;
let storeItem = localStorage.getItem(key);

let next_btn = document.querySelector(".next-fieldset");
let previous_btn = document.querySelector(".previous-fieldset");

if (users_ctrl_login) {
  users_ctrl_login.addEventListener("click", () => {
    if (users_ctrl_login.innerText == "Create an Account!") {
      register_hide.style = "display:block";
      login_hide.style = "display:none";
    }
  });
}
if (users_ctrl_register) {
  users_ctrl_register.addEventListener("click", () => {
    if (users_ctrl_register.innerText == "Already have an account? Login!") {
      register_hide.style = "display:none";
      login_hide.style = "display:block";
    }
  });
}

// edit form button event
if (btn_form_one_edit) {
  btn_form_one_edit.addEventListener("click", (e) => {
    e.preventDefault();

    let form = document.querySelector(".form_one");
    alertify
      .confirm(
        "",
        "Sigurado ka bang gusto mong i-edit ang form na ito?",
        function () {
          form["save"].style = "display: block";
          form["edit"].style = "display: none";

          form["fname"].disabled = false;
          form["lname"].disabled = false;
          form["mname"].disabled = false;
          form["gender"].disabled = false;
          form["bdate"].disabled = false;
          form["mothersname"].disabled = false;
          form["address"].disabled = false;
          form["facilitycode"].disabled = false;
          form["sestatus"].disabled = false;
          form["first_time"].disabled = false;
          form["delivery"].disabled = false;

          next_btn.disabled = true;
        },
        function () {
          form["save"].style = "display: none";
          form["edit"].style = "display: block";

          form["fname"].disabled = true;
          form["lname"].disabled = true;
          form["mname"].disabled = true;
          form["gender"].disabled = true;
          form["bdate"].disabled = true;
          form["mothersname"].disabled = true;
          form["address"].disabled = true;
          form["facilitycode"].disabled = true;
          form["sestatus"].disabled = true;
          form["first_time"].disabled = true;
          form["delivery"].disabled = true;
        }
      )
      .set("labels", { ok: "Oo", cancel: "Hindi" });
  });
}

if (form_two_btn_edit) {
  form_two_btn_edit.addEventListener("click", (e) => {
    e.preventDefault();

    let form = document.querySelector(".form_two");
    alertify
      .confirm(
        "",
        "Sigurado ka bang gusto mong i-edit ang form na ito?",
        function () {
          form["save"].style = "display: block";
          form["edit"].style = "display: none";

          form["length_birth"].disabled = false;
          form["weight_birth"].disabled = false;
          form["weight_birth_status"].disabled = false;
          form["breast_feeding"].disabled = false;
          form["bcg"].disabled = false;
          form["bbd"].disabled = false;
          form["nutrition_age_months"].disabled = false;
          form["nutrition_length"].disabled = false;
          form["nutrition_length_date"].disabled = false;
          form["nutrition_weight"].disabled = false;
          form["nutrition_weight_date"].disabled = false;
          form["nutrition_status"].disabled = false;
          form["low_birth_first_month"].disabled = false;
          form["low_birth_second_month"].disabled = false;
          form["low_birth_third_month"].disabled = false;
          form["immunization_first_dose"].disabled = false;
          form["immunization_second_dose"].disabled = false;
          form["immunization_third_dose"].disabled = false;

          document.querySelector(".previous_two_btn").disabled = true;
          document.querySelector(".next_two_btn").disabled = true;
        },
        function () {
          form["save"].style = "display: none";
          form["edit"].style = "display: block";

          form["length_birth"].disabled = true;
          form["weight_birth"].disabled = true;
          form["weight_birth_status"].disabled = true;
          form["breast_feeding"].disabled = true;
          form["bcg"].disabled = true;
          form["bbd"].disabled = true;
          form["nutrition_age_months"].disabled = true;
          form["nutrition_length"].disabled = true;
          form["nutrition_length_date"].disabled = true;
          form["nutrition_weight"].disabled = true;
          form["nutrition_weight_date"].disabled = true;
          form["nutrition_status"].disabled = true;
          form["low_birth_first_month"].disabled = true;
          form["low_birth_second_month"].disabled = true;
          form["low_birth_third_month"].disabled = true;
          form["immunization_first_dose"].disabled = true;
          form["immunization_second_dose"].disabled = true;
          form["immunization_third_dose"].disabled = true;
        }
      )
      .set("labels", { ok: "Oo", cancel: "Hindi" });
  });
}

if (form_three_btn_edit) {
  form_three_btn_edit.addEventListener("click", (e) => {
 
    let form = document.querySelector(".form_three");
    alertify
      .confirm(
        "",
        "Sigurado ka bang gusto mong i-edit ang form na ito?",
        function () {
          form["save"].style = "display: block";
          form["edit"].style = "display: none";

          form["opv_first_dose"].disabled = false;
          form["opv_second_dose"].disabled = false;
          form["opv_third_dose"].disabled = false;
          form["pcv_first_dose"].disabled = false;
          form["pcv_second_dose"].disabled = false;
          form["pcv_third_dose"].disabled = false;
          form["ipv_third_dose"].disabled = false;
          form["exlusive_breastfed_one_month"].disabled = false;
          form["exlusive_breastfed_one_month_date"].disabled = false;
          form["exlusive_breastfed_two_month"].disabled = false;
          form["exlusive_breastfed_two_month_date"].disabled = false;
          form["exlusive_breastfed_three_month"].disabled = false;
          form["exlusive_breastfed_three_month_date"].disabled = false;
          form["exlusive_breastfed_four_month"].disabled = false;
          form["exlusive_breastfed_four_month_date"].disabled = false;
          form["nutrition_age_month"].disabled = false;
          form["nutrition_length_month"].disabled = false;
          form["nutrition_weight_month"].disabled = false;
          form["nutrition_status_month"].disabled = false;
          // form["exclusive_breastfeeding_option"].disabled = false;
          // form["exclusive_breastfeeding_date"].disabled = false;

          document.querySelector(".previous_three_btn").disabled = true;
          document.querySelector(".next_three_btn").disabled = true;
        },
        function () {
          form["save"].style = "display: none";
          form["edit"].style = "display: block";

          form["opv_first_dose"].disabled = true;
          form["opv_second_dose"].disabled = true;
          form["opv_third_dose"].disabled = true;
          form["pcv_first_dose"].disabled = true;
          form["pcv_second_dose"].disabled = true;
          form["pcv_third_dose"].disabled = true;
          form["ipv_third_dose"].disabled = true;
          form["exlusive_breastfed_one_month"].disabled = true;
          form["exlusive_breastfed_one_month_date"].disabled = true;
          form["exlusive_breastfed_two_month"].disabled = true;
          form["exlusive_breastfed_two_month_date"].disabled = true;
          form["exlusive_breastfed_three_month"].disabled = true;
          form["exlusive_breastfed_three_month_date"].disabled = true;
          form["exlusive_breastfed_four_month"].disabled = true;
          form["exlusive_breastfed_four_month_date"].disabled = true;
          form["nutrition_age_month"].disabled = true;
          form["nutrition_length_month"].disabled = true;
          form["nutrition_weight_month"].disabled = true;
          form["nutrition_status_month"].disabled = true;
          // form["exclusive_breastfeeding_option"].disabled = true;
          // form["exclusive_breastfeeding_date"].disabled = true;
        }
      )
      .set("labels", { ok: "Oo", cancel: "Hindi" });
  });
}

if(form_four_btn_edit){
  form_four_btn_edit.addEventListener('click', (e)=>{
    e.preventDefault();
    let form = document.querySelector(".form_four");
    alertify
      .confirm(
        "",
        "Sigurado ka bang gusto mong i-edit ang form na ito?",
        function () {
          form["save"].style = "display: block";
          form["edit"].style = "display: none";

          form["feeding_six_months"].disabled = false;
          form["feeding_six_months_duration"].disabled = false;
          form["vitamin_a_date"].disabled = false;
          form["mnp_date"].disabled = false;
          form["mmr_date_dose_one"].disabled = false;
          form["nutrional_age_months"].disabled = false;
          form["nutrional_length"].disabled = false;
          form["nutrional_weight"].disabled = false;
          form["nutritional_status"].disabled = false;
          form["mmr_date_dose_twi"].disabled = false;
          form["fic_date"].disabled = false;
          form["remarks"].disabled = false;

          document.querySelector(".previous_four_btn").disabled = true;
          
        },
        function () {
          form["save"].style = "display: none";
          form["edit"].style = "display: block";

          form["feeding_six_months"].disabled = true;
          form["feeding_six_months_duration"].disabled = true;
          form["vitamin_a_date"].disabled = true;
          form["mnp_date"].disabled = true;
          form["mmr_date_dose_one"].disabled = true;
          form["nutrional_age_months"].disabled = true;
          form["nutrional_length"].disabled = true;
          form["nutrional_weight"].disabled = true;
          form["nutritional_status"].disabled = true;
          form["mmr_date_dose_twi"].disabled = true;
          form["fic_date"].disabled = true;
          form["remarks"].disabled = true;

        
        }
      )
      .set("labels", { ok: "Oo", cancel: "Hindi" });
  })
}

let view_enrolled_btn_edit = document.querySelector('#view_enrolled_btn_edit');
if(view_enrolled_btn_edit){
  view_enrolled_btn_edit.addEventListener('click', (e)=>{
    e.preventDefault();
    let form = document.querySelector(".enrolled_view_form");
    alertify
      .confirm(
        "",
        "Sigurado ka bang gusto mong i-edit ang form na ito?",
        function () {
          
          form["save"].style = "display: block";
          form["edit"].style = "display: none";

          form["lname"].disabled = false;
          form["fname"].disabled = false;
          form["mname"].disabled = false;
          form["gender"].disabled = false;
          form["bdate"].disabled = false;
          form["birthplace"].disabled = false;
          form["bloodtype"].disabled = false;
          form["spousename"].disabled = false;
          form["civilstatus"].disabled = false;
          form["educationalattainment"].disabled = false;
          form["employmentstatus"].disabled = false;
          form["familymember"].disabled = false;
          form["facilitycode"].disabled = false;
          form["suffixname"].disabled = false;
          form["contactnumber"].disabled = false;
          form["mothersname"].disabled = false;
          form["residentialAddress"].disabled = false;
         
          form["facility_no"].disabled = false;
        
          form["statustype"].disabled = false;
          form["phealthno"].disabled = false;
          form["membercategory"].disabled = false;

          document.querySelector('#psbmember1').disabled = false;
          document.querySelector('#psbmember2').disabled = false;

          document.querySelector('#phmember1').disabled = false;
          document.querySelector('#phmember2').disabled = false;

          document.querySelector('#fourpsmember1').disabled = false;
          document.querySelector('#fourpsmember2').disabled = false;

          document.querySelector('#dswdnths1').disabled = false;
          document.querySelector('#dswdnths2').disabled = false;
        },
        function () {
         
        }
      )
      .set("labels", { ok: "Oo", cancel: "Hindi" });
  })
}

let view_individual_btn_edit = document.querySelector('#view_individual_btn_edit');
if(view_individual_btn_edit){
  view_individual_btn_edit.addEventListener('click', (e)=>{
    e.preventDefault();
    let form = document.querySelector(".individual_view_form");
    alertify
      .confirm(
        "",
        "Sigurado ka bang gusto mong i-edit ang form na ito?",
        function () {
         
          form["save"].style = "display: block";
          form["edit"].style = "display: none";

          // form["lname"].disabled = false;
          // form["fname"].disabled = false;
          // form["mname"].disabled = false;
          // form["suffix"].disabled = false;
          form["age"].disabled = false;
          // form["address"].disabled = false;
          form["modeoftransaction"].disabled = false;
          form["dateofconsultation"].disabled = false;
          form["consultationtime"].disabled = false;
          form["bloodpressure"].disabled = false;
          form["temperature"].disabled = false;
          form["height"].disabled = false;
          form["weight"].disabled = false;
          form["nameattendingprovider"].disabled = false;
          form["natureofvisit"].disabled = false;
          form["typeofconsultationpurposeofvisit"].disabled = false;
          form["refferedfrom"].disabled = false;
         
          form["refferedto"].disabled = false;
        
          form["reasonforreferral"].disabled = false;
          form["refferedby"].disabled = false;
          form["cheifcomplaints"].disabled = false;

          form["diagnosis"].disabled = false;
          form["medicaltreatment"].disabled = false;
          form["nameofhealthprovider"].disabled = false;
          form["labfindingsimpression"].disabled = false;
          form["performedlabtest"].disabled = false;
          
        },
        function () {
         
        }
      )
      .set("labels", { ok: "Oo", cancel: "Hindi" });
  })
}
// JQUERY
$(document).ready(function () {
  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;

  $(".next-fieldset").click(function () {
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    localStorage.setItem(key, "1");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate(
      { opacity: 0 },
      {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            display: "none",
            position: "relative",
          });
          next_fs.css({ opacity: opacity });
        },
        duration: 600,
      }
    );
  });

  $(".previous-fieldset").click(function () {
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    localStorage.setItem(key, "2");
    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate(
      { opacity: 0 },
      {
        step: function (now) {
          // for making fielset appear animation
          opacity = 1 - now;

          current_fs.css({
            display: "none",
            position: "relative",
          });
          previous_fs.css({ opacity: opacity });
        },
        duration: 600,
      }
    );
  });
});

// Password hide/show toggle
$(document).ready(function(){
  $("#show_hide_password span").on('click', function(event) {
      if($('#show_hide_password input').attr("type") == "text"){
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass( "fa-eye-slash" );
          $('#show_hide_password i').removeClass( "fa-eye" );
      }else if($('#show_hide_password input').attr("type") == "password"){
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass( "fa-eye-slash" );
          $('#show_hide_password i').addClass( "fa-eye" );
      }
   });
   $("#show_hide_password1 span").on('click', function(event) {
    if($('#show_hide_password1 input').attr("type") == "text"){
        $('#show_hide_password1 input').attr('type', 'password');
        $('#show_hide_password1 i').addClass( "fa-eye-slash" );
        $('#show_hide_password1 i').removeClass( "fa-eye" );
    }else if($('#show_hide_password1 input').attr("type") == "password"){
        $('#show_hide_password1 input').attr('type', 'text');
        $('#show_hide_password1 i').removeClass( "fa-eye-slash" );
        $('#show_hide_password1 i').addClass( "fa-eye" );
    }
 });
   
});


var Example = {};

Example._checkStrength = function () {
  $(this).passwordStrengthMeter('check');
}

Example.checkStrength = _.debounce(Example._checkStrength, 300);

$(function() {
  var $strength_meter = $('.js-strength-meter');


  /**
   * You can pass a function to check again your custom values
   *
   * @param  {String} password
   * @return {Boolean} valid
   */
  function app_requirements(password) {
    var username = 'andresgutgon'
      , name = 'Andrés'
      , lastname = 'Gutiérrez'
      , email = 'foo@bar.com';

    if (password === username || password === name || password === lastname || password === email) {
      return false;
    }

    return true
  }

  // Plugin initialization
  $('.js-password-input').passwordStrengthMeter({
    strength_meter: $strength_meter
  , options: {
    app_requirements: app_requirements
  }
  });

  $(document).on('keydown', '.js-password-input', Example.checkStrength);
});


$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


