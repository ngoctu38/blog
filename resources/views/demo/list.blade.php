<html>
<body>
<div class="myElement" style="display: block">
    <input type="text" min="1" max="100"  class="slider" value="name"  id="myRange1">
    <div STYLE="display: flex">
    <p id="demo1"></p><input type="range" min="1" max="100" value="50" class="slider" id="myRange"><p id="demo"></p>
    </div>
</div>

<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    var slider1 = document.getElementById("myRange1");
    var output1 = document.getElementById("demo1");

    output.innerHTML = slider.value; // Display the default slider value
    output1.innerHTML = slider1.value; // Display the default slider value .split('').length

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value ;
    }
    slider1.oninput = function() {
        string = "â afaf afafafa afafaa âfaf";
        for (var i = 0; i < 5; i++){
          // output1.innerHTML =
            document.write( string.split('')[i]+ "</br>");
    }
    }
</script>
</body>
</html>
