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
<main class="app-content">
  <div class="app-title">
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="index.php?page=user"> Danh sách tài khoản</a></li>
      <li class="breadcrumb-item"><a href="index.php?page=themuser">Thêm tài khoản</a></li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Add Account</h3>
        <div class="tile-body">
          <form class="row" action="<?=APP_URL?>/Admin/addacout" method="post" autocomplete="off"
            enctype="multipart/form-data">
            <div class="form-group col-md-4">
              <label class="control-label">fist Name</label>
              <input name="first_name" class="form-control" type="text">
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Last Name</label>
              <input name="last_name" class="form-control" type="text">

            </div>
            <div class="form-group col-md-4">
              <label class="control-label">email</label>
              <input name="email" class="form-control" type="text">
            </div>
            <div class="form-group  col-md-4">
              <label class="control-label">address</label>
              <input name="address" class="form-control" type="text">

            </div>
            <div class="form-group  col-md-3">
              <label class="control-label">Tài khoản</label>
              <input name="tk" class="form-control" type="text">
             
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Password</label>
              <input name="pass" class="form-control" type="password">
            </div>
            <div class="form-group col-md-3">
              <label class="control-label">Vai trò</label>
              <select name="role" class="form-control" id="exampleSelect2">
                <option>-- Chọn vai trò --</option>
                <option value="0">Người dùng</option>
                <option value="1">Admin</option>
              </select>
            </div>

            <div class="form-group col-md-12">
              <label class="control-label">Chọn Avatar</label>
              <div id="myfileupload">
                <input type="file" id="uploadfile" name="img" onchange="readURL(this);" />
              </div>
              <div id="thumbbox">
                <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                <a class="removeimg" href="javascript:"></a>
              </div>
              <div id="boxchoice">
                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                <p style="clear:both"></p>
              </div>
              <div class="error">
                <?php
                checkerro();
                ?>
              </div>
            </div>


            <div>
              <input name="save" class="btn btn-save" type="submit" value="Lưu lại">
              <a class="btn btn-cancel" href="index.php?page=user">Hủy bỏ</a>
            </div>
          </form>

        </div>
      </div>
    </div>
</main>