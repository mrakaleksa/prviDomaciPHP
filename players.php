<?php

require "dbBroker.php";
require "model/player.php";






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" href="image/logo.png" />
    <link rel="stylesheet" href="css/players.css">
    <title>Fudbalski timovi</title>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <div class="container">
        <div class="navigation clearfix">
                <div class="logo"><h1>CHELSEA FC</h1></div>
                <div class="menu">
                    <!-- neoznacena lista koja predstavlja nas navigacioni meni -->
                    <ul class="main-menu">
                        <!-- elementi liste koji predstavljaju linkove ka odredjenim delovima sajta -->
                        <li class="menu-item"><a href="home.php">HOME</a></li>
                        <li class="menu-item"><a href="kontakt.html">LOG OUT</a></li>
                    </ul>
                </div>
            </div>

        <div class="jumbotron text-center" style=" background-color: rgba(255, 182, 193, 0);">
            <div class="container">
                <h1 style="color:white">Players Information</h1>
            </div>
        </div>

        <div class="col-md-8" style="text-align:center; width:66.6%;float:left">
            <div id="pregled">
                <table id="tabela" class="table sortable table-bordered table-hover ">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Country</th>
                            <th scope="col">Contract</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($red = $result->fetch_array()) {
                        ?>
                            <tr id="tr-<?php echo $red["playerID"] ?>">
                                <td><?php echo $red["playerID"] ?></td>
                                <td><?php echo $red["name"] ?></td>
                                <td><?php echo $red["age"] ?></td>
                                <td><?php echo $red["country"] ?></td>
                                <td><?php echo $red["contract"] ?></td>
                                <td>
                                    <label class="radio-btn">
                                        <input type="radio" name="checked-donut" value=<?php echo $red["playerID"] ?>>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>

                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div>




                </div>
            </div>
        </div>

        <div class="col-md-4" style="display: block; background-color: rgba(255, 255, 255, 0.4);">

            <div style="text-align:center;">
                <input type="text" id="myInput" class="btn" placeholder="SEARCH" onkeyup="pretrazi()">
            </div>
            <div style="text-align:center; ">
                <button id="btn-dodaj" class="btn" data-toggle="modal" data-target="#myModal">ADD</button>
            </div>
            <div style="text-align:center;">
                <button id="btn-izmeni" class="btn" data-toggle="modal" data-target="#izmeniModal">EDIT</button>
            </div>
            <div style="text-align:center;">
                <button id="btn-izbrisi" class="btn">DELETE</button>
            </div>
            <div style="text-align:center;">
                <h3>SORT BY NAME</h3>
                <button id="btn-izmeni" class="btn" onclick="sortTable()">SORT</button>
            </div>
            <br>
        </div>
    </div>


    <br>
    <a href="logout.php" class="label label-primary" style="font-size:16px; position: fixed; bottom:0; right:0; float:right">Logout</a>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!--Sadrzaj modala-->
            <div class="modal-content" style="border: 4px solid green;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container tim-form">
                        <form action="#" method="post" id="dodajForm">
                            <h3 id="naslov" style="color: black" text-align="center">Add New Player</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid black" name="name" class="form-control" placeholder="Name *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="border: 1px solid black" name="age" class="form-control" placeholder="Age  *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="border: 1px solid black" name="country" class="form-control" placeholder="Country *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="number" style="border: 1px solid black" name="contract" class="form-control" placeholder="Contract *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <button id="btnDodaj" type="submit" class="btn btn-success btn-block" style="background-color: orange; border: 1px solid black;"><i class="glyphicon glyphicon-plus"></i> Add Player
                                        </button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="color: white; background-color: orange; border: 1px solid white" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


    <div class="modal fade" id="izmeniModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal sadrzaj-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container tim-form">
                        <form action="#" method="post" id="izmeniForm">
                            <h3 style="color: black">Change Player</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="idd" type="text" name="playerID" class="form-control" placeholder="Player ID *" value="" readonly />
                                    </div>
                                    <div class="form-group">
                                        <input id="namee" type="text" name="name" class="form-control" placeholder="Name *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="agee" type="number" name="age" class="form-control" placeholder="Age *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="countryy" type="text" name="country" class="form-control" placeholder="Country *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input id="contractt" type="number" name="contract" class="form-control" placeholder="Contract *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <button id="btnIzmeni" type="submit" class="btn btn-success btn-block" style="color: white; background-color: orange; border: 1px solid white"><i class="glyphicon glyphicon-pencil"></i> Change Player
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
    <script src="js/main.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        function pretrazi() {

            var input, filter, table, tr, i, td1, td2, td3, td4, txtValue1, txtValue2, txtValue3, txtValue4;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("tabela");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];
                td4 = tr[i].getElementsByTagName("td")[4];

                if (td1 || td2 || td3 || td4) {
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;

                    if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 ||
                        txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("tabela");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[1];
                    y = rows[i + 1].getElementsByTagName("TD")[1];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }
        }
    </script>
</body>

</html>