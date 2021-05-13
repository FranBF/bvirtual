$(function () {
  var rDNI = /^([0-9]{8})*[a-zA-Z]+$/;
  $(".submit").on("click", function (event) {
    var dni = $("#dni").val();
    var rEmail =
      /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var rPhone = /^[679]{1}[0-9]{8}$/;
    var nums = dni.substring(0, dni.length - 1);
    var letra = $("#dni")
      .val()
      .substring(dni.length - 1);
    var let = [
      "T",
      "R",
      "W",
      "A",
      "G",
      "M",
      "Y",
      "F",
      "P",
      "D",
      "X",
      "B",
      "N",
      "J",
      "Z",
      "S",
      "Q",
      "V",
      "H",
      "L",
      "C",
      "K",
      "E",
    ];
    var pos = nums % 23;
    $(".login").each(function () {
      if ($(this).val() == null || $(this).val().trim() == "") {
        event.preventDefault();
        $(this).css("border-bottom", "2px solid red");
      } else {
        if ($("#dni").val().match(rDNI) && letra == let[pos]) {
          if ($("#phone").val().match(rPhone)) {
            if (
              $("#email").val().match(rEmail) &&
              $("#email").val() == $("#repemail").val()
            ) {
            } else {
              event.preventDefault();
              $(this).css("border-bottom", "2px solid red");
            }
          } else {
            event.preventDefault();
            $(this).css("border-bottom", "2px solid red");
          }
        } else {
          event.preventDefault();
          $(this).css("border-bottom", "2px solid red");
        }
      }
    });
  });
  $("button").on("click", function () {
    $.ajax({
      url: "getUser.php",
      success: function (data) {
        $(".rellena").html(data);
      },
    });
  });
});
