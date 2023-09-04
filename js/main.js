$("#btn-delete").click(function () {
    const checked = $("input[type=radio]:checked");
    request = $.ajax({
      url: "handler/delete.php",
      type: "post",
      data: { playerID: checked.val() },
    });
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        checked.closest("tr").remove();
        console.log("Player is deleted");
        alert("Player is deleted");
      } else {
        console.log("Player is not deleted " + response);
        alert("Player is not deleted");
      }
    });
  });
  
  $("#btn-edit").click(function () {
    const checked = $("input[name=checked-donut]:checked");
  
    request = $.ajax({
      url: "handler/get.php",
      type: "post",
      data: { playerID: checked.val() },
      dataType: "json",
    });
  
    request.done(function (response, textStatus, jqXHR) {
      console.log("Filled");
      $("#namee").val(response[0]["name"]);
      console.log(response[0]["name"]);
      $("#agee").val(response[0]["age"].trim());
      console.log(response[0]["age"].trim());
      $("#countryy").val(response[0]["country"].trim());
      console.log(response[0]["country"].trim());
      $("#contractt").val(response[0]["contract"].trim());
      console.log(response[0]["contract"].trim());
      $("#idd").val(checked.val());
  
      console.log(response);
    });
  
    request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error("The following error occurred: " + textStatus, errorThrown);
    });
  });
  
  $("#editForm").submit(function () {
    event.preventDefault();
    console.log("Edit");
    const $form = $(this);
    const $inputs = $form.find("input, select, button");
    const serializedData = $form.serialize();
    console.log(serializedData);
    let obj = $form.serializeArray().reduce(function (json, { name, value }) {
      json[name] = value;
      return json;
    }, {});
    console.log(obj);
    $inputs.prop("disabled", true);
  
    request = $.ajax({
      url: "handler/edit.php",
      type: "post",
      data: serializedData,
    });
  
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        console.log("Player has been edited");
        updateRow(obj);
      } else console.log("Player hasn't been edited " + response);
      console.log(response);
    });
  
    request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error("The following error occurred: " + textStatus, errorThrown);
    });
  });
  
  $("#btnAdd").submit(function () {
    $("myModal").modal("toggle");
    return false;
  });
  
  $("#btn-edit").submit(function () {
    $("#myModal").modal("toggle");
    return false;
  });
  
  $("#addForm").submit(function () {
    event.preventDefault();
  
    const $form = $(this);
    const $inputs = $form.find("input, select, button");
    const serializedData = $form.serialize();
    console.log(serializedData);
    let obj = $form.serializeArray().reduce(function (json, { name, value }) {
      json[name] = value;
      return json;
    }, {});
    console.log(obj);
    $inputs.prop("disabled", true);
  
    request = $.ajax({
      url: "handler/add.php",
      type: "post",
      data: serializedData,
    });
  
    request.done(function (response, textStatus, jqXHR) {
      if (response === "Success") {
        alert("Player has been added");
        appendRow(obj);
      } else console.log("Player hasn't been added " + response);
      console.log(response);
    });
  
    request.fail(function (jqXHR, textStatus, errorThrown) {
      console.error("The following error occurred: " + textStatus, errorThrown);
    });
  });
  
  function appendRow(obj) {
    console.log(obj);
  
    $.get("handler/getLast.php", function (data) {
      console.log(data);
      console.log($("#tabela tbody tr:last").get());
      $("#tabela tbody").append(`
        <tr>
            <td>${data}</td>
            <td>${obj.name}</td>
            <td>${obj.age}</td>
            <td>${obj.country}</td>
            <td>${obj.contract}</td>
            <td>
                <label class="custom-radio-btn">
                    <input type="radio" name="checked-donut" value=${data}>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
      `);
    });
  }
  function updateRow(obj) {
    console.log(obj);
    console.log(obj.playerID);
    console.log($(`#tabela tbody #tr-${obj.playerID} td`).get());
    let tds = $(`#tabela tbody #tr-${obj.playerID} td`).get();
    tds[1].textContent = obj.name;
    tds[2].textContent = obj.age;
    tds[3].textContent = obj.country;
    tds[4].textContent = obj.contract;
  }
  