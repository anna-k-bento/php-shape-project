<?php 
	include 'src/core/Shape.php';
	include 'src/core/Rectangle.php';
	include 'src/core/Circle.php';
	
	$width = $length = $radius = $total = $selectedShape = "";
	$shapeToCalc = new Shape(); 
  
	if(isset($_POST['submit'])){
		
		$width = $length = $total = $radius = "";
		$selectedShape = $_POST['shapes'];
		
		if($selectedShape == 'circle'){
			if(is_numeric($_POST['radius'])){
				$radius = $_POST['radius'];
				$shapeToCalc = new Circle($radius);
			}
		} else if(is_numeric($_POST['width']) && is_numeric($_POST['length'])){
		
			$width = $_POST['width'];
			$length = $_POST['length'];
				
			if($selectedShape == 'rectangle') {
				$shapeToCalc = new Rectangle($width, $length);
			} else {
				$shapeToCalc = new Shape($width, $length);
			}
		}
	if(!empty($selectedShape)){
		$total = $shapeToCalc->getArea();
	}
  }
?>
<html>
  <head>
  <link href="css/main.css" type="text/css" rel="stylesheet" />
   <script  type="text/javascript">
   /**
   * Show attributes in function of the selected shape
   * @param shapes -selected shape
   **/
	function showAttributes(shapes) {
		if(!shapes){
		  shapes = document.getElementById("shapes").value;
		}
		document.getElementById("circle").style.display = 'none';
		document.getElementById("shape").style.display = 'none';
		document.getElementById("totalCircle").style.display = 'none';
		document.getElementById("totalShape").style.display = 'none';
		document.getElementById("totalRect").style.display = 'none';
		if (shapes == "circle") {
			document.getElementById("circle").style.display = 'block';
			document.getElementById("totalCircle").style.display = 'block';
		} 
		if (shapes == "shape") {
			document.getElementById("shape").style.display = 'block';
			document.getElementById("totalShape").style.display = 'block';
		}
		if (shapes == "rectangle") {
			document.getElementById("shape").style.display = 'block';
			document.getElementById("totalRect").style.display = 'block';
		}

		activateButton();
	}	
	
	/**
	* Activates button to calculate area
	**/
	function activateButton() {
	  var shapes = document.getElementById("shapes").value;
	  var width  = (shapes == "rectangle" || shapes == "shape") ? document.getElementById("width").value : "";
	  var length = (shapes == "rectangle" || shapes == "shape") ? document.getElementById("length").value : "";
	  var radius = (shapes == "circle") ? document.getElementById("radius").value : "";
	  if((width != null && width != "" && length != null && length != "") || (radius != null && radius != "")){
		document.getElementById("calc").disabled = false;
	  } else {
		document.getElementById("calc").disabled = true;
	  }
	}
</script>
<title> PHP SHAPE Class </title>
</head>
<body onload="showAttributes()">
	<form class="form-container"  method="POST" action="/index.php">
		<div class="row">
			<div class="label">
				Select a shape to calucate the area:
			</div>
			<select name="shapes" id="shapes" onchange="showAttributes(this.value);" class="select-item" >
				<option value="circle" <?php if (($selectedShape == 'circle') || empty($selectedShape)) echo ' selected'; ?>>Circle</option>
				<option value="rectangle" <?php if ($selectedShape == 'rectangle') echo ' selected'; ?>>Rectangle</option>
				<option value="shape" <?php if ($selectedShape == 'shape') echo ' selected'; ?> >Shape with 4 sides</option>
			</select>
		</div>
		<div class="row responsive" id="shape" <?php if (($selectedShape == 'circle') || empty($selectedShape)) echo ' style="display: none"'; ?>>
			<div class="inline-block responsive">
			  <label for="width" class="label">Width</label><br>
			  <input class="input-field"  oninput="activateButton();" type ="number" name="width" id="width" value=<?php echo $width; ?> />
			</div>
			<div class="inline-block responsive">
			  <label for="length" class="label">Length</label><br>
			  <input class="input-field" oninput="activateButton();"  type ="number" name="length" id="length" value=<?php echo $length; ?> />
			</div>
		</div>
	   
		<div class="row responsive" id="circle" <?php if(($selectedShape != "circle") && (!empty($selectedShape))) echo ' style="display: none"' ?>>
			<div class="inline-block responsive">
				<label for="radius" class="label">Radius</label><br>
				<input class="input-field"  oninput="activateButton();" type ="number" name="radius" id="radius" value=<?php echo $radius; ?> />
			</div>
		</div>
		<input type="submit" name="submit" id="calc" disabled= false value ="CALCULATE AREA" class="btn-submit responsive" /> 
		<div class="row responsive">  
			<div id="totalCircle" style="display: none">
				<label for="totalC" class="label">Total</label><br>
				<input class="total-field" type ="number" id="totalC" value=<?php  if($selectedShape == "circle") echo $total; ?> readonly />
			</div>
			<div id="totalRect" style="display: none">
				<label for="totalR" class="label">Total</label><br>
				<input class="total-field" type ="number" id="totalR" value=<?php  if($selectedShape == "rectangle") echo $total; ?> readonly />
			</div>
			<div id="totalShape" style="display: none">
				<label for="totalS" class="label">Total</label><br>
				<input class="total-field" type ="number" id="totalS" value=<?php  if($selectedShape == "shape") echo $total; ?> readonly />
			</div>
		</div>
    </form>
</body>
</html>