function cekNilaiMhs(){

let nim = document.getElementById("npm").value;
let outputNilai = parseInt(document.getElementById("nilai").value);
let hasil = document.getElementById("hasil");
let huruf;

if(outputNilai<0 || outputNilai>100){
    hasil.innerHTML = "Nilai tidak valid!";
}
else{
    if(outputNilai >=80){
        huruf ="A";
    }
    else if(outputNilai >=70){
        huruf ="B";
    }
    else if(outputNilai >=60){
        huruf ="C";
    }
    else if(outputNilai >=50){
        huruf ="D";
    }
    else{
        huruf ="E";
    }

    hasil.innerHTML = "NIM: " + nim + "<br>Huruf Mutu: " + huruf;
}

}