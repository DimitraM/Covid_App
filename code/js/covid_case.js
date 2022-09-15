
const _MS_PER_DAY = 1000 * 60 * 60 * 24;

// a and b are javascript Date objects
function dateDiffInDays(a, b) {
  // to utc pairnei ta milliseconds apo thn 1h Ianouariou tou 1970 mexri mia hmeromhnia
  const utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());//https://www.w3schools.com/jsref/jsref_utc.asp
  const utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

  return Math.floor((utc2 - utc1) / _MS_PER_DAY);
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),//to 0 einai o prwtos mhnas opote vazoume +1 gia na voithisei sthn morfopoihsh
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}


$( document ).ready(function() {
let checkbox = document.getElementById('flexSwitchCheckChecked');//an o xrhsths exei covid tha to piasoume edw
var check=false;
checkbox.addEventListener('change', function() {
    if (this.checked) {//an einai checked shmainei oti exei covid
      check = true;

      let startDate = document.getElementById('startDate');// an einai checked kai exei dwsei kai mia hmeromhnia
      startDateVal = "";
      startDate.addEventListener('change',(e)=>{
      startDateVal = e.target.value;//periexei thn timh pou exei dwsei o xrhsths ws hmera noshshs


      $.get( "php/check_for_covid.php", function( data ) {
        var result = JSON.parse(data);
       
          result = new Date(result.Date);// ftiaxnoume to apotelesma se morfh date
          var todayDate = new Date(); //Today Date
          var diff_db= dateDiffInDays(result,todayDate); // pairnoume thn diafora tous

          // console.log(diff);
          var input = new Date(startDateVal);
          var diff_input = dateDiffInDays(input,todayDate);

          if (diff_db < 0 || diff_db<14 || diff_input < 0 ){
            alert( "Δεν μπορείτε να εισάγετε ημερομηνία" );
          }
          else if((diff_db>=0 || diff_db>=14 || diff_db !== diff_db) &&  diff_input >= 0 )
          {
            alert("Mπορείτε να εισάγετε την ημερομηνία " + startDateVal);
            $("#covid-button").on('click', function() {

            var covid_input= formatDate(startDate.valueAsDate).toString();;
            $.post("php/upload_covid_case.php",{date: covid_input},function( data ) {//stelnoyme ston server
              alert("Η εισαγωγή κρούσματος έγινε με επιτυχία!")
              console.log( "Data Loaded: " +  data );
            });
          });

          }

      });

    });
  }
     else {
      console.log("Checkbox is not checked..");
    }

  });
});
