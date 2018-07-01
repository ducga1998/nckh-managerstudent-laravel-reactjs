$(document).ready(function () {

  var ArrayNoiDung = [];

  $(".btn-themnoidung").on("click", function () {
    console.log("object");
    var noidung = $('#NoiDung').val();
    var sotiet = $("#sotiet").val();
    var object = {
      noidung: noidung,
      sotiet: sotiet
    }

    ArrayNoiDung.push(object);
    $(".containerContent").append(`
            <div class="m-list-timeline__item">
                        <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                        <span class="m-list-timeline__text">
                           ${noidung}
                        </span>
                        <span class="m-list-timeline__time">
                           Số tiết:${sotiet}
                        </span>
                    </div>
         `);
  });
  $(".btn-saveNoiDung").on("click", function () {

    var element = $(this);
    var idmon = element.attr("idmon");

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
          "content"
        )
      },
      type: "POST",
      url: "/AjaxUpNoiDung",
      data: {
        idmon: idmon,
        ArrayNoiDung: ArrayNoiDung

      },
      success: function (html) {
        toastr.success(`Save thành Công `, {
          timeOut: 2000
        });
        ArrayNoiDung = [];
        setTimeout(() => {
           window.location.href = "/QuanLyTaiLieu";
        }, 1000);
       
      },
      error: function (error) {
        toastr.error(`Save Thất Bại Xin hãy thử lại`, {
          timeOut: 2000
        });
      }
    });

  });

  (function fetchApiNoiDungMonHoc() {
    var idmon = $(".containerContent").attr('idmon');
    var link = $(".containerContent").attr("linkCurrent");
    var url = link + "/" + idmon;
    console.log(url);
    fetch(url)
      .then(resp => resp.json())
      .then(function (data) {
        var HTML = "";
        var Script = `
                <script>
                
                </script>
                `;




        for (var item in data) {
          console.log(item);
          HTML += renderHTMLNoiDungMonHoc(data[item].TieuDe, data[item].SoTiet, data[item].Id);
        }
        if (HTML == "") {
          $(".containerContent").html("<h2 style='text-align: center;' >Lớp chưa có sinh viên nào đăng ký</h2>");
        }
        $(".containerContent").html(HTML + Script + script2);
      });
  })();

  function renderHTMLNoiDungMonHoc(Noidung, sotiet, idnoidung) {
    return ` <div class="m-list-timeline__item">
                        <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                        <span style="cursor:pointer" idnoidung="${idnoidung}" sotiet="${sotiet}" class="m-list-timeline__text  clickViewChiTiet" >${Noidung}</span>
                        <span class="m-list-timeline__time"> Số tiết:${sotiet}</span>
                    </div>`;
  }
  $(".clickViewChiTiet").on("click", function () {
    var noidung = $(this).html();

    var idnoidung = $(this).attr("idnoidung");
    console.log(idnoidung);
    $(".btn-SaveChiTietNoiDung").attr("idnoidung", idnoidung);
    $(".btn-ModalNoiDungChiTiet").click();
    $(".TitleContent").html(noidung);
    FetchChiTietMonHoc(idnoidung);
  });

  function FetchChiTietMonHoc(idnoidung) {
    var link = $(".TitleContent").attr("linkchitietnoidung");
    console.log(link);
    link = link + "/" + idnoidung;
    console.log(link);
    var HTML = "";
    fetch(link)
      .then(resp => resp.json())
      .then(function (data) {
        for (var item in data) {
          HTML += RenderHTMLChiTiet(data[item]);
        }
        $(".LoadingChiTietNoiDung").html(HTML);
      });
  }

  function RenderHTMLChiTiet(data) {
    return `
          <div class="m-list-timeline__item">
                        <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                        <span style="cursor:pointer" idnoidung="${data.IdNoiDung}"  class="m-list-timeline__text  clickViewChiTiet" >${data.NoiDung}  </span>
           <span class="m-list-timeline__time" >
                          Link Video: <a href=" ${data.LinkVideo}">Link Xem</a>
                        </span>
                        </div>
                        `;
  }
  var ArrayChiTietNoiDung = [];
  $(".btn-themchitietnoidung").on("click", function () {
    var noidungchitiet = $(".summernote").summernote("code");
    var linkvideo = $("#linkvideo").val();
   
    var ObjectChiTietNoiDung = {
      noidungchitiet: noidungchitiet,
      linkvideo: linkvideo
    };
    ArrayChiTietNoiDung.push(ObjectChiTietNoiDung);
    $(".LoadingChiTietNoiDung").append(`
    <div class="m-list-timeline__item">
                        <span class="m-list-timeline__badge m-list-timeline__badge--success"></span>
                        <span style="cursor:pointer" idnoidung="1" class="m-list-timeline__text  clickViewChiTiet">${noidungchitiet}</span>
           <span class="m-list-timeline__time">
                          Link Video: <a href="${linkvideo}">Link Xem</a>
                        </span>
                        </div>
    `);

  });
  $(".btn-SaveChiTietNoiDung").on("click", function () {
    var idnoidung = $(this).attr("idnoidung");
    console.log(ArrayChiTietNoiDung);
    console.log(idnoidung);
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      type: "POST",
      url: "/AjaxThemChiTietNoiDung",
      data: {
        ArrayChiTietNoiDung: ArrayChiTietNoiDung,
        idnoidung: idnoidung
      },
      success: function (html) {
        toastr.success(`Save thành Công Nôi Dung Chi tiết`, {
          timeOut: 2000
        });
        ArrayChiTietNoiDung = [];
      },
      error: function (error) {
        toastr.error(`Save Thất Bại Xin hãy thử lại`, {
          timeOut: 2000
        });
      }
    });
  });
  $(".btn-viewtailieumodal").on("click", function() {
    var HTML = "";
    var url =$(this).attr("link");
    console.log(url);
     var script = `
    <script>
   $("ul li").fadeIn();
    $(".clicktoggle").on("click",function(){
    
        $(this).next().next().fadeToggle();
    });
     
    </script>`;
    fetch(url)
      .then(resp => resp.json())
      .then(function(ArrrayListNoiDung) {
        for (var itemNoiDung in ArrrayListNoiDung) {
          console.log(ArrrayListNoiDung[itemNoiDung]);
          HTML += renderHTMLTaiLieu(ArrrayListNoiDung[itemNoiDung]);
        }
        HTML += script;
        $(".LayTaiLieu").html(HTML);
        if(HTML.length<160){
            $(".LayTaiLieu").html("<h3 class='text-center'>Chưa Có Tài liệu Môn Học này Liên Hệ Giảng viên tìm tài liệu ...</h3>");
        }
      });
    
  });
  function renderHTMLTaiLieu(data){
     var HTMLEnd="";
    var ArrrayListChitietNoiDung=data.arrayListChiTietNoiDung;
    var noteWarning = ArrrayListChitietNoiDung.length == 0 ? "<span class='m--font-danger'>(Chưa Có Nội Dung Chi tiết)</span>" : "";
    var HTMLNoidung = `${data.tieude}      Số Tiết:${data.sotiet} ${noteWarning}`;
   
   
    var HTMLChiTietNoiDung="";
    var count=0
     for (var itemChitietNoiDung in ArrrayListChitietNoiDung){
       count++;
       HTMLChiTietNoiDung += `<li>
       <b>Nội dung</b> <span>${count}</span> :  <h4>${ArrrayListChitietNoiDung[itemChitietNoiDung].NoiDung}</h4> 
      <b>Link Video</b> : <a href="${ArrrayListChitietNoiDung[itemChitietNoiDung].LinkVideo}">Link Video</a>

       </li><hr>`;
      
    
     }
     
     HTMLEnd += `<h3 class="clicktoggle m--font-primary">
														${HTMLNoidung}
                            </h3>
                            <hr>
     
     <ul class="hideSlide">${HTMLChiTietNoiDung}</ul>`;
     return HTMLEnd;
  }
  $(".btn-viewbonhiemphutrach").on("click",function(){
      var idmon=$(this).attr("idmon");
      $("#layidmonthoi").attr("idmon",idmon);
  });
  $(".BonhiemTaiLieu").on("click",function(){
     var idmon=$("#layidmonthoi").attr("idmon");
     var idgiangvien = $(this).attr("idgiangvien");
       $.ajax({
         headers: {
           "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
         },
         type: "POST",
         url: "/AjaxPhutTrach",
         data: {
           idmon: idmon,
           idgiangvien: idgiangvien
         },
         success: function(html) {
           toastr.success(
             `Phụ trách Cho Giảng Viên quản lý Thành Công`,
             {
               timeOut: 2000
             }
           );
           setTimeout(() => {
             window.location.href = "/quanlyphutrachtailieucacmonhoc";
           }, 1000);
          
         },
         error: function(error) {
           toastr.error(`Thất Bại Xin hãy thử lại`, {
             timeOut: 2000
           });
         }
       });
  });
