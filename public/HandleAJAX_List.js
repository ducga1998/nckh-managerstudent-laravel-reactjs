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

});