
<div class="container">
    <hr>
  <div class="row">
    <center><h3>Father's Information</h3></center>
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center" style="margin-top: 7%;">
        <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
        <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">

          <div class="form-group" style="margin-top:3%;margin-bottom:9%;">
            <label class="col-lg-2 control-label left">First name: <span style="color:red; padding:5%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherFname" id="txtFatherFname" required>
              </div>
            </div>
          </div>


          <div class="form-group" style="margin-bottom:15%;">
            <label class="col-lg-2 control-label left">Middle name: </label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherMname" id="txtFatherMname">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:21%;">
            <label class="col-lg-2 control-label left">Last name: <span style="color:red; padding:5%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherLname" id="txtFatherLname" required>
              </div>
            </div>
          </div>


          <div class="form-group" style="margin-bottom:27%;">
            <label class="col-lg-2 control-label left">Mobile Number: <span style="color:red; padding:2%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-mobile" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherNum" id="txtFatherNum" required maxlength="11">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:33%;">
            <label class="col-lg-2 control-label left">E-mail Address: <span style="color:red; padding:2%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="email" name="txtFatherEmail" id="txtFatherEmail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:39%;">
            <label class="col-lg-2 control-label left">Home Address: <span style="color:red; padding:2%;">*</span></label>
            <div class="col-lg-3">
              <div class="input-group" style="width:80%;">
                <div class="input-group-addon">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherAddBldg" id="txtFatherAddBldg" required>
              </div>
            </div>
            <div class="col-lg-3" style="width:20%; margin-left:-60px;">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherAddSt" id="txtFatherAddSt">
            </div>
            <div class="col-lg-3" style="width:20%; margin-left:-23px;">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherAddBrgy" id="txtFatherAddBrgy">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:45%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6" style="width:33%">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherAddCity" id="txtFatherAddCity" required>
            </div>
            <div class="col-lg-2" style="margin-left:-15px;">
              <input class="form-control" type="text" value="Philippines" name="txtFatherAddCountry" id="txtFatherAddCountry">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:51%;">
            <label class="col-lg-2 control-label left">Home Tel. Number: </label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherTelnum" id="txtFatherTelnum">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:57%;">
            <label class="col-lg-2 control-label left">Occupation/Title:</label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-id-card-o" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherJob" id="txtFatherJob">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:63%;">
            <label class="col-lg-2 control-label left">Company Name:</label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-industry" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherCompany" id="txtFatherCompany">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:69%;">
            <label class="col-lg-2 control-label left">Company Address:</label>
            <div class="col-lg-3">
              <div class="input-group" style="width:80%;">
                <div class="input-group-addon">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtFatherComAddBldg" id="txtFatherComAddBldg">
              </div>
            </div>
            <div class="col-lg-3" style="width:20%; margin-left:-60px;">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtFatherComAddSt" id="txtFatherComAddSt">
            </div>
            <div class="col-lg-3" style="width:20%; margin-left:-23px;">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtFatherComAddBrgy" id="txtFatherComAddBrgy">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:75%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6" style="width:33%">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtFatherComAddCity" id="txtFatherComAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtFatherComAddCountry" id="txtFatherComAddCountry">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:51%;">
            <label class="col-lg-2 control-label left">Work Phone Number: </label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtFatherComNum" id="txtFatherComNum">
              </div>
            </div>
          </div>

      </div>
  </div>
</div>


 <div class="container">
    <hr>
  <div class="row">
      <center><h3>Mother's Information</h3></center>
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center" style="margin-top: 7%;">
        <img src="//placehold.it/200" id="profile-img-tag" class="avatar img-thumbnail" width="200px" />
        <input type="file" class="text-center center-block well well-sm" name="file" id="profile-img" accept="image/*" style="margin-top:3%;" required>
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">

          <div class="form-group" style="margin-top:3%; margin-bottom:9%;">
            <label class="col-lg-2 control-label left">First name: <span style="color:red; padding:5%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherFname" id="txtMotherFname" required>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:15%;">
            <label class="col-lg-2 control-label left">Middle name:</label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherMname" id="txtMotherMname">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:21%;">
            <label class="col-lg-2 control-label left">Last name: <span style="color:red; padding:5%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherLname" id="txtMotherLname" required>
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:27%;">
            <label class="col-lg-2 control-label left">Mobile Number <span style="color:red; padding:5%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-mobile" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherNum" id="txtMotherNum">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:33%;">
            <label class="col-lg-2 control-label left">E-mail Address: <span style="color:red; padding:5%;">*</span></label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="email" name="txtMotherEmail" id="txtMotherEmail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
              </div>
            </div>
          </div>

          <div class="form-group" style="margin-bottom:39%;">
            <label class="col-lg-2 control-label left">Home Address:<span style="color:red; padding:5%;">*</span></label>
            <div class="col-lg-3">
              <div class="input-group" style="width:80%;">
                <div class="input-group-addon">
                  <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherAddBldg" id="txtMotherAddBldg" required>
              </div>
            </div>

            <div class="col-lg-3" style="margin-left:-55px;">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherAddSt" id="txtMotherAddSt">
            </div>

            <div class="col-lg-3" style="margin-left:-20px;">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherAddBrgy" id="txtMotherAddBrgy">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:45%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6" style="width:33%">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherAddCity" id="txtMotherAddCity" required>
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtMotherAddCountry" id="txtMotherAddCountry">
            </div>
          </div>

          <div class="form-group" style="margin-bottom:51%;">
            <label class="col-lg-2 control-label left">Home Tel. Number:</label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherTelnum" id="txtMotherTelnum">
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:57%;">
            <label class="col-lg-2 control-label left">Occupation/Title:</label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-id-card-o" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherJob" id="txtMotherJob">
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:63%;">
            <label class="col-lg-2 control-label left">Company Name:</label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-industry" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherCompany" id="txtMotherCompany">
              </div>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:69%;">
            <label class="col-lg-2 control-label left">Company Address:</label>
            <div class="col-lg-3">
              <div class="input-group" style="width:80%;">
                <div class="input-group-addon">
                  <i class="fa fa-building" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" placeholder="Unit/Bldg. No." name="txtMotherComAddBldg" id="txtMotherComAddBldg">
              </div>
            </div>
            <div class="col-lg-3" style="margin-left:-55px;">
              <input class="form-control" type="text" placeholder="Street Name/No." name="txtMotherComAddSt" id="txtMotherComAddSt">
            </div>
            <div class="col-lg-3" style="margin-left:-19px;">
              <input class="form-control" type="text" placeholder="Brgy. Name/No." name="txtMotherComAddBrgy" id="txtMotherComAddBrgy">
            </div>
          </div>
          <div class="form-group" style="margin-bottom:75%;">
            <label class="col-lg-2 control-label left"></label>
            <div class="col-lg-6" style="width:33%">
              <input class="form-control" type="text" placeholder="City/Municipality" name="txtMotherComAddCity" id="txtMotherComAddCity">
            </div>
            <div class="col-lg-2">
              <input class="form-control" type="text" value="Philippines" name="txtMotherComAddCountry" id="txtMotherComAddCountry">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label left">Work Phone Number:</label>
            <div class="col-lg-8">
              <div class="input-group" style="width:60%;">
                <div class="input-group-addon">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                </div>
                <input class="form-control" type="text" name="txtMotherComNum" id="txtMotherComNum">
              </div>
            </div>
          </div>

      </div>
  </div>
