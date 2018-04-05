$(document).ready(function () {
  // $(document).ajaxStart(function(){
    $(document).ajaxStart(function() {
      $("#wait").css("display", "block");
    });
    $(document).ajaxComplete(function() {
      $("#wait").css("display", "none");
    });
   
  $(".clickThemSV").click(function () {
    console.log("click");

    $(".m-portlet").removeClass("hiden");
  });
  //   $(".SubmitAddSinhVien").onClick(function(e) {
  //     e.preventDefault();
  //     console.log("submit");

  //   });
  $("#FormAddGiangVien").on("submit", function (e) {
    e.preventDefault();

    var name = $("input[name=name]").val();
    var email = $("input[name=email]").val();
    var password = $("input[name=password]").val();
    var routeLinkThemGiangVien = $(this).attr("routeThemGiangVien");
    var bomon = $("#exampleSelect1")
      .find(":selected")
      .val();

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      type: "POST",
      url: routeLinkThemGiangVien,
      data: {
        name: name,
        email: email,
        password: password,
        bomon: bomon
      },
      success: function (html) {

        toastr.success(`Thêm Thành Công Giảng Viên ${name} `, {
          timeOut: 2000
        });
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
  // end proccess add giang vien , click bla bla
  $(".deletegv").on("click", function () {
    var id = $(this).attr("IdGiangVien");
    let flag = confirm("Are you Sure Delete ???? : (((");
    if (flag == true) {
      $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
            "content"
          )
        },
        type: "POST",
        url: "http://localhost:8000/listgiangvien/deletegiangvien",
        data: {
          id: id
        },
        success: function (html) {
          toastr.success(
            `Xóa thành Công `, {
              timeOut: 2000
            }
          );

        },
        error: function (error) {
          console.log(id);
        }
      });
      $(this)
        .parent()
        .parent()
        .parent()
        .remove();

    }

  });
  $(".viewAddGiangVien").on("click", function (event) {

    $(".m-viewdiglog").css({
      "width": "auto",
      "height": "auto",
      "opacity": "1",
      "transition": "0.6s"
    });
  });
  $(".viewAddGiangVien").on("click", function (event) {
    $(". btn - addStudent;").css({
      width: "auto",
      height: "auto",
      opacity: "1",
      transition: "0.6s"
    });
  });



  // fetch("http://localhost:8000/listlophoc")
  //   .then((resp) => resp.json()) // Transform the data into json
  //   .then(function (data) {
  //     $("#content-ajax").html();
  //   })
  //xử lý ajax hiện thị filter



  var categoryFitler;
  $("#selectcategory").change(function () {
    var elemt = $(this);

    var text = $("option:selected", elemt).attr("flag");
    if (text == "lophoc") {
      console.log("scasacascsac");
      var routelop = elemt.attr("urlLop");
      FetchDatasss(routelop, 1);
      categoryFitler = true; // lophoc
    } else if (text == "khoahoc") {
      var routekhoa = elemt.attr("urlKhoa");
      FetchDatasss(routekhoa, 0);
      categoryFitler = false;
    }

    console.log(text);
  });
  var FetchDatasss = (routelistlophoc, check) => {
    var ListLi = "";
    console.log("test thu");
    fetch(routelistlophoc, {
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json"
        }
      }).then(response => response.json()).then(function (data) {
        console.log(data);
        if (check == 1) {
          data.forEach(element => {
            console.log("vong lap");
            ListLi += `
          	    <option idlop=${element.IdLop}> ${element.TenLop}   ${element.IdKhoaHoc}</option>`;
          });
        } else {
          data.forEach(element => {
            ListLi += `
          	    <option idkhoa=${element.IdKhoaHoc}> ${element.TenKhoaHoc}  </option>`;
          });
        }

        var htmlData = `<select class="form-control m-input m-input--air" id="select2">	${ListLi}		</select>`;
        $(".containerAjaxContent").html(htmlData);
        console.log("fwqfffffffffffffffffffffff");
      });
  }
  // function return 1 item to object

  function CheckCategoryFitler(select) {
    var flag = select.attr("idlop");
    if (flag == "undefined") {
      return true; // nó là  chọn khóa
    } else {
      return false; // nó là chọn lớp
    }
  }
  $(".filter-btn").on("click", function () {
    var element = $("#select2");
    var select = $(element).find("option:selected");

    //  check use use category fitler
    if (categoryFitler == false) { // chọn khoa
      let idkhoa = select.attr("idkhoa");

      var routekhoa = $(this).attr("routetheokhoa") + "/" + idkhoa;
      console.log(routekhoa);
      fetch(routekhoa).then(response => response.json())
        .then(function (data) {
          let HTML = "";
          for (element in data) {

            HTML += renderHtmlListSinhVien(data[element]);
            console.log(element);
          }
          $("#containerHTMLListSinhVien").html(HTML);
          //get api

        });

    } else { // chọn lớp

      let idlop = select.attr("idlop");
      var routelop = $(this).attr("routetheolop") + "/" + idlop;

      console.log(routelop);

      fetch(routelop)
        .then(response => response.json())
        .then(function (data) {
          let HTML = "";
          for (element in data) {
            HTML += renderHtmlListSinhVien(data[element]);
            console.log(element);
          }
          $("#containerHTMLListSinhVien").html(HTML);

        });
    }


  });

  function renderHtmlKhiThemGiangVien(Object) {
    return `<tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 55px;">
                    <td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                        <span style="width: 40px;">
                            <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                <input type="checkbox" value="1">
                                <span></span>
                            </label>
                        </span>
                    </td>
                    
                    <td data-field="ShipDate" class="m-datatable__cell">
                        <span style="width: 110px;">${Object.TenGiangVien}</span>
                    </td>
                    <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                        <span style="width: 150px;">2</span>
                    </td>
                    <td data-field="ShipName" class="m-datatable__cell">
                        <span style="width: 150px;">2018-04-01 00:00:00</span>
                    </td>


                    <td data-field="Type" class="m-datatable__cell">
                        <span style="width: 150px;">duc282@gmail.com</span>

                    </td>
                    <td data-field="Status" class="m-datatable__cell">
                        <span style="width: 150px;">HTTT</span>

                    </td>
                    <td data-field="Actions" class="m-datatable__cell">
                        <span style="overflow: visible; width: 110px;">
                            <div class="dropdown ">
                                <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                    <i class="la la-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        <i class="la la-edit"></i> Edit Details</a>
                                    <a class="dropdown-item" href="#">
                                        <i class="la la-leaf"></i> Update Status</a>
                                    <a class="dropdown-item" href="#">
                                        <i class="la la-print"></i> Generate Report</a>
                                </div>
                            </div>
                            <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                                <i class="la la-edit"></i>
                            </a>
                            <a idgiangvien="2" href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill deletegv" title="Delete">
                                <i class="la la-trash"></i>
                            </a>
                        </span>
                    </td>
                </tr>`;
  }

  function renderHtmlListSinhVien(Object) {
    return `<tr data-row="0" class="m-datatable__row m-datatable__row--even" style="height: 55px;">
                <td data-field="RecordID" class="m-datatable__cell--center m-datatable__cell m-datatable__cell--check">
                    <span style="width: 40px;">
                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                            <input type="checkbox" value="1">
                            <span></span>
                        </label>
                    </span>
                </td>
               

                <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                    <span style="width: 100px;">${Object.IdSinhVien}</span>
                </td>
                <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                    <span style="width: 100px;">${Object.TenSv}</span>
                </td>
                <td data-field="OrderID" class="m-datatable__cell--sorted m-datatable__cell">
                    <span style="width: 100px;">
                       CNTT1
                    </span>
                </td>
                <td data-field="ShipDate" class="m-datatable__cell">
                    <span style="width: 100px;">${Object.GioiTinh}</span>
                </td>
                <td data-field="ShipName" class="m-datatable__cell">
                    <span style="width: 100px;">${Object.IdKhoaHoc}</span>
                </td>
                <td data-field="ShipName" class="m-datatable__cell">
                    <span style="width: 100px;">${Object.NgaySinh}</span>
                </td>




                <td data-field="Actions" class="m-datatable__cell">
                    <span style="overflow: visible; width: 110px;">
                        <div class="dropdown ">
                            <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">
                                    <i class="la la-edit"></i> Edit Details</a>
                                <a class="dropdown-item" href="#">
                                    <i class="la la-leaf"></i> Update Status</a>
                                <a class="dropdown-item" href="#">
                                    <i class="la la-print"></i> Generate Report</a>
                            </div>
                        </div>
                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
                            <i class="la la-edit"></i>
                        </a>
                        <a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill deletegv" title="Delete">
                            <i class="la la-trash"></i>
                        </a>
                    </span>
                </td>
            </tr>`;
  }
  //end click button fitler-btn
  $(".SubmitAddSinhVien").on("click", function () {


  });


  $("#FormThemSinhVien").on("submit", function (e) {
    e.preventDefault();
    var routeThemSinhVien = $(this).attr("routethemsinhvien");

    var idsinhvien = $("input[name=idsinhvien]").val();
    var tensinhvien = $("input[name=tensinhvien]").val();
    var password = $("input[name=password]").val();
    var infolophoc = $("#selectLopHoc").find(":selected").val();
    var arrayinfo = infolophoc.split(" ");
    var idlophoc = arrayinfo[0];
    var idkhoa = arrayinfo[1];

    var gioitinh = $("input[name=gioitinh]:checked").val();


    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      type: "POST",
      url: routeThemSinhVien,
      data: {
        idsinhvien: idsinhvien,
        tensinhvien: tensinhvien,
        password: password,
        idlophoc: idlophoc,
        gioitinh: gioitinh,
        idkhoa: idkhoa
      },
      success: function (html) {
        toastr.success(
          `Thêm Sinh viên tên <p style="font-weight:bold"> ${tensinhvien}</p> thành công ^^ `, {
            timeOut: 2000
          }
        );
        $("[type=reset]").click();
      },
      error: function (error) {
        console.log(error);
      }
    });
  });
  $(".btn-dk-lopmonhoc").on("click", function () {
    var element = $(this);
    var flag = confirm("Xác nhận sẽ dạy lớp này.Chọn rồi là phải dạy nha!! =.=");
    if (flag == true) {
      var IdLopMonHoc = $(this).attr("idlopmonhoc");
      var IdGiangVien = $(this).attr("idgiangvien");
      var routedkmonhoc = $(this).attr("routedkmonhoc");
      console.log(routedkmonhoc + "  " + IdLopMonHoc + "  " + IdGiangVien);
      $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "POST",
        url: "/ajaxgiangviendangkylopmonhoc",

        data: {
          IdGiangVien: IdGiangVien,
          IdLopMonHoc: IdLopMonHoc
        },

        success: function (html) {
          $(element).parent().html(`<button  type="button" class="btn btn-success">
												Đã có người dạy
											</button>`);
          toastr.success(
            `Đăng ký thành công lớp Học có Id: ${IdLopMonHoc}`, {
              timeOut: 2000
            }
          );

        },
        error: function (error) {
          toastr.error(`Đăng ký thất bại. Đăng ký lại đi !!!!`, {
            timeOut: 2000
          });
        }
      });
    }
  });

  $(".btn-ViewListSinhVien").on("click", function () {

    var element = $(this);
    var IdLopMonHoc = element.attr("idlopmonhoc");

    var url = "/ajaxlistlopsinhvien/" + IdLopMonHoc;
    console.log(url);
    fetch(url)
      .then(resp => resp.json())
      .then(function (data) {
        var HTML = "";

        for (var item in data) {

          HTML += renderHTMLTableListSinhVien(data[item]);

        }
        if (HTML == "") {
          $(".viewlistsinhvien").html("<h2 style='text-align: center;' >Lớp chưa có sinh viên nào đăng ký</h2>");
        }
        $(".viewlistsinhvien").html(HTML);
        $(".btn-modal").click();
      });

  });
  // function renderHTML(){
  //   return
  // }
  function renderHTMLTableListSinhVien(object) {
    return `<tr>
													<th scope="row">
													${object.IdSinhVien}
													</th>
													<td>
														${object.TenSv}
													</td>
													<td>
														${object.GioiTinh ? "Nam" : "Nữ"}
													</td>
													<td>
													K${object.IdKhoaHoc}
													</td>
												</tr>`;
  }

});