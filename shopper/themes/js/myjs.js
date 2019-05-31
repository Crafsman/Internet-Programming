// Use AJAX to load the XML file "cars.xml"
$(document).ready(function () {
    car_array = [];
    selectedCars = [];

    $.ajax({
        type: "GET",
        url: "files/cars.xml",
        dataType: "xml",
        success: xmlParser
    });

});

function filterArray(arr) {
    let unique_array = arr.filter(function (elem, index, self) {
        return index == self.indexOf(elem);
    });
    return unique_array
}

function xmlParser(xml) {

    $(xml).find("Car").each(function () {
        //console.log($(this).find("ProductID").text());
        let productID = $(this)
            .find("ProductID")
            .text();
        let category = $(this)
            .find("Category")
            .text();
        let availability = $(this)
            .find("Availability")
            .text();
        let brand = $(this)
            .find("Brand")
            .text();
        let model = $(this)
            .find("Model")
            .text();
        let modelYear = $(this)
            .find("Model_year")
            .text();
        let mileage = $(this)
            .find("Mileage")
            .text();
        let fuelType = $(this)
            .find("Fuel_type")
            .text();
        let seats = $(this)
            .find("Seats")
            .text();
        let pricePerDay = $(this)
            .find("Price_per_day")
            .text();
        let description = $(this)
            .find("Description")
            .text();

        car = {
            ID: productID,
            Category: category,
            Availability: availability,
            Brand: brand,
            Model: model,
            Model_year: modelYear,
            Mileage: mileage,
            Fuel_type: fuelType,
            Seats: seats,
            Price_per_day: pricePerDay,
            Description: description
        };

        car_array.push(car);
    });

    showContent();

}

// Present content to main page
function showContent() {
    for (let i = 0; i < car_array.length; i++) {

        var category;

        var productBox = $("<div></div>").addClass("product-box");
        var saleTag = $("<span></span>").addClass("sale_tag");  // Create with jQuery               
        productBox.append(saleTag);

        var category = $('<img>');
        var url = "themes/images/cars/" + car_array[i].Model + ".jpg";
        category.attr('src', url);
        category.attr('alt', "images");
        category.attr('style', "width:100%; height:250px;");
        productBox.append(category);

        // title
        category = $("<a></a>").addClass("title").text(car_array[i].Brand + "-" + car_array[i].Model + "-" + car_array[i].Model_year);
        productBox.append(category);
        productBox.append($("<br></br>"));

        // Mileage
        category = $("<a></a>").addClass("category").text("Mileage: " + car_array[i].Mileage + " kms");
        productBox.append(category);
        productBox.append($("<br></br>"));

        // Fule Type
        category = $("<a></a>").addClass("category").text("Fuel Type: " + car_array[i].Fuel_type);
        productBox.append(category);
        productBox.append($("<br></br>"));

        // Seats
        category = $("<a></a>").addClass("category").text("Seats: " + car_array[i].Seats);
        productBox.append(category);
        productBox.append($("<br></br>"));

        // Price per day
        category = $("<a></a>").addClass("category").text("Price Per Day: $" + car_array[i].Price_per_day);
        productBox.append(category);
        productBox.append($("<br></br>"));

        // Availability
        category = $("<a></a>").addClass("category").text("Availability: " + car_array[i].Availability);
        productBox.append(category);
        productBox.append($("<br></br>"));

        // Description
        category = $("<p></p>").addClass("description").text("Availability: " + car_array[i].Description);
        productBox.append(category);
        productBox.append($("<br></br>"));

        // Button
        var button = $("<button></button>").addClass("btn btn-inverse").text("Add to cart");
        button.click({ id: car_array[i].ID }, checkAvailability);
        productBox.append(button);
        productBox.append($("<br></br>"));

        var li = $("<li></li>").addClass("span3");
        li.append(productBox);
        $("#products").append(li);

    }

}

function checkAvailability(event) {

    $.ajax({
        type: "GET",
        url: "files/cars.xml",
        dataType: "xml",
        success: function (xml) {
            $(xml)
                .find("Car")
                .each(function () {
                    let productID = $(this)
                        .find("ProductID").text();;

                    if (productID == event.data.id) {
                        let availability = $(this)
                            .find("Availability").text();
                        console.log(availability);
                        if (availability == "True") {
                            //selectedCars.push(productID);

                            if ($.session.get("selectedCars") == undefined) {
                                selectedCars.push(event.data.id);
                                var unique = filterArray(selectedCars);// [...new Set(names)];
                                $.session.set("selectedCars", JSON.stringify(unique));

                            } else {
                                selectedCars = JSON.parse($.session.get("selectedCars"));//no brackets
                                selectedCars.push(event.data.id);
                                var unique = filterArray(selectedCars);//[...new Set(names)];
                                $.session.set("selectedCars", JSON.stringify(unique));
                            }

                            alert("Add to the cart successfully");

                        } else {
                            alert("Sorry, the car is not available now, Please try other cars.");
                        }
                        return;

                    }
                });

        },
        error: function () {
            alert("An error occurred while processing XML file.");
        }
    });
}
