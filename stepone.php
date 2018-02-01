
                                  <div class="col-md-12 col-sm-12 col-xs-12">

                                      <!-- radio -->
                                      <div class="form-group" style="margin-top: 3%">
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="r3" id="r3" value="New Student" checked>
                                            New Student
                                          </label>
                                        </div>
                                        <div class="radio">
                                          <label>
                                            <input type="radio" name="r3" id="r3" value="Transferee">
                                            Transferee
                                          </label>
                                        </div>
                                        </div>
                                      <div class="form-group" style="margin-top: 3%">
                                        <label style="width: 35%">Admission for:</label>
                                        <div>
                                          <select class="form-control" style="width: 35%;" name="selLevel" id="selLevel">
                                                  <option selected="selected" disabled>--Choose Level--</option>
                                                  <?php
                                                  $query="select * from tbllevel where tblLevelFlag=1";
                                                  $result=mysqli_query($con, $query);
                                                  while($row=mysqli_fetch_array($result))
                                                  {
                                                  ?>
                                                  <option value="<?php echo $row['tblLevelId']; ?>"><?php echo $row['tblLevelName'] ?></option>
                                                  <?php } ?>
                                                </select>
                                        </div>
                                      </div>

                                      <div class="fieldset" style="border: 2px solid gray; margin-top: 5%">

                                          <fieldset style="margin-top: 2%; margin-left: 2%">
                                            <h3>REQUIREMENTS</h3>
                                              <?php
                                            $query="select * from tblrequirement where tblRequirementFlag=1";
                                            $result=mysqli_query($con, $query);
                                            while($row=mysqli_fetch_array($result))
                                            {
                                            ?>
                                              <div class="form-group">
                                                <label>
                                                  <input type="checkbox" class="flat-red" name="chkReq[]" id="chkReq" value="<?php echo $row['tblReqId']; ?>">
                                                  <?php echo $row['tblReqName']; ?>
                                                </label>
                                              </div>
                                              <?php } ?>
                                          </fieldset>

                                      </div> <!-- fieldser -->
                                    </div> <!-- col -->
