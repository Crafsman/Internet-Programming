$(document).ready(function () {

    car_array = [];
    selectedCars = JSON.parse($.session.get("selectedCars"));

    // console.log((selectedCars))

    $.ajax({
        type: "GET",
        url: "files/cars.xml",
        dataType: "xml",
        success: xmlParser,
        error: function () {
            alert("An error occurred while processing XML file.");
        }
    });


    $('#checkout').click(function (e) {
        selectedCars = JSON.parse($.session.get("selectedCars"));
        if (selectedCars <= 0) {
            alert("No car has been reserved");
            window.location.href = 'index.php';
        } else {
            // VAlidate rental days  
            let jump = true;
            $("input").each(function (index) {
                if ($(this).val() <= 0) {
                    alert("Rental days must greater than 0");
                    jump = false;
                }
            });

            if (jump == true)
                window.location.href = "checkout.html";
        }


    })
});

function hanle() {

    for (let i = 0; i < selectedCars.length; i++) {
        for (let j = 0; j < car_array.length; j++) {
            // const element = array[index];
            if (selectedCars[i] == car_array[j].ID) {

                var category;
                var tr = $("<tr></tr>");
                var td = $("<td></td>");
                tr.append(td);

                category = $('<img>');
                var url = "themes/images/cars/" + car_array[j].Model + ".jpg";
                category.attr('src', url);
                category.attr('alt', "images");
                category.attr('style', "width:200x; height:300px;");
                td.append(category);

                td = $("<td></td>");
                tr.append(td);
                category = $('<div></div>').text(car_array[j].Model_year + "-" + car_array[j].Brand + "-" + car_array[j].Model);
                td.append(category);

                // Rental days
                td = $("<td></td>");
                tr.append(td);
                category = $('<input></input>').addClass("input-mini");
                category.attr('type', "text");
                category.attr('id', car_array[j].ProductID);
                category.val("1");
                td.append(category);

                // Unit Price
                td = $("<td></td>").text("$" + car_array[j].Price_per_day);
                tr.append(td);

                // Delete Button
                td = $("<td></td>");
                tr.append(td);
                category = $('<button></button>').addClass("btn btn-danger").text("Delete");
                category.click({ id: car_array[j].ID }, deleteCar);
                td.append(category);

                $("#tbody").append(tr);
                continue;
            }

        }

    }

}

function deleteCar(event) {

    var index = selectedCars.indexOf(event.data.id);
    if (index > -1) {
        selectedCars.splice(index, 1);
    }
    $.session.set("selectedCars", JSON.stringify(selectedCars));
    $.redirect('cart.php', { 'arg1': selectedCars });
}

function xmlParser(xml) {

    $(xml).find("Car").each(function () {
        // console.log($(this).find("ProductID").text());
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
        };

        car_array.push(car);
    });

    hanle();
}