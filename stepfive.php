
<div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="container">
            <hr>
          <div class="row">
              <!-- edit form column -->
              <div class="col-md-9 personal-info">
                <span style="font-size:15px;">Other person(s) to contact in case of emergency (if parent are unavailable):</span>
                <div class= "right" style="margin-bottom:5%">
                       <a href="#"><span class="btn btn-info" id="" style="float: right" onclick="addEmergency();" >ADD</span></a>
                </div>
                <div class="form-group" id="emergency">

                    <label class="col-lg-4 control-label left">Name:</label>
                    <div class="col-lg-9" style="margin-bottom: 2%">
                      <input class="form-control" type="text" name="txtEmName[]" id="txtEmName">
                    </div>

                    <label class="col-lg-4 control-label left">Relationship to Student:</label>
                    <div class="col-lg-9" style="margin-bottom: 2%">
                      <input class="form-control" type="text" name="txtEmRelation" id="txtEmRelation">
                    </div>

                    <label class="col-lg-4 control-label left">Tel/Mobile Number:</label>
                    <div class="col-lg-9" style="margin-bottom: 2%">
                      <input class="form-control" type="text" name="txtEmNum" id="txtEmNum">
                    </div>

                    <label class="col-lg-4 control-label left">Address:</label>
                    <div class="col-lg-9" style="margin-bottom: 2%">
                      <input class="form-control" type="text" name="txtEmAdd" id="txtEmAdd">
                    </div>
               </div>
              </div>
          </div>
        </div>
      </div>
      <!-- left column -->
    <center><div class="col-md-12">
      <div class="col-md-3">
        <div class="text-center" style="margin-top: 7%;">
        <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
        <h6>Guardian's Photo</h6>
        <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="text-center" style="margin-top: 7%;">
        <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
        <h6>Fetcher's photo</h6>
        <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
        </div>
      </div>
    </div></center>
  </div>
