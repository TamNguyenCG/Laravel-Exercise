<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div id="myDIV" class="card" style="background-color: blue ;width: 40%;margin: 150px auto auto;">
    <div class="card-header">
        <h2 style="margin:5px;color: red">My To Do List</h2>
        <input type="text" id="input" placeholder="Title...">
        <span class="btn btn-success" onclick="newElement()">Add</span>
    </div>
    <ul id="myUL" class="list-group">
        <li class="list-group-item">Hit the gym</li>
        <li class="list-group-item">Pay bills</li>
        <li class="list-group-item">Meet George</li>
        <li class="list-group-item">Buy eggs</li>
        <li class="list-group-item">Read a book</li>
        <li class="list-group-item">Organize office</li>
    </ul>
</div>
<script>
    let myNL = document.getElementsByTagName('li');
    let i;
    for (i = 0; i < myNL.length; i++) {
        let span = document.createElement("span");
        let txt = document.createTextNode('\u00D7');
        span.className = "close";
        span.appendChild(txt);
        span.style.float = 'right';
        myNL[i].appendChild(span);
    }

    let close = document.getElementsByClassName('close');
    closeElement();

    function closeElement(){
        let i;
        for(i = 0; i < close.length; i++){
            close[i].onclick = function () {
                let div = this.parentElement;
                div.style.display = "none";
            }
        }
    }

    function newElement(){
        let li = document.createElement('li');
        let input = document.getElementById('input').value;
        let t = document.createTextNode(input);
        li.className = "list-group-item";
        li.appendChild(t);
        console.log(li.appendChild(t));
        if(input === ""){
            alert('You must write something !');
        }else{
            document.getElementById('myUL').appendChild(li);
        }
        document.getElementById('input').value = "";
        let span = document.createElement("span");
        let txt = document.createTextNode('\u00D7');
        span.className = "close";
        span.appendChild(txt);
        span.style.float = 'right';
        li.appendChild(span);
        closeElement();
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>
</html>