$("#FormThemKhoaHoc").on('submit',function(e){
e.preventDefault();

  var tenkhoahoc=$("input[name='tenkhoahoc']").val();
   var timestart = formatDate($("input[name='timestart']").val()); 
     var timeend = formatDate($("input[name='timeend']").val());
    var idmonhoc= $("#selectmonhoc").find(":selected").val();
    var tengiangvien= $(this).attr("tengiangvien");
  
      $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        url: "/AJAXThemKhoaHoc",
        data: {
          timestart: timestart,
          timeend: timeend,
          idmonhoc: idmonhoc,
          tenkhoahoc: tenkhoahoc
        },
        success: function(html) {
          toastr.success(`Thêm Khóa Học Thành Công`, {
            timeOut: 2000
          });
          setTimeout(() => {
            window.location.href = "/ViewQuanLyKhoaHoc";
          }, 1000);
          $(".containerCourse").append(`
          <div class="col-md-12 col-lg-12 col-xl-4">
										<!--begin:: Widgets/Stats2-1 -->
										<div class="m-widget1">
											<div class="avt">
                                                <img style="width:160px" src="http://idplanguage.com/uploads/noidung/images/baiviet/study-online.png" alt="">
                                            </div>
                                            
                                            <div class="title">
                                               
                                            </div>
                                            <div class="author">
                                              ${tengiangvien}
                                            </div>
                                            <button type="button" class="btn-themchitietnoidung btn m-btn--pill m-btn m-btn--gradient-from-info m-btn--gradient-to-accent">
															${tenkhoahoc}
														</button>
										</div>
										<!--end:: Widgets/Stats2-1 -->
									</div>
          `);
        },
        error: function(error) {
          toastr.error(`Thất Bại Xin hãy thử lại`, {
            timeOut: 2000
          });
        }
      });
     
});
function formatDate(date) {
  var d = new Date(date),
    month = "" + (d.getMonth() + 1),
    day = "" + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) month = "0" + month;
  if (day.length < 2) day = "0" + day;

  return [year, month, day].join("-");
}
$(".btn-dkkhoahoc").on("click",function(){
    var tenmon=$(this).attr("tenmon");
    var tengiangvien=$(this).attr("tengiangvien");
    var IdKhoaHoc=$(this).attr("idkhoahoc");
    $(".btn-dkonline").attr("idkhoahoc", IdKhoaHoc);
    $(".tenkhoahoc").html(`<h2>${tenmon}</h2>`);
    $(".tentacgia").html(`<h3 style="text-transform: uppercase;">${tengiangvien}</h3>`);
});
$(".btn-dkonline").on("click",function(){
      var idkhoahoc=$(this).attr("idkhoahoc");
      var idsinhvien=$(this).attr("idsinhvien");
       $.ajax({
         headers: {
           "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
         },
         type: "POST",
         url: "/AJAXDangKyKhoaHoc",
         data: {
           idkhoahoc: idkhoahoc,
           idsinhvien: idsinhvien
         },
         success: function(html) {
           toastr.success(`Đăng ký thành Công`, {
             timeOut: 2000
           });
           setTimeout(() => {
             window.location.href = "ViewDangKyKhoaHoc";
           }, 2300);
         },
         error: function(error) {
           toastr.error(`Đăng ký thất bại`, {
             timeOut: 2000
           });
         }
       });
});
$(".viewDataCourse").on("click", function() {
  var idcourse = $(this).attr("idcourse");
  var link = $(this).attr("link");
  var url = link + "/" + idcourse;
 
  var HTML="";
  console.log(url);
  fetch(url)
    .then(resp => resp.json())
    .then(function(data) {
   console.log(data);
     
     for (var noidungCourse in data) {
      var ObjectDataNoiDungCourse=data[noidungCourse].dataCourse;
     HTML += renderHTMLParentItem(ObjectDataNoiDungCourse);
     console.log(ObjectDataNoiDungCourse);
    
     }
     // thêm javascript vào cho n
    HTML += `<script>
  $("#mobile-nav-icon").click(function() {
  $("#menu-main-menu").slideToggle();
});

$("#menu-main-menu > .menu-item-has-children > .sub-menu").addClass("first-sub");

$("#menu-main-menu > .menu-item-has-children a").click(function() {
  $(this)
    .siblings(".first-sub")
    .slideToggle();
  $(this)
    .closest(".menu-item-has-children")
    .siblings()
    .find(".sub-menu")
    .slideUp();
});
</script>`;
    if (HTML.length<443){
       $("#menu-main-menu").html(" <h2> Khóa Học chưa đc giảng viên nhập tài liệu </h2>");
    }
    else{
$("#menu-main-menu").html(HTML);
    } 
     console.log(HTML);
    });
});

