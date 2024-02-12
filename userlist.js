

for(let c of document.querySelectorAll("input[type=checkbox]")){
	c.addEventListener("change", function(){
		var checkbox = document.getElementById("row"+this.dataset.id);
		if (this.checked){
			// fetch using method post -->send id, and if marked or not to a new php
			fetch("striked.php?id="+this.dataset.id,{
				method: "POST"
			})
			checkbox.style.setProperty("text-decoration", "line-through");
		}
		if(!this.checked){
			fetch("notStriked.php?id="+this.dataset.id,{
				method: "POST"
			})
			checkbox.style.textDecoration = 'none';
		}
	})
}




