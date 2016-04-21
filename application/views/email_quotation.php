<!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
            <form action="<?php echo $action; ?>" method="post">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Email to Mr/Mrs/PT <?php echo $custkd; ?> - Quotation No <?php echo $kdquo; ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                    <input class="form-control" name="to" id="to" placeholder="To:"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="cc" id="cc" placeholder="Cc:"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="subject" id="subject" placeholder="Subject:"/>
                  </div>
                  <div class="form-group">
                    <textarea name="pesan" id="compose-textarea" class="form-control" style="height: 300px">
                      <h1>Dear <?php echo $custkd; ?>,</h1>
                      <h4>Thank you for contacting us.</h4> 

                      <p>
                        Your Quotation Number <?php echo $kdquo; ?> can be viewed, printed or downloaded as PDF from the link below.
                        Click to view Quotation
                        Looking forward to doing business with you.
                      </p> 


                      <p>Regards,</p> 
                      <p>yudhis_tiro</p>
                      <p>Kampung Bolang</p>
                      
                    </textarea>
                  </div>
                  <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attach" id="attach" />
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
                  <input type="hidden" name="from" id="from" />
                  <input type="hidden" name="judul" id="judul" />
                  <input type="hidden" name="kdform" id="kdform" value="<?php echo $kdquo; ?>" />
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    <button class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                  <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->