  <!-- Content Wrapper. Contains page content -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css-sign/signature-pad.css">
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css-sign/ie9.css">
  <![endif]-->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="card card-default">
        <div class="card-header">
          <div class="d-inline-block">
            <h3 class="card-title"> <i class="fa fa-plus"></i>
              <?php if (!empty($record->folder_id)) : ?>
                &nbsp; Update Signature </h3>
          <?php else : ?>
            &nbsp; Add Signature </h3>
          <?php endif; ?>
          </div>
          <div class="d-inline-block float-right" style="padding: 0px 5px 0px 5px;">
            <a href="<?php echo base_url('admin/sign_documents/position_signature/' . ($record->folder_id * 786)); ?>" class="btn btn-warning float-right add-new-file-btn">Set Position</a>
          </div>
          <div class="d-inline-block float-right" style="padding: 0px 5px 0px 5px;">
            <a href="<?php echo base_url('admin/sign_documents/uncompleted/'); ?>" class="btn btn-warning float-right add-new-file-btn">Back</a>
          </div>
        </div>
        <div class="card-body">

          <!-- For Messages -->
          <?php $this->load->view('admin/includes/_messages.php') ?>

          <?php echo form_open_multipart(base_url('admin/sign_documents/update_folder/' . ($record->folder_id * 786))); ?>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">

                  <div class="form-group">
                    <label for="company_name" class="control-label"><?= trans('company_name') ?></label>
                    <input disabled type="text" name="company_name" class="form-control" id="company_name" value="<?php echo $record->company_name; ?>" placeholder="Folder name here...">
                  </div>

                  <div class="form-group">
                    <label for="address1" class="control-label"><?= trans('address_line') ?></label>
                    <input disabled type="text" name="address1" class="form-control" id="address1" value="<?php echo $record->address; ?>" placeholder="Address here...">
                  </div>

                  <div class="form-group">
                    <label for="email" class="control-label"><?= trans('email') ?></label>
                    <input disabled type="email" name="email" class="form-control" id="email" value="<?php echo $record->email; ?>" placeholder="Email here...">
                  </div>
                  <div class="form-group">
                    <label for="mobile_no" class="control-label"><?= trans('mobile_no') ?></label>
                    <input disabled type="number" name="mobile_no" class="form-control" id="" value="<?php echo $record->mobile_no; ?>" placeholder="Mobile number here...">
                  </div>
                  <div class="form-group">
                    <label for="role" class="col-md-12 control-label"><?= trans('capture_role') ?></label>

                    <div class="col-md-12">
                      <select disabled name="capture_role" class="form-control">
                        <option value=""><?= trans('select_role') ?></option>
                        <?php foreach ($records as $role) : ?>
                          <option value="<?= $role->user_id; ?>" <?php echo ($role->user_id == $record->capture_role_id) ? 'selected' : '' ?>><?= $role->username; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="signature" class="control-label"><?= trans('signature') ?>
                      <!-- <a href="#" data-toggle="modal" data-target="#myModal"> by clicking here</a> -->
                    </label>
                    <input type="file" onchange="resetSignatureDataUrl()" name="signature" class="form-control calcEvent" id="signature">
                    <div id="signature-pad" class="signature-pad">
                      <div class="signature-pad--body">
                        <canvas></canvas>
                      </div>
                      <div class="signature-pad--footer">
                        <div class="signature-pad--actions">
                          <div>
                            <button type="button" class="button submit" data-action="submit">Done</button>
                            <button type="button" class="button clear" data-action="clear">Clear</button>
                            <!-- <button type="button" class="button" data-action="change-color">Change color</button>
                            <button type="button" class="button" data-action="undo">Undo</button> -->

                          </div>
                          <!-- <div>
                            <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                            <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                            <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                          </div> -->
                        </div>
                      </div>
                    </div>
                    <div class="row" style="display:none;">
                      <div class="col-md-12">
                        <input type="text" id="sig-dataUrl" name="signature_dataurl" value="<?php echo $this->session->flashdata('signature_dataurl'); ?>" />
                      </div>
                    </div>
                    <br />
                    <div class="row">
                      <div class="col-md-12">
                        <img id="sig-image" style="<?php echo (base_url('assets/signatures/') . $record->signature ? 'display:block;' : 'display:none;') ?>" src="<?= !empty($record->signature) ? base_url('assets/signatures/') . $record->signature : 'https://via.placeholder.com/140x100.png?text=No+signature' ?>" class="signature-preview" alt="e-signature preview here!" />
                      </div>
                    </div>
                  </div>

                  <input type="submit" name="submit" value="Update" class="btn btn-primary pull-right">
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </section>
  </div>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">E-Signature</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->

        <div class="modal-body">

          <!-- <div class="container">
            <div class="row">
              <div class="col-md-12">
                <canvas id="sig-canvas" width="420" height="160">
                  Get a better browser, bro.
                </canvas>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
                <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
              </div>
            </div>
            <br />
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>assets/js-sign/signature_pad.js"></script>
  <script src="<?= base_url() ?>assets/js-sign/app.js"></script>
  <script type="text/javascript">
    function resetSignatureDataUrl() {
      document.getElementById('sig-dataUrl').value = '';
      document.getElementById('sig-image').style.display = 'none';
    }
    // (function() {
    //   window.requestAnimFrame = (function(callback) {
    //     return window.requestAnimationFrame ||
    //       window.webkitRequestAnimationFrame ||
    //       window.mozRequestAnimationFrame ||
    //       window.oRequestAnimationFrame ||
    //       window.msRequestAnimaitonFrame ||
    //       function(callback) {
    //         window.setTimeout(callback, 1000 / 60);
    //       };
    //   })();

    //   var canvas = document.getElementById("sig-canvas");
    //   var ctx = canvas.getContext("2d");
    //   ctx.strokeStyle = "#222222";
    //   ctx.lineWidth = 4;

    //   var drawing = false;
    //   var mousePos = {
    //     x: 0,
    //     y: 0
    //   };
    //   var lastPos = mousePos;

    //   canvas.addEventListener("mousedown", function(e) {
    //     drawing = true;
    //     lastPos = getMousePos(canvas, e);
    //   }, false);

    //   canvas.addEventListener("mouseup", function(e) {
    //     drawing = false;
    //   }, false);

    //   canvas.addEventListener("mousemove", function(e) {
    //     mousePos = getMousePos(canvas, e);
    //   }, false);

    //   // Add touch event support for mobile
    //   canvas.addEventListener("touchstart", function(e) {

    //   }, false);

    //   canvas.addEventListener("touchmove", function(e) {
    //     var touch = e.touches[0];
    //     var me = new MouseEvent("mousemove", {
    //       clientX: touch.clientX,
    //       clientY: touch.clientY
    //     });
    //     canvas.dispatchEvent(me);
    //   }, false);

    //   canvas.addEventListener("touchstart", function(e) {
    //     mousePos = getTouchPos(canvas, e);
    //     var touch = e.touches[0];
    //     var me = new MouseEvent("mousedown", {
    //       clientX: touch.clientX,
    //       clientY: touch.clientY
    //     });
    //     canvas.dispatchEvent(me);
    //   }, false);

    //   canvas.addEventListener("touchend", function(e) {
    //     var me = new MouseEvent("mouseup", {});
    //     canvas.dispatchEvent(me);
    //   }, false);

    //   function getMousePos(canvasDom, mouseEvent) {
    //     var rect = canvasDom.getBoundingClientRect();
    //     return {
    //       x: mouseEvent.clientX - rect.left,
    //       y: mouseEvent.clientY - rect.top
    //     }
    //   }

    //   function getTouchPos(canvasDom, touchEvent) {
    //     var rect = canvasDom.getBoundingClientRect();
    //     return {
    //       x: touchEvent.touches[0].clientX - rect.left,
    //       y: touchEvent.touches[0].clientY - rect.top
    //     }
    //   }

    //   function renderCanvas() {
    //     if (drawing) {
    //       ctx.moveTo(lastPos.x, lastPos.y);
    //       ctx.lineTo(mousePos.x, mousePos.y);
    //       ctx.stroke();
    //       lastPos = mousePos;
    //     }
    //   }

    //   // Prevent scrolling when touching the canvas
    //   document.body.addEventListener("touchstart", function(e) {
    //     if (e.target == canvas) {
    //       e.preventDefault();
    //     }
    //   }, false);
    //   document.body.addEventListener("touchend", function(e) {
    //     if (e.target == canvas) {
    //       e.preventDefault();
    //     }
    //   }, false);
    //   document.body.addEventListener("touchmove", function(e) {
    //     if (e.target == canvas) {
    //       e.preventDefault();
    //     }
    //   }, false);

    //   (function drawLoop() {
    //     requestAnimFrame(drawLoop);
    //     renderCanvas();
    //   })();

    //   function clearCanvas() {
    //     canvas.width = canvas.width;
    //   }

    //   // Set up the UI
    //   var sigText = document.getElementById("sig-dataUrl");
    //   var sigImage = document.getElementById("sig-image");
    //   var clearBtn = document.getElementById("sig-clearBtn");
    //   var submitBtn = document.getElementById("sig-submitBtn");
    //   clearBtn.addEventListener("click", function(e) {
    //     clearCanvas();
    //     sigText.value = "";
    //     sigImage.setAttribute("src", "");
    //     sigImage.style.display = 'none';
    //   }, false);
    //   submitBtn.addEventListener("click", function(e) {
    //     const blank = document.createElement('canvas');
    //     blank.width = canvas.width;
    //     blank.height = canvas.height;
    //     var isCanvasBlank = canvas.toDataURL() === blank.toDataURL();
    //     if (isCanvasBlank) {
    //       alert('Canvas is blank.')
    //     } else {
    //       var dataUrl = canvas.toDataURL('image/png');
    //       sigText.value = dataUrl;
    //       sigImage.setAttribute("src", dataUrl);
    //       sigImage.style.display = 'block';
    //       document.getElementById('signature').value = '';
    //     }
    //   }, false);

    // })();
  </script>