</div>

<div class="container">
    <hr>
  <div class="row">

<!-- edit form column -->
<div class="col-md-6 personal-info">

 <div class="form-group" style="margin-bottom:10%;">
      <label class="col-lg-4 control-label left">Parent Status:</label>
      <div class="col-lg-8">
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Parents Married"/>Parents Married
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Father Deceased"/>Father Deceased
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Father Remarried"/>Father Remarried
              </label>
            </div>
            <div class="checkbox">
              <label>
                 <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Mother Deceased"/>Mother Deceased
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Mother Remarried"/>Mother Remarried
              </label>
            </div>
            <div class="checkbox">
              <label>
                 <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Applicant Adopted"/>Applicant Adopted
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Single Parent"/>Single Parent
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="flat-red" name="chkParentStat[]" id="chkParentStat" value="Parents Separated/Divorced"/>Parents Separated/Divorced
              </label>
            </div>

    </div><!-- col-lg-8  -->
  </div><!-- form group -->
</div><!-- col-md-6 -->


<div class="col-md-4 personal-info">

  <div class="form-group" style="margin-bottom:5%;">
            <label class="col-lg-5 control-label left">Applicant Lives With:</label>
            <div class="col-lg-7">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Father and Mother"/>Father and Mother
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Stepfather and Mother"/>Stepfather and Mother
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Father"/>Father
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Stepmother and Father"/>Stepmother and Father
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Mother"/>Mother
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" class="flat-red" name="chkLivesWith[]" id="chkLivesWith" value="Relative/s"/>Relative/s
                    </label>
                  </div>

      </div><!-- col-lg-8 -->
  </div><!-- form group -->
</div><!-- col-md-6 -->


  </div><!-- row -->
</div><!-- container -->

<div class="container">
    <hr>
  <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Siblings</h3>
        <div class= "right" style="margin-bottom:5%">
               <a href="#"><span class="btn btn-info" id="siblingbutton" style="float: right" onclick="addSibling();" >ADD</span></a>
        </div>
        <div class="form-group" id="sibling">

            <label class="col-lg-4 control-label left">Name:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtSiblName[]" id="txtSiblName">
            </div>

            <label class="col-lg-4 control-label left">Age:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtSiblAge[]" id="txtSiblAge">
            </div>

            <label class="col-lg-4 control-label left">Grade/Level:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtSiblGrd[]" id="txtSiblGrd">
            </div>

            <label class="col-lg-4 control-label left">School:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtSiblSchool[]" id="txtSiblSchool">
            </div>
       </div>
      </div>
  </div>
</div>

<div class="container">
    <hr>
  <div class="row">
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Other members of the Household</h3>
        <div class= "right" style="margin-bottom: 5%">
               <a href="#"><span class="btn btn-info" id="relativebutton" style="float: right" onclick="addRelative();" >ADD</span></a>
        </div>

          <div class="form-group" id="relative">
            <label class="col-lg-4 control-label left">Name:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtRelName[]" id="txtRelName">
            </div>

            <label class="col-lg-4 control-label left">Age:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="number" name="txtRelAge[]" id="txtRelAge">
            </div>

            <label class="col-lg-4 control-label left">Relation:</label>
            <div class="col-lg-9" style="margin-bottom: 2%">
              <input class="form-control" type="text" name="txtRelRelation[]" id="txtRelRelation">
            </div>
          </div>

      </div>
  </div>
</div>
