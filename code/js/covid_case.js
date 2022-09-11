let startDate = document.getElementById('startDate');
startDateVal = "";
startDate.addEventListener('change',(e)=>{
  startDateVal = e.target.value;//periexei thn timh pou exei dwsei o xrhsths ws hmera noshshs
  // document.getElementById('startDateSelected').innerText = startDateVal;

});
let checkbox = document.getElementById('flexSwitchCheckChecked');//an o xrhsths exei covid tha to piasoume edw
check=false;
checkbox.addEventListener('change', function() {
  if (this.checked) {//an einai checked shmainei oti exei covid
    check = true;
    console.log("Checkbox is checked..",check);
  } else {
    console.log("Checkbox is not checked..");
  }
});

if(check==true && startDateVal!="")
{
  // $( document ).ready(function() {
  //     $post("../php/covid_case_back.php",{date: startDate , username : $_SESSION['username'],});
  //
  // });
  console.log(startDate);
  console.log("Mesa sthn if");

}
