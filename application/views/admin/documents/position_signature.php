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
              &nbsp; Set Signature Position </h3>
          </div>

          <div class="d-inline-block float-right" style="padding: 0px 5px 0px 5px;">
            <a onclick="return confirm('Are you sure you want to sign this')" href="<?php echo base_url('admin/sign_documents/sign_folder/' . ($folderId * 786)); ?>" class="btn btn-warning float-right add-new-file-btn">Sign documents</a>
          </div>
          <div class="d-inline-block float-right" style="padding: 0px 5px 0px 5px;">
            <a href="<?php echo base_url('admin/sign_documents/update_folder/' . ($folderId * 786)); ?>" class="btn btn-warning float-right add-new-file-btn">Update Signature</a>
          </div>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <?php if (count($pdfFiles) > 0) : ?>
                    <div class="row">

                      <div class="col-3">
                        <table class="table table-borderless">
                          <tbody>
                            <?php $cnt = 1; ?>
                            <?php foreach ($pdfFiles as $file) : ?>
                              <tr>
                                <td><?php echo $cnt;
                                    $cnt++; ?></td>
                                <td>
                                  <a target="popup" onclick="window.open('<?= base_url('admin/upload_documents/view_file/' . ($file->file_id)) ?>', 'popup','width=1200,height=1200'); return false;" href="javascript:void(0)"><?php echo $file->file_name; ?></a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="col-9">
                        &nbsp;
                      </div>
                    </div>
                  <?php else : ?>
                    <div class="row">

                      <div class="col-12">
                        <span>No Pdf file found.</span>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>