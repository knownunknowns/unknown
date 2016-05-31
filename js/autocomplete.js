$(document).ready(function() {
	function matchString(searchString,objsList){
	        return objsList.filter(function(a){
	        return a["string"].toLowerCase().startsWith(searchString.toLowerCase())
	    })
	}
	function compareUses(a,b){
	    return a["uses"]-b["uses"];
	}
	function sortOnUses(objsToSort){
	    return objsToSort.sort(compareUses)
	}

	function bestMatch(searchTerm){
	    return sortOnUses(matchString(searchTerm,searchIndex))[0]}
	function completion(searchString){
	    if (searchString != ""){
	         return bestMatch(searchString)
	    }else{return ""}
	}
	function completeAutomatically(result){
	    $("#autocomplete").html(result)
	}
	$(document).keydown(function(e){
            if ($("#searchBar").is(":focus") == false){
                $("#searchBar").val("");
                $("#searchBar").focus();
            }
	})
	$("#searchBar").keydown(function(e){
	    if (e.which == 13){
	        e.preventDefault()
	        window.location.href = bestMatch($("#searchBar").val())["url"]
		}})
	$("#searchBar").keyup(function(){
	    completeAutomatically(
	        completion($("#searchBar").val())["string"]
	    )
	})
})
