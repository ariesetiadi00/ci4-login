<?= $this->extend('layout/template_main'); ?>
<?= $this->section('content'); ?>

<div class="container w-75 justify-content-start">
    <!-- Member Insert and Update Modal-->
    <h1>Edit Member</h1>

    <hr>

    <div>

        <!-- Start Form -->
        <!-- INSERT and UPDATE Form -->
        <form id="member-form" action="/member/update" method="POST" class="user">

            <!-- ID place holder for javascript -->
            <input type="hidden" id="id" name="id" value="<?= $member['id'] ?>">

            <table class="table table-borderless">
                <!-- Image -->
                <tr>
                    <td>Profile Image</td>
                    <td>:</td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control" name="image" id="image" placeholder="Image" required autocomplete="off" value="<?= $member['image'] ?>">
                        </div>
                    </td>
                </tr>

                <!-- Name -->
                <tr>
                    <td>Name</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Insert Member Name" required autocomplete="off" value="<?= $member['name'] ?>">
                        </div>
                    </td>
                </tr>
                <!-- Address -->
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type=" text" class="form-control" name="address" id="address" placeholder="Address" required autocomplete="off" value="<?= $member['address'] ?>">
                        </div>
                    </td>
                </tr>
                <!-- Birth Place -->
                <tr>
                    <td>Place of Birth</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type=" text" class="form-control" name="birth_place" id="birth_place" placeholder="Place of birth" required autocomplete="off" value="<?= $member['birth_place'] ?>">
                        </div>
                    </td>
                </tr>
                <!-- Birth Date -->
                <tr>
                    <td>Date of Birth</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="Date of birth" required autocomplete="off" value="<?= $member['birth_date'] ?>">
                        </div>
                    </td>
                </tr>
                <!-- Religion -->
                <tr>
                    <td>Religion</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <select class="custom-select" name="religion" id="religion">
                                <option id=" option-default" hidden selected>Member Religion</option>
                                <!-- Loop religion list -->
                                <?php foreach ($religion as $r) : ?>
                                    <!-- If match, selected -->
                                    <?php if ($member['religion'] == $r['religion']) :  ?>
                                        <option selected><?= $r['religion'] ?></option>
                                    <?php else : ?>
                                        <option><?= $r['religion'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <!-- Phone -->
                <tr>
                    <td>Phone Number</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group">
                            <input type=" text" class="form-control" name="phone" id="phone" placeholder="Phone number" required autocomplete="off" value="<?= $member['phone'] ?>">
                        </div>
                    </td>
                </tr>
                <!-- Gender -->
                <tr>
                    <td>Gender</td>
                    <td>:</td>
                    <td>
                        <div class=" form-group d-flex justify-content-start">
                            <!-- Looping  Gender -->
                            <?php foreach ($gender as $g) : ?>
                                <?php if ($member['gender'] == $g['value']) : ?>

                                    <div class="mx-4">
                                        <input class="form-check-input" type="radio" name="gender" id="<?= $g['gender'] ?>" value="<?= $g['value'] ?>" checked>

                                        <label class="form-check-label" for="<?= $g['gender'] ?>">
                                            <?= $g['gender'] ?>
                                        </label>
                                    </div>

                                <?php else : ?>

                                    <div class="mx-4">
                                        <input class="form-check-input" type="radio" name="gender" id="<?= $g['gender'] ?>" value="<?= $g['value'] ?>">

                                        <label class="form-check-label" for="<?= $g['gender'] ?>">
                                            <?= $g['gender'] ?>
                                        </label>
                                    </div>

                                <?php endif; ?>
                            <?php endforeach; ?>


                        </div>
                    </td>
                </tr>
            </table>


            <div class=" modal-footer">
                <!-- Submit -->
                <button id="memberButton" type="submit" class="btn btn-primary btn-block">
                    Submit
                </button>
            </div>
        </form>
        <!-- End Form -->
    </div>
</div>


<?= $this->endSection(); ?>