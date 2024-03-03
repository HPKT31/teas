<div class="container mt-5">
        <h1 class="mb-4">Theo Dõi Đơn Hàng</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Khách Hàng</th>
                    <th scope="col">Ngày Đặt Hàng</th>
                    <th scope="col">Trạng Thái</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($list as $l ):
                    $i =0;
                    ?>
              
                <tr>
                    <th scope="row"><?=$i++ ?></th>
                    <td><?=$l['order_id'] ?></td>
                    <td><?=$l['order_date'] ?></td>
                    <td>
         
                        <?php
                        switch ($l['statuses']) {
                            case'suly';
                            echo'<span class="badge bg-warning"> xử lý';
                            break;
                            case'huydon';
                            echo'<span class="badge bg-danger"> Hủy Đơn';
                            break;
                            case 'giaohang';
                            echo'<span class="badge bg-primary"> Đang tới bạn';
                            break;
                            
                        }
                        ?>
                    </span></td>
                    <td><?=$l['quantity'] ?></td>
                    <td>
                        <?php if($l['statuses'] =='suly') :?>
                            <a class="btn btn-danger btn-cancel" href="<?=APP_URL?>oder/deleteoder/<?=$l['order_id']?>">Hủy Hàng</a>
                        <?php elseif($l['statuses'] == 'giaohang') :?>
                        <button class="btn btn-warning btn-return" data-order-id="1">đanh gia</button>
                        <?php endif ?>
                    </td>
                </tr>
                    
                <?php endforeach; ?>
                <!-- <tr>
                    <th scope="row">2</th>
                    <td>Jane Smith</td>
                    <td>2024-01-28</td>
                    <td><span class="badge bg-warning">Đang Giao Hàng</span></td>
                </tr> -->
                <!-- Thêm dữ liệu đơn hàng khác ở đây -->
            </tbody>
        </table>
    </div>