function renderHTMLParentItem(Objects){
  var HTMLSubItem="";
  var ArrayChiTietNd = Objects.lay_chi_tiet_noi_dung_khoa_hoc;
  console.log(ArrayChiTietNd);
  for (var item in ArrayChiTietNd) {
    HTMLSubItem += `<li>${ArrayChiTietNd[item].NoiDung}||Link
 Video <a href="${ArrayChiTietNd[item].LinkVideo}">linkvideo</a>
      </li>`;
  }
 
  return `<li class="menu-item-has-children"><a>${Objects.TieuDe}|| Số Tiết:${Objects.SoTiet}</a>
    <ul class="sub-menu first-sub">

      ${HTMLSubItem}
    </ul>
  </li>`; 
}

$(".viewDataCourse").on("click", function(event) {
  $(".m-viewdiglog").css({
    width: "auto",
    height: "auto",
    opacity: "1",
    transition: "0.6s"
  });
});
// $(".viewAddGiangVien").on("click", function() {
//   $(".viewHocKhoaHoc").addClass("displayNone");
// });

//  $(".viewAddGiangVien").on("click", function(event) {
//    $(".m-viewdiglog").css({
//      width: "auto",  
//      height: "auto",
//      opacity: "1",
//      transition: "0.6s"
//    });
//  });
//  $(".displayNone").on("click", function(event) {
//    $(".m-viewdiglog").css({
//      width: "0px",
//      height: "0px",
//      opacity: "0",
//      transition: "0.6s"
//    });
//  });
});