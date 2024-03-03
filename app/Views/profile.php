<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                    width="150px" src="<?= APP_URL ?>public/upload/<?= $_SESSION['user']['img'] ?>">
                <span class="font-weight-bold">
                    <?= $_SESSION['user']['last_name'] ?>
                </span>
                <span class="text-black-50">
                    <?= $_SESSION['user']['email'] ?>

                </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Fistname</label>
                            <input name="firstName" type="text" class="form-control"
                                placeholder="<?= $_SESSION['user']['first_name'] ?>" value="">
                        </div>
                        <div class="col-md-6"><label class="labels">Lastname</label>
                            <input type="text" name="lastName" class="form-control" value=""
                                placeholder="<?= $_SESSION['user']['last_name'] ?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Address Line </label>
                            <input type="text" name="address" class="form-control"
                                placeholder="<?= $_SESSION['user']['address'] ?>" value="">
                        </div>
                        <div class="col-md-12"><label class="labels">Email ID</label>
                            <input type="text" name="email" class="form-control"
                                placeholder="<?= $_SESSION['user']['email'] ?>" value="">
                        </div>
                        <div class="col-md-12"><label class="labels">Avtart</label>
                            <input type="file" name="img" class="form-control" placeholder="Avtart"
                                value="<?= $_SESSION['user']['img'] ?>">
                            <input type="hidden" name="user_id" value="<?= $_SESSION['user']['customer_id'] ?>">
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <?php
                        checkerro();
                        ?>
                        <button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> -->
    </div>
</div>
</div>
</div>