function Read_employee_with_id() {
    //kiem tra co chon hay khong
    //gt = document.forms[0].browsers.value;
    var e = document.getElementById("browsers");
    var value = e.options[e.selectedIndex].value;
    var text = e.options[e.selectedIndex].text;
    //  prefer = document.forms[0].browsers.value;
    // alert("You prefer browsing internet with " + value);
    //Ajax

    //1-khai bao & khoi tao doi tuong Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //ie5, ie 6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2 - tra ket qua sau khi thi hanh xong
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) // su ly hoan thanh va tim thay trang
        {
            document.getElementById("hienthi").innerHTML = xmlhttp.responseText;
        }
    }
    //3 mo lien ket den may chu
    xmlhttp.open("GET", "chi_tiet_employee.php?id=" + value, true);
    //4-gui thong tin
    xmlhttp.send();
}
function Name_employee(id) {
    //kiem tra co chon hay khong
    //var id = document.getElementById("id").value;
    //alert(id);
    //Ajax
    //1-khai bao & khoi tao doi tuong Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //ie5, ie 6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2 - tra ket qua sau khi thi hanh xong
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) // su ly hoan thanh va tim thay trang
        {
            document.getElementById("hienthi" + id).innerHTML = xmlhttp.responseText;
        }
    }
    //3 mo lien ket den may chu
    xmlhttp.open("GET", "name_employee.php?id=" + id, true);
    //4-gui thong tin
    xmlhttp.send();
}

function showDepartment() {
    var gg = document.getElementById("page").value;

    //document.getElementById("demo").innerHTML = gg;
    //document.getElementById("hienthi"+ id).innerHTML;
    //var e = document.getElementById("keyword").value;
    //ajax
    //1-khai bao & khoi tao doi tuong Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //ie5, ie 6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2 - tra ket qua sau khi thi hanh xong
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) // su ly hoan thanh va tim thay trang
        {
            document.getElementById("hienthi").innerHTML = xmlhttp.responseText;
        }
    }
    //3 mo lien ket den may chu
    xmlhttp.open("GET", "department_ajax.php?views=Department&page=" + gg, true); //sd post nhieu hon
    xmlhttp.send();

}
function showEmployee() {
    var gg = document.getElementById("page").value;

    //document.getElementById("demo").innerHTML = gg;
    //document.getElementById("hienthi"+ id).innerHTML;
    //var e = document.getElementById("keyword").value;
    //ajax
    //1-khai bao & khoi tao doi tuong Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //ie5, ie 6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2 - tra ket qua sau khi thi hanh xong
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) // su ly hoan thanh va tim thay trang
        {
            document.getElementById("hienthi").innerHTML = xmlhttp.responseText;
        }
    }
    //3 mo lien ket den may chu
    xmlhttp.open("GET", "employee_ajax.php?views=Employee&page=" + gg, true); //sd post nhieu hon
    xmlhttp.send();

}
function showUser() {
     var sel = document.getElementById("mySelect2").selectedIndex;
     var opt = document.getElementsByTagName("option")[sel].value;
    var gg = document.getElementById("page").value;
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //ie5, ie 6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2 - tra ket qua sau khi thi hanh xong
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) // su ly hoan thanh va tim thay trang
        {
            document.getElementById("hienthi").innerHTML = xmlhttp.responseText;
        }
    }
    //3 mo lien ket den may chu
    xmlhttp.open("GET", "user_ajax.php?views=" + opt + "&page=" + gg, true); //sd post nhieu hon
    xmlhttp.send();

}
function Tim_employee(gttim) {
    //ajax
    //1-khai bao & khoi tao doi tuong Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //ie5, ie 6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2 - tra ket qua sau khi thi hanh xong
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) // su ly hoan thanh va tim thay trang
        {
            document.getElementById("hienthi").innerHTML = xmlhttp.responseText;
        }
    }
    //3 mo lien ket den may chu
    xmlhttp.open("POST", "xl_tim_employee.php", true); //sd post nhieu hon
    var data = new FormData();
    data.append("gttim", gttim) // ten,gt
    //4-gui thong tin
    xmlhttp.send(data);
}
function Tim_employee2() {
    var gttim = document.getElementById("name_employee").value;
   // var x = document.getElementById("department_id3").selectedIndex;
    // var department = document.getElementsByTagName("option")[x].value;
  // var department = document.getElementById("myOption").value;
       var selector = document.getElementById('department_id3');
    var department = selector[selector.selectedIndex].value;
   
    //ajax
    //1-khai bao & khoi tao doi tuong Ajax
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    else {
        //ie5, ie 6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //2 - tra ket qua sau khi thi hanh xong
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) // su ly hoan thanh va tim thay trang
        {
            document.getElementById("hienthi").innerHTML = xmlhttp.responseText;
        }
    }
    //3 mo lien ket den may chu
    xmlhttp.open("POST", "xl_tim_employee.php", true); //sd post nhieu hon
    var data = new FormData();
    data.append("gttim", gttim); // ten,gt
    data.append("department2", department);
    //4-gui thong tin
    xmlhttp.send(data);
}