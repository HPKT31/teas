
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col col-md-9">
      <div class="card">
        <div class="card-header text-center">
          <strong>Giỏ hàng</strong>
        </div>
        <table class="table align-middle text-center">
          <thead>
            <tr>
              <th style="width: 100px;">Ảnh</th>
              <th>Sản phẩm</th>
              <th>Giá bán</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <?php
          $TotalPrice = 0;
          $TotalPr = 0;
          $Ship = 5;

          if (isset($cart)) {
            foreach ($cart as $Pr) {
              if (isset($_SESSION['user'])) {
                ?>
                <tr class="align-middle">
                  <td>
                    <img class="w-100" src="<?= APP_URL ?>upload/<?= $Pr['tea_img']; ?>" alt="">
                  </td>
                  <td>
                    <?= $Pr['tea_name']; ?>
                  </td>
                  <td>$
                    <?= $Pr['price']; ?>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-outline-primary <?= $Pr['quantity'] ?>"
                      href="<?= APP_URL ?>product/cartItem/<?= $Pr['order_id'] ?>/<?= $Pr['tea_id'] ?>/more">+</a>
                    <?= $Pr['quantity']; ?>
                    <a class="btn btn-sm btn-outline-primary <?= $Pr['quantity'] <= 1 ? 'disabled' : '' ?>"
                      href="<?= APP_URL ?>product/cartItem/<?= $Pr['order_id'] ?>/<?= $Pr['tea_id'] ?>/less">-</a>

                  </td>
                  </td>
                  <td>$
                    <?= $Pr['price'] * $Pr['quantity']; ?>
                  </td>
                  <td>
                    <a class="btn btn-outline-danger"
                      href="<?= APP_URL ?>product/cartItem/<?= $Pr['order_id'] ?>/<?= $Pr['tea_id'] ?>/delete">Xóa</a>
                  </td>
                </tr>
                <?php
                $TotalPr += $Pr['quantity'];
                $TotalPrice += $Pr['price'] * $Pr['quantity'];
              } else {
                if (!empty($_SESSION['cart'])) {
                  ?>
                  <tr class="align-middle">
                    <td>
                      <img class="w-100" src="<?= APP_URL ?>upload/<?= $Pr['tea_img']; ?>" alt="">
                    </td>
                    <td>
                      <?= $Pr['tea_name']; ?>
                    </td>
                    <td>$
                      <?= $Pr['price']; ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-outline-primary <?= $Pr['Count'] >= $Pr['stock_quantity'] ? 'disabled' : '' ?>"
                        href="<?= APP_URL?>product/acction/cartItem/<?= $Pr['tea_id'] ?>/more">+</a>
                      <?= $Pr['Count']; ?>
                      <a class="btn btn-sm btn-outline-primary <?= $Pr['Count'] <= 1 ? 'disabled' : '' ?>"
                        href="<?= APP_URL?>product/acction/cartItem/<?= $Pr['tea_id'] ?>/less">-</a>
                    </td>
                    <td>$
                      <?= $Pr['price'] * $Pr['Count']; ?>
                    </td>
                    <td>
                      <a class="btn btn-outline-danger" href="<?= APP_URL ?>product/acction/delete/<?= $Pr['tea_id'] ?>">Xóa</a>
                    </td>
                  </tr>
                  <?php
                  $TotalPr += $Pr['Count'];
                  $TotalPrice += $Pr['price'] * $Pr['Count'];
                }
              }
            }
          }
          ?>

        </table>
      </div>
    </div>
    <div class="col col-md-3">
      <div class="card">
        <div class="card-header">
          <strong>Hóa đơn</strong>
        </div>
        <div class="card-body">
          <div class="row mb-2">
            <div class="col col-6">
              Tạm tính:
            </div>
            <div class="col col-6 text-end">
            $<?=$TotalPrice?>
          
            </div>
          </div>
          <div class="row mb-2">
            <div class="col col-6">
              Phí giao hàng
            </div>
            <div class="col col-6 text-end">
            $<?=$Ship?>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col col-6">
              Mã giảm giá

            </div>
            <div class="col col-6 text-end">
            <?php 
                    $GiaGiam = 0;
                    // $voucher
                    if(isset($voucher[0]['percentage'])) {
                        $GiaGiam = $voucher[0]['percentage'];
                       
                     }
                   
                    //  elseif(isset($voucher['Ratio'])){
                    //     $GiaGiam = min(
                    //         ($TotalPrice + $ShipPrice)*$voucher['Ratio']/100,
                    //         $Voucher['MaxSale']
                    //     );
                    // }
                  
                    ?>
                    <?= (isset($GiaGiam) ? $GiaGiam : '')?>
                   
            </div>
          </div>
          <div class="col col-8 text-end">
            <div class="row mb-2">
              <form action="<?= APP_URL ?>oder/addVoucher" method="POST">
                <div class="input-group ">
                  <input type="text" name="voucher" class="form-control" placeholder="Enter voucher code"
                    aria-label="Enter voucher code" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-primary">Apply</button>
                  </div>
                </div>
                <input type="hidden" name="MaDH" value="<?= (isset($Pr['order_id'])?$Pr['order_id']:'')  ?>">
              </form>
            </div>
          </div>
          <div class="row mb-2">
            <?php
            checkerro();
            ?>
            <div class="col col-6">
              TÔNG TIỀN:
              $<?=number_format($TotalPrice+$Ship-$GiaGiam)?> 

              
            </div>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-primary btn-dark mt-4 w-100 d-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Đặt Hàng
        </button>
    </div>
  </div>
</div>

    



<!-- Modal -->
<form action="<?=APP_URL?>Oder/addOrder" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông tin giao hàng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="HoTen" class="form-label">Họ Tên</label>
                    <input type="text" class="form-control" id="HoTen" placeholder="Nhập họ và tên">
                </div>
                <div class="mb-3">
                    <label for="DienThoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="DienThoai" placeholder="Nhập số điện thoại">
                </div>
                <div class="mb-3">
                    <label for="DiaChi" class="form-label">Địa chỉ nhận hàng</label>
                    <input type="text" class="form-control" id="DiaChi" placeholder="Nhập địa chỉ nhận hàng">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Xác nhận & đặt hàng</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="order_id" value="<?= (isset($Pr['order_id'])?$Pr['order_id']:'') ?>">
<input type="hidden" name="TongTien" value="<?= $TotalPrice?>">
<input type="hidden" name="Count" value="<?=$TotalPr?>">
</form>



