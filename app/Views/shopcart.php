<div class="container mt-5">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Giỏ hàng</strong>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width:100px;">Ảnh</th>
                                <th>Sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <td>
                                    <img class="w-100" src="../upload/9598304710_2_1_1.jpg" alt="">
                                </td>
                                <td>Áo Phông Nam</td>
                                <td>100,000đ</td>
                                <td>2</td>
                                <td>200,000đ</td>
                                <td>
                                    <button type="button" class="btn btn-outline-danger">Xóa</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header text-center">
                        <strong>Hóa đơn</strong>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-6">Tạm tính:</div>
                            <div class="col-6 text-end">
                                <strong>200,000đ</strong>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">Mã giảm giá:</div>
                            <div class="col-6 text-end">
                                <input type="text" class="form-control" value="FREESHIP">
                                <strong>-18,000đ</strong>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-uppercase">
                                <strong>Tổng Tiền</strong>
                            </div>
                            <div class="col-6 text-end">
                                <strong>182,000đ</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mt-4 w-100 d-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Đặt Hàng
                </button>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thôn tin giao hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Xác nhận & đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>