$("#DOB").datepicker({
  showOtherMonths: true,
  changeMonth: true,
  changeYear: true,
  yearRange: "-50:+0",
  dateFormat: "dd/mm/yy"
});

$.validate({
  lang: "en"
});

$.validate({
  modules: "security"
});

$.validate({
  modules: "location",
  onModulesLoaded: function() {
    $('input[name="user_country"]').suggestCountry();
    $('input[name="user_home_state"]').suggestState();
  }
});

$.validate({
  modules: "date"
});

$.validate({
  modules: "file"
});
