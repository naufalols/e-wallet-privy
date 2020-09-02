<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        [class*="col-"] {
            float: left;
            padding: 15px;
        }

        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.66%;
        }

        .col-6 {
            width: 50%;
        }

        .col-7 {
            width: 58.33%;
        }

        .col-8 {
            width: 66.66%;
        }

        .col-9 {
            width: 75%;
        }

        .col-10 {
            width: 83.33%;
        }

        .col-11 {
            width: 91.66%;
        }

        .col-12 {
            width: 100%;
        }

        html {
            font-family: "Lucida Sans", sans-serif;
        }

        .header {
            background-color: #9933cc;
            color: #ffffff;
            padding: 15px;
        }

        .menu ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .menu li {
            padding: 8px;
            margin-bottom: 7px;
            background-color: #33b5e5;
            color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            cursor: pointer;
        }

        .menu li:hover {
            background-color: #0099cc;
        }

        body {
            /* background: #76b852; */
            /* fallback for old browsers
            background: -webkit-linear-gradient(right, #76b852, #8DC26F);
            background: -moz-linear-gradient(right, #76b852, #8DC26F);
            background: -o-linear-gradient(right, #76b852, #8DC26F);
            background: linear-gradient(to left, #76b852, #8DC26F); */
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        small.balance {
            display: inline-block;
            font-family: "Roboto", sans-serif;
            vertical-align: middle;
            font-size: 40%;
            font-weight: lighter;
            color: dimgrey;
        }

        .content {
            padding: 0 18px;
            /* display: none; */
            height: 0;
            overflow: hidden;
            background-color: #f1f1f1;
            -webkit-transition: all .5s ease;
            -moz-transition: all .5s ease;
            transition: all .5s ease;

        }
    </style>

</head>

<body>
    <div class="header">
        <h1><?= $title ?></h1>
        <h5><?= $user_data['username'] ?></h5>
    </div>

    <div class="row">
        <div class="col-3 menu">
            <ul>
                <li class="collapsible">Send Money</li>
                <div class="content">
                    <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                        <input type="text" placeholder="$account code" name="search2">
                        <button type="submit"><i class="fa fa-send"></i></button>
                    </form>
                    <br>
                </div>
                <li class="collapsible">Top Up Balance</li>
                <div class="content">
                    <form class="example" style="margin:auto;max-width:300px" id="top_up">
                        <input type="text" placeholder="0" name="value_top_up">
                        <button type="button" id="submit_top_up"><i class="fa fa-dollar"></i></button>
                    </form>
                    <br>
                </div>
                <li>Saver</li>
                <li>Pay It</li>
            </ul>
        </div>

        <div class="col-9">
            <div class="balance">
                <h1>
                    <div id="balance">Rp.0,-</div> <small class="balance">YOUR ACTIVE BALANCES</small>
                </h1>
                <h2>$<?= $user_data['email'] ?> <small class="balance">YOUR ACCOUNT CODE</small></h2>
            </div>
            <p>Chania is the capital of the Chania region on the island of Crete. The city can be divided in two parts, the old town and the modern city.</p>
            <p>Resize the browser window to see how the content respond to the resizing.</p>

            <div class="row">

            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', (event) => {
            UserAction();
        });

        // function testing() {
        //     console.log("tes");
        // }
        document.getElementById("submit_top_up").addEventListener('click', (e) => {
            e.preventDefault();
            a = document.querySelector("input[name='value_top_up']").value;
            if (a == 0) {
                alert("Jangan kosong anjing");
            } else {
                var data = {
                    user_id: "<?php echo $user_data['id'] ?>",
                    value_top_up: a
                }

                fetch("<?php echo base_url("api?X-API-KEY=") . $user_data['key']; ?>", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-API-KEY': '<?php echo $user_data['key']; ?>'
                    },
                    body: JSON.stringify(data)
                }).then(res => {
                    console.log("Request complete! response:", res.json());
                });



                // var xhttp = new XMLHttpRequest();
                // xhttp.open("POST", "<?php echo base_url('api?user_id=') . $user_data['id'] . '&X-API-KEY=' . $user_data['key']; ?>", true);
                // xhttp.setRequestHeader("Content-type", "application/json");
                // xhttp.send();

                // xhttp.onreadystatechange = function() {
                //     if (this.readyState == 4 && this.status == 200) {
                //         // alert(this.responseText);
                //         var txt = this.responseText;
                //         var obj = JSON.parse(txt);
                //         document.getElementById("balance").innerHTML = 'Rp' + obj.balance + ',-';
                //     }
                // };
            }
        })

        function UserAction() {

            var userid = "<?= $user_data['id'] ?>"
            // console.log(userid);

            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "<?php echo base_url('api?user_id=') . $user_data['id'] . '&X-API-KEY=' . $user_data['key']; ?>", true);
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.setRequestHeader("X-API-KEY", "<?= $user_data['key'] ?>");
            xhttp.send();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // alert(this.responseText);
                    var txt = this.responseText;
                    var obj = JSON.parse(txt);
                    document.getElementById("balance").innerHTML = 'Rp' + obj.balance + ',-';
                }
            };
        }
    </script>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.height === "auto") {
                    content.style.height = "0";
                } else {
                    content.style.height = "auto";
                }
            });
        }
    </script>


    <script>

    </script>
</body>

</html>