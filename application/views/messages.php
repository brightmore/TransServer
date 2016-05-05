
<form class="row" action="<?php echo base_url('index.php/Dashboard/processMessage') ?>">      
    <?php if($this->session->flashdata('failure')) { ?>
        <div class="alert alert-danger">
                <?php echo $this->session->flashdata('failure') ?>
        </div>
    <?php } ?>
    <section class="col-lg-7">  
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <span>characters left: </span><span id="charactersLeft"></span>
                    <textarea class="textarea" placeholder="" id="messageSMS" style=" height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px; width:100%"></textarea>
                </div>
                <div  class="box-footer clearfix">
                    <button class="pull-right btn btn-default" id="sendMessage">Announcement<i class="fa fa-arrow-circle-right"></i></button> <button class="pull-right btn btn-default" id="sendMessage">Send SMS<i class="fa fa-arrow-circle-right"></i></button> <button class="pull-right btn btn-default" id="sendMessage">Send SMS<i class="fa fa-arrow-circle-right"></i></button>
                </div>

            </div>
        </div>
    </section>
    <section class="col-lg-5">
        <div class="box">
            <div class="box-body">
                <?php if($region == 'all') {?>
                <div class="row">
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" checked="true" class="regions_all" value="All"/> All</label>

                    </div>
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]"  class="regions" value="Ashanti"/> Ashanti</label>
                    </div>
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Greater Accra"/> Greater Accra</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Brong Ahafo"/> Brong Ahafo</label>
                    </div>
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Central"/> Central</label>
                    </div>
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Eastern"/> Eastern</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Volta"/> Volta</label>
                    </div>
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Upper East"/> Upper East</label>
                    </div>
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Upper West"/> Upper West</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Northern"/> Northern</label>
                    </div>
                    <div class="col-lg-4">
                        <label><input type="checkbox" name="region[]" class="regions" value="Western"/> Western</label>
                        
                    </div>
                   
                </div>
                <?php }else{ ?>
                    <input type="hidden" value="<?php echo $region ?>" name="region" />
                <?php } ?>
                <div class="form-group">
                    <label>Group</label>
                    <select name="group" id="groupSms" class="form-control">
                        <option value="members">Users</option>
                        <option value="counsellors">Counsellors</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
</form>                         
