<script>
	$("#dropdownlist").change(function () {
  var numInputs = $(this).val();
  for (var i = 0; i < numInputs; i++)
    $("#inputArea").append('<input name="inputs[]" />');
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<select id="dropdownlist">
  <option>Select...</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
<div id="inputArea"></div>

<!-- <script>
	$("#cboCountry").change(function() { 

	    if ( $(this).val() == "OTHERS") {

	    $("#cboState").hide();

	    $("#txtcboState").show();

	}
	    else{

	        $("#cboState").show();
	        $("#txtcboState").hide();
	    }

	});
</script>

<select id="cboCountry">
    <option value="USA">USA</option>
    <option value="OTHERS">OTHERS</option>
</select>

<select id="cboState" name="cboState" >
    <option value="Alabama">Alabama</option>
</select>

<input type="text" id="txtcboState" name="cboState" style="display:none;"/> -->

<!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="js/select2.full.min.js"></script>
    <script type="text/javascript" src="formwizard.js"></script>