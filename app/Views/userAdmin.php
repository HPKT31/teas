<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item active"><a href="#"><b>Danh sách nhân viên</b></a></li>
    </ul>
    <div id="clock"></div>
  </div>
  

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row element-button">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" href="<?= APP_URL ?>admin/themuser" title="Thêm"><i class="fas fa-plus"></i>
                Tạo mới người dùng</a>
            </div>

            <div class="col-sm-2">
              <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                  class="fas fa-trash-alt"></i> Xóa tất cả </a>
            </div>
            <div class="header-top-menu tabl-d-n">
                                <div class="breadcome-heading">
                                    <form method="post" class="" style="display:flex;"
                                        action="<?= APP_URL?>Admin/search">
                                        <input name="search" type="text" placeholder="Search..." class="form-control"
                                          >
                                        <button style="submit" class="btn btn-primary">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div>
          </div>
          <div class="table-responsive-sm">
            <table class="table_media_specail table table-hover table-bordered js-copytextarea" cellpadding="0"
              cellspacing="0" border="0" id="sampleTable">
              <thead>
                <tr>
                  <th><input type="checkbox" id="all"></th>
                  <th>ID khách hàng</th>
                  <th>fistName</th>
                  <th>Avatar</th>
                  <th>Email</th>
                  <th>Last Name</th>

                  <th>Tính năng</th>
                  <th>Tính năng</th>
                </tr>
              </thead>
              <tbody>
                <?php

                foreach ($user as $user) {
                
                  echo '
                  <tr>
                  <td><input type="checkbox" name="check1" value="1"></td>
                  <td>' . $user['customer_id'] . '</td>
                  <td>' . $user['first_name'] . '</td>
                  <td><img class="img-card-person" src="'.APP_URL.'upload/'.$user['img'].'" alt=""></td>
                  <td>' . $user['email'] . '</td>
                  <td>' . $user['last_name'] . '</td>
                
                  <td class="table-td-center">
                      <button class="btn btn-primary btn-sm trash" type="button" data-id="' . $user['customer_id'] . '" title="Xóa">
                          <i class="fas fa-trash-alt"></i>
                      </button>
                  </td>
              
                  <td class="table-td-center">
                      <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" 
                          data-toggle="modal" data-target="#editModal"
                          data-id="' . $user['customer_id'] . '" 
                          data-name="' . $user['first_name'] . '" 
                          data-img="' . $user['img'] . '"
                          data-tk ="' . $user['last_name'] . '"
                          data-email="' . $user['email'] . '"> <!-- Thêm đóng tag cho data-email -->
                          <i class="fas fa-edit"></i>
                      </button>
                  </td>
              </tr>
              
                            ';
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
<script>
  $(document).ready(function () {
    $('.edit').click(function () {
      var userId = $(this).data('id');
      var ten = $(this).data('name');
      var email = $(this).data('email');
      var tk = $(this).data('tk');
      var img = $(this).data('img');


      $('#userId').val(userId);
      $('#userName').val(ten);
      $('#userEmail').val(email);
      $('#taik').val(tk);
      $('#userPhone').val(sdt);
      // $('#img').val(img);

    });

  });
</script>

<!--
  MODAL
-->
<script>
  function validateForm() {
    var userName = document.getElementById("userName").value;
    // var userPhone = document.getElementById("userPhone").value;
    var userEmail = document.getElementById("userEmail").value;
    var img = document.getElementById("img").value;
    var taik = document.getElementById("taik").value;

    var errors = []; // Mảng chứa các thông báo lỗi

    if (userName === '') {
      errors.push("Vui lòng nhập Họ và tên");
    }

    // if (userPhone === '') {
    //     errors.push("Vui lòng nhập Số điện thoại");
    // } else if (isNaN(userPhone)) {
    //     errors.push("Số điện thoại phải là số");
    // } else if (userPhone.length !== 10 || !/^\d+$/.test(userPhone)) {
    //     errors.push("Số điện thoại phải có 10 chữ số và không sử dụng ký tự đặc biệt");
    // }

    if (userEmail === '') {
      errors.push("Vui lòng nhập Địa chỉ email");
    } else {
      var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailPattern.test(userEmail)) {
        errors.push("Địa chỉ email không hợp lệ");
      }
    }

    if (img === '') {
      errors.push("Vui lòng chọn Hình ảnh");
    }

    if (taik === '') {
      errors.push("Vui lòng nhập Tên tài khoản");
    }

    // Hiển thị thông báo lỗi dưới form
    if (errors.length > 0) {
      var errorMessage = "<ul>";
      for (var i = 0; i < errors.length; i++) {
        errorMessage += "<li>" + errors[i] + "</li>";
      }
      errorMessage += "</ul>";

      document.getElementById("errorMessages").innerHTML = errorMessage;
      document.getElementById("errorMessages").style.display = "block";
      return false;
    }

    return true;
  }
