function cheack_patient(){

    var result = true;
        //get inputs by id:
    var prenom= document.getElementById('prenom');
    var nom= document.getElementById('nom');
    var cin= document.getElementById('cin');
    var email= document.getElementById('email');
    var date_n= document.getElementById('date_n');
    var date_v= document.getElementById('date_v');
    var female= document.getElementById('female');
    var Adr= document.getElementById('Adr');
    var ville= document.getElementById('ville');
    var region= document.getElementById('region');
    var tele= document.getElementById('tele');
     //regx
     var rgCIN=/^[A-Za-z0-9]{1,20}$/;
     var rgnom = /^[A-Za-z ]{1,20}$/;
     var rgdate=/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/;
     var rgtele =/^[0-9+()-]{8,20}$/g;
    //cheking
    function tored(inp)
    {
        inp.focus();
        inp.addEventListener('focus', (event) => {
         event.target.style.border = '1px solid red';    
       });
       
       inp.addEventListener('blur', (event) => {
         event.target.style.border = '';    
       }); 
      result= false;
    }
    
    if(rgnom.test(prenom.value)==false)
    {
        tored(prenom);
    }
    else if(rgnom.test(nom.value)==false)
    {
        tored(nom);
    }
    else if(rgCIN.test(cin.value)==false)
    {
        tored(cin);
    }
    else if(rgtele.test(tele.value)==false)
    {
        tored(tele);
    }
    if(date_n.value=='')
    {
        tored(date_n);
    }
    if(date_v.value=='')
    {
        tored(date_v);
    }
    if(Adr.value=='')
    {
        tored(Adr);
    }
    if(region.value=='')
    {
        tored(region);
    }
   
    if(result==false)
    {
        {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Un problème est survenu!',
                })
                return false;
        }
    }

    return result;
     
}


