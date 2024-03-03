<script src="<?= APP_URL ?>admin/js/js/jquery-3.2.1.min.js"></script>
<script src="<?= APP_URL ?>admin/js/js/popper.min.js"></script>
<script src="<?= APP_URL ?>admin/js/js/bootstrap.min.js"></script>
<script src="<?= APP_URL ?>admin/js/main.js"></script>
<script src="<?= APP_URL ?>admin/js/js/plugins/pace.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<script>

  function readURL(input, thumbimage) {
    if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#thumbimage").attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
    else { // Sử dụng cho IE
      $("#thumbimage").attr('src', input.value);

    }
    $("#thumbimage").show();
    $('.filename').text($("#uploadfile").val());
    $('.Choicefile').css('background', '#14142B');
    $('.Choicefile').css('cursor', 'default');
    $(".removeimg").show();
    $(".Choicefile").unbind('click');

  }
  $(document).ready(function () {
    $(".Choicefile").bind('click', function () {
      $("#uploadfile").click();

    });
    $(".removeimg").click(function () {
      $("#thumbimage").attr('src', '').hide();
      $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
      $(".removeimg").hide();
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();
      });
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'pointer');
      $(".filename").text("");
    });
  })
</script>
</head>

<body class="app sidebar-mini rtl">
  <style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
  <!-- Navbar-->

  <main class="app-content">
    <div class="app-title">
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?page=bangsp">Danh sách sản phẩm</a></li>
        <li class="breadcrumb-item"><a href="index.php?page=themuser">Thêm tài khoản</a></li>

      </ul>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h3 class="tile-title">Tạo mới sản phẩm</h3>
          <div class="tile-body">
            <div class="row element-button">
              <div class="col-sm-2">
                <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#adddanhmuc"><i
                    class="fas fa-folder-plus"></i> Thêm danh mục</a>
              </div>
            </div>
            <form class="row" action="<?=APP_URL?>admin/adduser" method="POST" enctype="multipart/form-data">
              <div class="form-group col-md-3">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" name="tensp" type="text">
              </div>
              <div class="form-group  col-md-3">
                <label class="control-label">Số lượng</label>
                <input class="form-control" name="soLuong" type="text">

              </div>
              
              <div class="form-group col-md-3">
                <label for="exampleSelect1" class="control-label">Danh mục</label>
                <select name="danhMuc" class="form-control" id="exampleSelect1">
                  <option>-- Chọn danh mục --</option>
                  <?php
                  foreach ($catelory as $dm) { ?>
                    <option value="<?php echo $dm['category_id']; ?>">
                      <?php echo $dm['category_name']; ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Giá bán</label>
                <input name="giaBan" class="form-control" type="text">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Ảnh sản phẩm</label>
                <div id="myfileupload">
                  <input type="file" id="uploadfile" name="ImageUpload" onchange="readURL(this);" />
                </div>
                <div id="thumbbox">
                  <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                  <a class="removeimg" href="javascript:"></a>
                </div>
                <div id="boxchoice">
                  <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                  <p style="clear:both"></p>
                </div>

              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" id="mota"></textarea>
                <!-- <script>CKEDITOR.replace('mota');</script> -->

                <input type="hidden" name="hiddenMota" id="hiddenMota" value="">

              </div>
              <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
              <script>
                ClassicEditor
                  .create(document.querySelector('#mota'))
                  .then(editor => {
                    editor.model.document.on('change:data', () => {
                      document.getElementById('hiddenMota').value = editor.getData();
                    });
                  })
                  .catch(error => {
                    console.error(error);
                  });
              </script>
          </div>
          <div class="error">
                <?php
                checkerro();
                ?>
              </div>
          <input name="push" class="btn btn-save" type="submit" value="Lưu lại">
          <a class="btn btn-cancel" href="#">Hủy bỏ</a>
        </div>
        </form>
  </main>


  <!--
MODAL CHỨC VỤ 
-->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới nhà cung cấp</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập nhà cung cấp</label>
              <input class="form-control" id="nhacungcapInput" type="text" required>
            </div>
          </div>
          <BR>
          <button class="btn btn-save" type="button" id="saveCategoryBtn">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("saveCategoryBtn").addEventListener("click", function () {
      var nhacungcapValue = document.getElementById("nhacungcapInput").value;

      $.ajax({
        type: "POST",
        url: "index.php?page=addst", // URL
        data: { nhacungcap: nhacungcapValue }, // Dữ liệu gửi đi
        success: function (response) {
          if (response.status === 'success') {
            swal({
              title: response.message,
              icon: 'success'
            }).then(function () {
              // Hiển thị thông báo sau khi reload trang
              location.reload();
            });
          } else {
            swal({
              title: response.message,

              icon: 'error'

            });
            console.log(response);
          }
        },
        error: function (xhr, status, error) {
          console.error("Có lỗi xảy ra: " + xhr.status);
          swal("Lỗi khi thực hiện yêu cầu!", {
            icon: "error",
          });

        }

      });

    });


  </script>




  <div class="modal fade" id="adddanhmuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới danh mục</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tên danh mục mới</label>
              <input id="newCategory" name="danhmuc" class="form-control" type="text">
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Danh mục sản phẩm hiện đang có</label>
              <ul style="padding-left: 20px;">
                <?php
                
                foreach ($catelory as $dm) { ?>
                  <li>
                    <?php echo $dm['category_name']; ?>
                  </li>
                <?php } ?>

              </ul>
            </div>
          </div>
          <BR>
          <button id="saveCategory" class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>


  <script>

    document.getElementById("saveCategory").addEventListener("click", function () {
      var newCategoryValue = document.getElementById("newCategory").value;
      $.ajax({
        type: "POST",
        url: "index.php?page=add",
        data: { newCategory: newCategoryValue },

        success: function (response) {
          if (response.status === 'success') {
            swal({
              title: response.message,
              icon: 'success'
            }).then(function () {
              // Hiển thị thông báo sau khi reload trang
              location.reload();
            });
          } else {
            swal({
              title: response.message,

              icon: 'error'

            });
            console.log(response);
          }
        },
        error: function (xhr, status, error) {
          console.error("Có lỗi xảy ra: " + xhr.status);
          swal("Lỗi khi thực hiện yêu cầu!", {
            icon: "error",
          });

        }

      });

    });
  </script>
  <!--
MODAL
-->
  <!--
MODAL TÌNH TRẠNG
-->
  <div class="modal fade" id="addtinhtrang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row">
            <div class="form-group  col-md-12">
              <span class="thong-tin-thanh-toan">
                <h5>Thêm mới tình trạng</h5>
              </span>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Nhập tình trạng mới</label>
              <input id="tinhTrangInput" class="form-control" type="text" required>
            </div>
          </div>
          <BR>
          <button id="saveButton" class="btn btn-save" type="button">Lưu lại</button>
          <a class="btn btn-cancel" data-dismiss="modal" href="#">Hủy bỏ</a>
          <BR>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("saveButton").addEventListener("click", function () {
      var tinhtranginput = document.getElementById("tinhTrangInput").value;
      $.ajax({
        type: "POST",
        url: "index.php?page=addtt",
        data: { tinhTrangValue: tinhtranginput },

        success: function (response) {
          if (response.status === 'success') {
            swal({
              title: response.message,
              icon: 'success'
            }).then(function () {
              // Hiển thị thông báo sau khi reload trang
              location.reload();
            });
          } else {
            swal({
              title: response.message,

              icon: 'error'

            });
            console.log(response);
          }
        },
        error: function (xhr, status, error) {
          console.error("Có lỗi xảy ra: " + xhr.status);
          swal("Lỗi khi thực hiện yêu cầu!", {
            icon: "error",
          });

        }

      });

    });
  </script>