</script>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
  data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="editForm" method="post" action="<?=APP_URL?>Admin/updateadmin" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Chỉnh sửa thông tin người dùng cơ bản</h5>
              </span>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label class="control-label">fistName</label>
              <input class="form-control" id="userName" name="userName" type="text">
              <input class="hidden-input" id="userId" name="userId" type="text" style="visibility: hidden;">
            </div>
           
            <div class="form-group col-md-6">
              <label class="control-label">Địa chỉ email</label>
              <input class="form-control" id="userEmail" name="userEmail" type="email">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Hình ảnh</label>
              <input class="form-control" id="img" name="img" type="file">
            </div>
            <div class="form-group col-md-6">
              <label class="control-label">Last Name</label>
              <input class="form-control" id="taik" name="taik" type="text">
            </div>
          </div>
          <br>
          <div id="errorMessages" style="display:none; color: red;"></div>

          <button class="btn btn-save" id="saveChangesBtn" type="submit">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <br>
        </div>
        <div class="modal-footer"></div>
      </form>
    </div>
  </div>
</div>


<!--
  MODAL
-->

<!-- Essential javascripts for application to work-->
<script src="<?= APP_URL ?>admin/js/js/jquery-3.2.1.min.js"></script>
<!-- <script src="Assets/js/js/popper.min.js"></script>
<script src="Assets/js/js/bootstrap.min.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- <script src="Assets/js/js/plugins/jquery.table2excel.js"></script> -->
<script src="<?= APP_URL ?>admin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<!-- <script src="Assets/js/js/plugins/pace.min.js"></script> -->
<!-- Page specific javascripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Data table plugin-->
<!-- <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script> -->
<script>
  jQuery(function () {
    jQuery(".trash").click(function () {
      // var rowToDelete = jQuery(this).closest("tr");
      // var id = rowToDelete.find("[name='check1']").val();
      var rowToDelete = jQuery(this).closest("tr");
        var id = jQuery(this).data('id');
        
      swal({
        title: "Cảnh báo",
        text: "Bạn có chắc chắn muốn xóa user này?",
        buttons: ["Hủy bỏ", "Đồng ý"],
      }).then((willDelete) => {
        if (willDelete) {
          // Gửi yêu cầu POST để xóa
          jQuery.ajax({

            type: 'POST',
            url: '<?= APP_URL ?>Admin/delete/',
            data: { id: id },
            success: function (response) {
              if (response === 'ok') {
                rowToDelete.remove();
                swal("Đã xóa thành công!", { icon: "success" });
              } else {
                swal("Lỗi khi xóa! " + response, { icon: "error" });
              }
            },
            error: function (xhr, status, error) {
              // console.log(xhr.responseText);
              swal("Đã xảy ra lỗi khi xóa!", { icon: "error" });
            }
          });

        }
      });
    });
  });


  


  //EXCEL
  // $(document).ready(function () {
  //   $('#').DataTable({

  //     dom: 'Bfrtip',
  //     "buttons": [
  //       'excel'
  //     ]
  //   });
  // });


  //Thời Gian
  function time() {
    var today = new Date();
    var weekday = new Array(7);
    weekday[0] = "Chủ Nhật";
    weekday[1] = "Thứ Hai";
    weekday[2] = "Thứ Ba";
    weekday[3] = "Thứ Tư";
    weekday[4] = "Thứ Năm";
    weekday[5] = "Thứ Sáu";
    weekday[6] = "Thứ Bảy";
    var day = weekday[today.getDay()];
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    nowTime = h + " giờ " + m + " phút " + s + " giây";
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    today = day + ', ' + dd + '/' + mm + '/' + yyyy;
    tmp = '<span class="date"> ' + today + ' - ' + nowTime +
      '</span>';
    document.getElementById("clock").innerHTML = tmp;
    clocktime = setTimeout("time()", "1000", "Javascript");

    function checkTime(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
  }
  //In dữ liệu
  var myApp = new function () {
    this.printTable = function () {
      var tab = document.getElementById('sampleTable');
      var win = window.open('', '', 'height=700,width=700');
      win.document.write(tab.outerHTML);
      win.document.close();
      win.print();
    }
  }
  //     //Sao chép dữ liệu
  //     var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

  // copyTextareaBtn.addEventListener('click', function(event) {
  //   var copyTextarea = document.querySelector('.js-copytextarea');
  //   copyTextarea.focus();
  //   copyTextarea.sele ct();

  //   try {
  //     var successful = document.execCommand('copy');
  //     var msg = successful ? 'successful' : 'unsuccessful';
  //     console.log('Copying text command was ' + msg);
  //   } catch (err) {
  //     console.log('Oops, unable to copy');
  //   }
  // });


  //Modal
  $("#show-emp").on("click", function () {
    $("#ModalUP").modal({ backdrop: false, keyboard: false })
  });
</script>
</body>

</html>