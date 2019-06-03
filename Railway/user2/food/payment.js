function cardnumber(inputtxt,csv)
{
  var cardno = /^(?:3[47][0-9]{13})$/;
  var csvReg = /^[0-9]{3,4}$/;
  if(inputtxt.value.match(cardno)&&csv.value.match(csvReg))
        {
        return true;
        }
      else
        {
        alert("Not a valid  credit card details!");
        return false;
        }
        
        

}