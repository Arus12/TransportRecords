/**
 * @author Jan Černý
 */

function showTime() {
    var date = new Date();
    var h = date.getHours();
    var m = date.getMinutes();
    var s = date.getSeconds();

    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;

    var time = h + ":" + m + ":" + s;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;

    setTimeout(showTime, 1000);

}
showTime();

/**
 * @author Jan Černý
 */
function showTable() {
    const xhttp = new XMLHttpRequest();
    let data = [];

    let table = document.createElement('table');
    let thead = document.createElement('thead');
    let tbody = document.createElement('tbody');

    table.appendChild(thead);
    table.appendChild(tbody);


    document.getElementById('body').appendChild(table);
    let row_1 = document.createElement('tr');
    let heading_1 = document.createElement('th');
    heading_1.innerHTML = "Číslo spoje";
    let heading_2 = document.createElement('th');
    heading_2.innerHTML = "Příjezd";
    let heading_3 = document.createElement('th');
    heading_3.innerHTML = "Odjezd";
    let heading_4 = document.createElement('th');
    heading_4.innerHTML = "Město";

    row_1.appendChild(heading_1);
    row_1.appendChild(heading_2);
    row_1.appendChild(heading_3);
    row_1.appendChild(heading_4);
    thead.appendChild(row_1);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            data = JSON.parse(xhttp.responseText);
            for (let spoj of data) {
                let row_2 = document.createElement('tr');
                let row_2_data_1 = document.createElement('td');
                row_2_data_1.innerHTML = spoj.spoj;
                let row_2_data_2 = document.createElement('td');
                row_2_data_2.innerHTML = spoj.prijezd;
                let row_2_data_3 = document.createElement('td');
                row_2_data_3.innerHTML = spoj.odjezd;
                let row_2_data_4 = document.createElement('td');
                row_2_data_4.innerHTML = spoj.mesto;
                row_2.appendChild(row_2_data_1);
                row_2.appendChild(row_2_data_2);
                row_2.appendChild(row_2_data_3);
                row_2.appendChild(row_2_data_4);
                tbody.appendChild(row_2);
                console.log(spoj.prijezd);
            }
        }
    };

    xhttp.open("GET", "php/load.php", true);
    xhttp.send();
}