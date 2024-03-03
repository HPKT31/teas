<main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="#"><b>Bảng điều khiển</b></a></li>
          </ul>
          <div  id="clock"></div>
        </div>
      </div>
    </div>
    <div class="row">
      <!--Left-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
       <!-- col-6 -->
       <div class="col-md-6">
        <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
          <div class="info">
            <?php 
        
            echo '
              <h4>Tổng khách hàng</h4>
              <p><b>'.count($user).' khách hàng</b></p>
            ';
            ?>
           
            <p class="info-tong">Tổng số khách hàng được quản lý.</p>
          </div>
        </div>
      </div>
       <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
              <div class="info">
                <?php 
            
                  echo '
                    <h4>Tổng sản phẩm</h4>
                    <p><b>'.count($teas).' sản phẩm</b></p>
                  ';
                ?>
               
                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <div class="col-md-6">
            <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
              <div class="info">
                <?php 
              
                  echo '
                    <h4>Tổng đơn hàng</h4>
                    <p><b>'.count($bill).' đơn hàng</b></p>
                  ';
                ?>
                
                <p class="info-tong">Tổng số hóa đơn bán hàng trong tháng.</p>
              </div>
            </div>
          </div>
           <!-- col-6 -->
          <!-- <div class="col-md-6">
            <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
              <div class="info">
              
                <p class="info-tong">Tổng số loại hàng hiện có.</p>
              </div>
            </div>
          </div> -->
           <!-- col-12 -->
           <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Tình trạng đơn hàng</h3>
              <div>
              <div class="table-responsive-sm">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>ID đơn hàng</th>
                      <th>Tên khách hàng</th>
                      <th>Tổng tiền</th>
                      <th>Trạng thái</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      // foreach($kqhd as $hd) {
                      //   echo '
                      //   <tr>
                      //     <td>'.$hd['id'].'</td>
                      //     <td>'.$hd['ten'].'</td>
                      //     <td>
                      //     '.$hd['tongtien'].' đ
                      //     </td>';
                    ?>
                    <?php 
                        //   if($hd['tinhtrang'] === "Đang vận chuyển"){
                        //     echo '
                        //       <td><span class="badge bg-warning">'.$hd['tinhtrang'].'</span></td>
                        //     ';
                        //   }else if($hd['tinhtrang'] === "Chờ xử lý") {
                        //     echo '
                        //       <td><span class="badge bg-info">'.$hd['tinhtrang'].'</span></td>
                        //     ';
                        //   }else if($hd['tinhtrang'] === "Đã hủy"){
                        //     echo '
                        //     <td><span class="badge bg-danger">'.$hd['tinhtrang'].'</span></td>
                        //     ';
                        //   }
                        //   else {
                        //     echo '
                        //       <td><span class="badge bg-success">'.$hd['tinhtrang'].'</span></td>
                        //     ';
                        //   }
                        // echo '</tr>';
                      ?>    
                  </tbody>
                </table>
              </div>
              </div>
            </div>
           </div>
            <!-- / col-12 -->
             <!-- col-12 -->
            <div class="col-md-12">
                <div class="tile">
                  <h3 class="tile-title">Khách hàng mới</h3>
                <div>
                <div class="table-responsive-sm">

                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // $kq = user_new();
                      // foreach ($kq as $user){
                      //   echo '
                      //   <tr>
                      //     <td>'.$user['id'].'</td>
                      //     <td>'.$user['ten'].'</td>
                      //     <td>'.$user['email'].'</td>
                      //     <td><span class="tag tag-success">'.$user['sdt'].'</span></td>
                      //   </tr>
                      //     ';
                      // }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
              </div>
            </div>
             <!-- / col-12 -->
        </div>
      </div>
      <!--END left-->
      <!--Right-->
      <div class="col-md-12 col-lg-6">
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Dữ liệu 6 tháng đầu vào</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="tile">
              <h3 class="tile-title">Thống kê 6 tháng doanh thu</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!--END right-->
    </div>


    
  </main>
  <!-- <script src="Assets/js/js/jquery-3.2.1.min.js"></script> -->
  <!--===============================================================================================-->
  <!-- <script src="Assets/js/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script> -->
  <!--===============================================================================================-->
  <!-- <script src="Assets/js/bootstrap.min.js"></script> -->
  <!--===============================================================================================-->
  <!-- <script src="Assets/js/main.js"></script> -->
  <!--===============================================================================================-->
  <!-- <script src="Assets/js/plugins/pace.min.js"></script> -->
  <!--===============================================================================================-->
  <!-- <script type="text/javascript" src="Assets/js/js/plugins/chart.js"></script> -->
  <!--===============================================================================================-->
  <script type="text/javascript">
  
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
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
  </script>
  