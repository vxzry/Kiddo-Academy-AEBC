
<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center" style="margin-top: 7%;">
        <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
        <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
        </div>
      </div>
      <!-- edit form column -->
      <div class="col-md-9 personal-info">


          <div class="form-group" style=" margin-top:5%; margin-bottom:11%;">
            <center><label class="col-lg-3 control-label"> First Name: <span style="color:red; padding:5%;">*</span></label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudFname" placeholder="Student's First Name" required>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:17%">
            <center><label class="col-lg-3 control-label"> Middle Name: </label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudMname" placeholder="Student's Middle Name" >
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:23%">
            <center><label class="col-lg-3 control-label"> Last Name: <span style="color:red; padding:5%;">*</span></label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudLname" placeholder="Student's Last Name" required>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:29%">
            <center><label class="col-lg-3 control-label"> Birthdate: <span style="color:red; padding:5%;">*</span></label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:36%">
                <div class="input-group-addon">
                  <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
                <input type="date" class="form-control" name="txtStudBday" placeholder="Student's Birthdate" required>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:35%;">
            <center><label class="col-lg-3 control-label left">Birthplace: <span style="color:red; padding:5%;">*</span></label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudBplace" id="txtStudBplace" placeholder="Student's Birthplace" required>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:41%;">
            <center><label class="col-lg-3 control-label left">Nationality:</label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:36%;">
                <div class="input-group-addon">
                  <i class="fa fa-flag" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudNat" id="txtStudNat" placeholder="Student's Nationality" >
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:47%;">
            <center><label class="col-lg-3 control-label left">Religion:</label></center>
            <div class="col-lg-8">
              <div class="input-group" style="width:36%;">
                <div class="input-group-addon">
                  <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudReligion" id="txtStudReligion" placeholder="Student's Religion" >
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:53%;">
            <center><label class="col-lg-3 control-label"> Home Address: <span style="color:red; padding:5%;">*</span></label></center>
            <div class="col-lg-6">
              <div class="input-group" style="width:41%">
                <div class="input-group-addon">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudAddBldg" id="txtStudAddBldg" placeholder="Unit/Bldg. No." required >
              </div>
            </div>
            <div class="col-lg-6" style="width:20%; margin-left:-260px;">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtStudAddSt" id="txtStudAddSt">
            </div>
            <div class="col-lg-6" style="width:20%; margin-left:-102px;">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtStudAddBrgy" id="txtStudAddBrgy">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:59%;">
            <label class="col-lg-3 control-label left"></label>
            <div class="col-lg-6" style="width:33%">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtStudAddCity" id="txtStudAddCity" required>
            </div>

            <div class="col-lg-3" style="margin-left:-15px;">
              <input class="form-control" type="text" value="Philippines" name="txtStudAddCountry" id="txtStudAddCountry">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:65%;">
            <center><label class="col-lg-3 control-label">First Language:</label></center>
            <div class="col-lg-8" style="width:27%;">
              <div class="input-group" >
                <div class="input-group-addon">
                  <i class="fa fa-language" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudLang1" id="txtStudLang1" placeholder="First Language" >
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:58%;">
            <center><label class="col-lg-3 control-label">Second Language:</label></center>
            <div class="col-lg-8" style="width:27%;">
              <div class="input-group" >
                <div class="input-group-addon">
                  <i class="fa fa-language" aria-hidden="true"></i>
                </div>
                <input type="text" class="form-control" name="txtStudLang2" id="txtStudLang2" placeholder="Second Language" >
              </div>
            </div>
          </div>
      </div>
  </div>
