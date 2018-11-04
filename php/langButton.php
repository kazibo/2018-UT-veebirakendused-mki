<div class="dropdown">
  <button onclick="myFunction()" class="langbtn">Language</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#">EST</a>
    <a href="#">ENG</a>
  </div>
</div>

<script>
	function myFunction()
	{
		document.getElementById("myDropdown").classList.toggle("show");
	}

	window.onclick = function(event)
	{
		if (!event.target.matches('.langbtn'))
		{
			var dropdowns = document.getElementsByClassName("dropdown-content");
			var i;
			
			for (i = 0; i < dropdowns.length; i++)
			{
			  var openDropdown = dropdowns[i];
				if (openDropdown.classList.contains('show'))
				{
				openDropdown.classList.remove('show');
				}
			}
		}
	}
</script>