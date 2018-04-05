$(document).ready(function () {

  $("#formtaolopmonhoc").on("submit", function (e) {
    e.preventDefault();

    var idlopmonhoc = $("input[name=idlophoc]").val();
    var mon = $("#selectmon")
      .find(":selected")
      .attr("IdMon");
    console.log(idlopmonhoc + "  " + mon);

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      type: "POST",
      url: "/ajaxthemmonhoc",
      data: {
        IdLopMonHoc: idlopmonhoc,
        IdMon: mon
      },
      success: function (html) {
        toastr.success(
          `Thêm Thành Công Lớp Môn Học Có Id là: ${idlopmonhoc} `, {
            timeOut: 2000
          }
        );
        $("[type=reset]").click();
        $(".notice-sucess").remove();
      },
      error: function (error) {
        toastr.error(`Error rồi bạn ê : (( ,Thử gmail khác xem!!!`, {
          timeOut: 2000
        });
      }
    });
  });

var Arrayclone=[]

  $(".createLopMonHocClick").on("click", function () {
    var arrayLop = [];
    var arrayMon = [];
   
  var arrayIdLopMonHoc = [];
    $(".checklop input:checked").each(function () {
      let idlop = $(this).attr("idlop");
      arrayLop.push(idlop);
    });
    $(".checkmon input:checked").each(function () {
      let idmon = $(this).attr("idmon");
      arrayMon.push(idmon);
    });
    for (let i = 0; i < arrayLop.length; i++) {
      var string = "N";
      string += "0-" + arrayLop[i];

      for (let j = 0; j < arrayMon.length; j++) {
        var prefix = string + "-";
        prefix += +arrayMon[j] + "-" + randomString();
        arrayIdLopMonHoc.push(prefix);


      }

    }
    Arrayclone = arrayIdLopMonHoc;

    var HTML = "";
    for (let i = 0; i < arrayIdLopMonHoc.length; i++) {
      var idmon = arrayIdLopMonHoc[i].split("-")[2];
      console.log(idmon);
      HTML += `<div class="m-widget4__item">
												
												<div class="m-widget4__info">
													<span class="m-widget4__text">
													<b>Id LMH</b> <i style="color:red">${arrayIdLopMonHoc[i]}</i>	| <b>Id Môn</b> <i style="color:red" >${idmon}</i>
													</span>
												</div>
												
											</div>`;
    }
    $(".listLopMonHocNewCreate").html(HTML);
   
  });
  //end click tạo lớp môn học bao gốm tạo id và thay đổi html nút
$(".btn-themlopmonhoc").on("click", function() {
    let coutlopMonHocNew = Arrayclone.length;
   
   
    let flag = confirm(`Xác Nhận thêm ${coutlopMonHocNew} Lớp Môn Học này vào Cơ sở dữ liệu. Thực hiện xong mà nhầm thì đi xóa sẽ rất mệt đấy ~~!!`);
    if (flag) {
      $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        url: "/ajaxautothemlopmonhoc",
        data: {
          ArrayIdLopMonHoc: Arrayclone
        },
        success: function(html) {
          for (let i = 0; i < coutlopMonHocNew; i++) {
            toastr.success(
              `Thêm Thành Công Lớp Môn Học Có Id là: ${Arrayclone[i]} `,
              {
                timeOut: 800
              }
            );
          }

          $("[type=reset]").click();
        },
        error: function(error) {
          toastr.error(`Error rồi bạn ê : ((`, {
            timeOut: 2000
          });
        }
      });
    }
  
  });
  var randomString = (number = 4) => {
    var text = "";
    var possible = "1234567890WQERTYUIOPASDFGHJKLZXCVBNMLKJHGFDWERTYUIKMNBVCXSERTHN";
    for (var i = 0; i < number; i++) {
      text += possible.charAt(Math.floor(Math.random() * possible.length));
    }
    return text;
  }


  //ES6 javscript

});