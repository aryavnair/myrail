function cardnumber(number,csv)
{
  var cardno = /^(?:3[47][0-9]{13})$/;
  var csvReg = /^[0-9]{3,4}$/;
  if(number.value.match(cardno)&&csv.value.match(csvReg))
        {
        return true;
        }
      else
        {
        
        return false;
        }
        
        

}