function scanProducts(){
	
	var url = $("#url").val();
	var name = "Nike Free RN";
	var extra = "878767";
	var website = "www.nike.com";
	
	$.post("ajax/scanner.php", {
		
		url: url
		name: name,
		extra: extra,
		website: website
		
	}, function (data, status) {
        showProducts();
    });
	
}

function showProducts(){
	
	
	$.get("ajax/show_products.php", {}, function (data, status) {
        $(".results").html(data);
    });
	
}