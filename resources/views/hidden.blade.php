<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />


  </head>

  <body>
    <div id="container">
      <div>Container content</div>
      <div id="hidden-div">Hidden div content</div>
      <div>More content</div>
    </div>

    <script  type="text/javascript">
    
const el = document.getElementById('container');

const hiddenDiv = document.getElementById('hidden-div');

// ✅ Show hidden DIV on hover
el.addEventListener('mouseover', function handleMouseOver() {
  hiddenDiv.style.visibility = 'visible';
});

// ✅ (optionally) Hide DIV on mouse out
el.addEventListener('mouseout', function handleMouseOut() {
  // 👇️ if you used visibility property to hide div
  hiddenDiv.style.visibility = 'hidden';
});


    </script>
  </body>
</html>
