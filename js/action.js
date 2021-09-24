$(document).ready(function(e){
    //----------------------------------- Automatic function refresh--------------------
    setInterval(function(){
        Push.Permission.request();
        $('#inputIsValid').hide(); $('#inputIsInvalid').hide(); $('#errorinputIsValid').hide(); $('#errorinputIsInvalid').hide(); 
        $('#inputIsValidinventary').hide();$('#inputIsInvalidinventary').hide();	
      },1000);
     //-------------------------------fin----------------------------------------
     $('#inputIsValid').hide();$('#inputIsInvalid').hide();$('#tblerrors').hide();$('#tblitems').hide();FullPrinter();$('#avis').hide();
     let edition=false; $('#errorinputIsValid').hide();$('#errorinputIsInvalid').hide(); let editions=false;FullItem();FullInventaryGrid();
     $('#inputIsValidinventary').hide();$('#inputIsInvalidinventary').hide();
     //-------------------------------fin----------------------------------------
    function FullPrinter(){
        $.ajax({
            type:'GET',
            url:'phpFiles/SelectDevice.php',
            success:function(html){
              let repons=JSON.parse(html);
              let template='';
             // console.log(repons);
              repons.forEach(rep=>{
                template+=`
                 <option value="${rep.id}">${rep.device}</option>
                `
              });
              $('#printer').html(template);
              $('#printers').html(template);
              $('#errorprinter').html(template);
            }
           });
      }

      function FullItem(){
        $.ajax({
            type:'GET',
            url:'phpFiles/SelectItems.php',
            success:function(html){
              let repons=JSON.parse(html);
              let template='';
              //console.log(repons);
              repons.forEach(rep=>{
                template+=`
                 <option value="${rep.id}">${rep.item}  ${rep.itemdesc}</option>
                `
              });
              $('#itemnumbers').html(template);
            }
           });
      }
    
    $(document).on('click','#addcreateItem', function(e){
        let datos=new FormData($('#additem')[0]); 
        let url=edition===false ? 'phpFiles/createItem.php' : 'phpFiles/editItem.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
              // console.log(response);
              if(response==="good"){
                $('#inputIsValid').show();
               }else if(response==="bad"){
                $('#inputIsInvalid').show();
               }else{
                $('#inputIsValid').show(); 
               }
               $('#additem').trigger('reset');
               edition=false;
               FullItemsGrid();
            }
      });
      e.preventDefault();
    }); 

    $("#partimage").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/PNG","image/jpg","image/JPG","image/JPEG"];
        if(!((imagefile==match[0])|| (imagefile==match[1])|| (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4]))){
            alert('Oups! The picture format is incorrect, please use one of this format picture (JPEG/JPG/PNG).');
            $("#partimage").val('');
            return false;
        }
    });

    $("#property").change(function() {
       let param=$('#property').val();
       if(param==="Items"){
        $('#tblitems').show(); $('#tblerrors').hide(); $('#tblerrors').hide(); $('#search').show();FullItemsGrid();$('#avis').hide(); 
       }else if(param==="Errors"){
        $('#tblitems').hide(); $('#tblerrors').show(); $('#search').show(); FullErrorsGrid();$('#avis').hide(); 
       }else{
        $('#tblitems').hide(); $('#tblerrors').hide(); $('#search').show(); 
       }
      });


      function FullItemsGrid(){
        $.ajax({
            type:'GET',
            url:'phpFiles/SelectAllItems.php',
            success:function(html){
              let repons=JSON.parse(html);
              let template='';
              //console.log(repons);
              repons.forEach(rep=>{
                template+=`
                <tr class="tr-shadow" taskid="${rep.id}">
                <td>${rep.item}</td>
                <td>${rep.itemdesc}</td>
                <td>${rep.price}</td>
                <td>${rep.partdesc}</td>
                <td>${rep.part}</td>
                <td>${rep.printer}</td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" id="viewpicture" data-toggle="modal" data-target="#mediumModal" data-toggle="tooltip" data-placement="top" title="View Picture">
                            <i class="zmdi zmdi-camera"></i>
                        </button>
                        <button class="item" id="edititem" data-toggle="modal" data-target="#largeModal" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" id="deleteitem" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                    </div>
                </td>
            </tr>
                `
              });
              $('#showitems').html(template);
          
            }
           });
      }

      $(document).on('click','#viewpicture', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/SelectSingleItems.php', {id} , function(response){
          const repons=JSON.parse(response);
          let template='';
         // console.log(repons);
          template+=`
                <img class="card-img-top" src="${repons.link}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mb-3">Picture Desc.: ${repons.partdesc}</h4>
                    <p class="card-text"> Part #: ${repons.part} / Item Name: ${repons.itemdesc} / Item #: ${repons.item} </p>
                </div>
                `
            $('#showedpicture').html(template);
        });
         e.preventDefault();
      
      });
      
      $(document).on('click','#edititem', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/SelectSingleItems.php', {id} , function(response){
         let template='';
          const repons=JSON.parse(response);
          template=`
            <option value="${repons.code}">${repons.printer}</option>
          `
          $('#hiddenparam').val(repons.id);
          $('#itemnumber').val(repons.item);
          $('#itemdescription').val(repons.itemdesc);
          $('#price').val(repons.price);
          $('#partnumber').val(repons.part);
          $('#partdescription').val(repons.partdesc);
          $('#printer').html(template);
          edition=true;
        });
         e.preventDefault();
      
      });

      $(document).on('click','#deleteitem', function(e){
        if(confirm('Do you really want to delete this information?')){
         let element=$(this)[0].parentElement.parentElement.parentElement;
         let id= $(element).attr('taskid');
        $.post('phpFiles/deleteItem.php', {id} , function(response){
            if(response==="good"){
                FullItemsGrid();
                alert("Success! the information as been deleted");
            }
              
        });
         
        }
        e.preventDefault();
      
      });

      $(document).on('keyup','#search', function(e){
        let datos={
            property:$('#property').val(),
            printer:$('#printers').val(),
            param:$('#search').val(),
        };
       $.post('phpFiles/searchItem.php', datos, function(response){
          //console.log(response);
          let template=''; let template1='';
          if(response==="sendavis"){
            $('#avis').show();
          }else{
            let repons=JSON.parse(response);
            $('#avis').hide(); 
            repons.forEach(rep=>{
              if(rep.condition==="piece"){
                template+=`
                  <tr class="tr-shadow" taskid="${rep.id}">
                      <td>${rep.item}</td>
                      <td>${rep.itemdesc}</td>
                      <td>${rep.price}</td>
                      <td>${rep.partdesc}</td>
                      <td>${rep.part}</td>
                      <td>${rep.printer}</td>
                      <td>
                          <div class="table-data-feature">
                              <button class="item" id="viewpicture" data-toggle="modal" data-target="#mediumModal" data-toggle="tooltip" data-placement="top" title="View Picture">
                                  <i class="zmdi zmdi-camera"></i>
                              </button>
                              <button class="item" id="edititem" data-toggle="modal" data-target="#largeModal" data-toggle="tooltip" data-placement="top" title="Edit">
                                  <i class="zmdi zmdi-edit"></i>
                              </button>
                              <button class="item" id="deleteitem" data-toggle="tooltip" data-placement="top" title="Delete">
                                  <i class="zmdi zmdi-delete"></i>
                              </button>
                          </div>
                      </td>
                </tr>
                `
               }else{
                  template1+=`
                      <tr class="tr-shadow" taskid="${rep.id}">
                      <td>${rep.problem}</td>
                      <td>${rep.printer}</td>
                      <td>${rep.cause}</td>
                      <td>${rep.corrective}</td>
                      <td>
                          <div class="table-data-feature">
                              <button class="item" id="editerrores" data-toggle="modal" data-target="#largeModals" data-toggle="tooltip" data-placement="top" title="Edit">
                                  <i class="zmdi zmdi-edit"></i>
                              </button>
                              <button class="item" id="deleteerrores" data-toggle="tooltip" data-placement="top" title="Delete">
                                  <i class="zmdi zmdi-delete"></i>
                              </button>
                          </div>
                      </td>
                    </tr>
                  `
               }
              });
              $('#showitems').html(template);$('#showerrors').html(template1);
          }  
        });
         e.preventDefault();
      
      });

      $(document).on('click','#addcreateError', function(e){
        let datos={
            problem:$('#problem').val(),
            printer:$('#errorprinter').val(),
            cause:$('#cause').val(),
            corrective:$('#corrective').val(),
            idproblem:$('#idproblem').val(),
        };
        let url=editions===false ? 'phpFiles/addError.php' : 'phpFiles/editError.php';
       $.post(url, datos, function(response){
          //console.log(response);
          if(response==="good"){
            $('#errorinputIsValid').show();
           }else if(response==="bad"){
            $('#ierrornputIsInvalid').show();
           }else{
            $('#errorinputIsValid').show(); 
           }
           $('#adderror').trigger('reset');
           editions=false;
           FullErrorsGrid();
        });
         e.preventDefault();
      
      });

      function FullErrorsGrid(){
        $.ajax({
            type:'GET',
            url:'phpFiles/SelectAllErrors.php',
            success:function(html){
              let repons=JSON.parse(html);
              let template='';
              //console.log(repons);
              repons.forEach(rep=>{
                template+=`
                <tr class="tr-shadow" taskid="${rep.id}">
                <td>${rep.problem}</td>
                <td>${rep.printer}</td>
                <td>${rep.cause}</td>
                <td>${rep.corrective}</td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" id="editerrores" data-toggle="modal" data-target="#largeModals" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </button>
                        <button class="item" id="deleteerrores" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="zmdi zmdi-delete"></i>
                        </button>
                    </div>
                </td>
            </tr>
                `
              });
              $('#showerrors').html(template);
          
            }
           });
      }

      $("#printers").change(function() {
        let param=$('#printers').val();
        $.post('phpFiles/SelectSingleErrors.php',{param},function(response){
          //console.log(response);
          let repons=JSON.parse(response);
          let template='';
          repons.forEach(rep=>{
            template+=`
            <tr class="tr-shadow" taskid="${rep.id}">
            <td>${rep.problem}</td>
            <td>${rep.printer}</td>
            <td>${rep.cause}</td>
            <td>${rep.corrective}</td>
            <td>
                <div class="table-data-feature">
                    <button class="item" id="editerrores" data-toggle="modal" data-target="#largeModals" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="zmdi zmdi-edit"></i>
                    </button>
                    <button class="item" id="deleteerrores" data-toggle="tooltip" data-placement="top" title="Delete">
                        <i class="zmdi zmdi-delete"></i>
                    </button>
                </div>
            </td>
        </tr>
            `
          });
          $('#showerrors').html(template);
        });
      });

      $(document).on('click','#deleteerrores', function(e){
        if(confirm('Do you really want to delete this information?')){
         let element=$(this)[0].parentElement.parentElement.parentElement;
         let id= $(element).attr('taskid');
        $.post('phpFiles/deleteError.php', {id} , function(response){
            if(response==="good"){
              FullErrorsGrid();
                alert("Success! the information as been deleted");
            }
              
        });
         
        }
        e.preventDefault();
      });

      $(document).on('click','#editerrores', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/SelectSingleError.php', {id} , function(response){
       // console.log(response);
          const repons=JSON.parse(response);
          $('#idproblem').val(repons.id);
          $('#problem').val(repons.problem);
          $('#cause').val(repons.cause);
          $('#corrective').val(repons.corrective);
          $('#errorprinter').val(repons.printer);
          editions=true;
        });
         e.preventDefault();
      
      });

      $("#itemnumbers").change(function() {
        let param=$('#itemnumbers').val();
          $.post('phpFiles/SearchItemValue.php',{param},function(response){
            const repons=JSON.parse(response);
            //console.log(repons.itemdesc);
            $('#itemdescs').val(repons.itemdesc);
            $('#partdescs').val(repons.part);
          });
       });

       $(document).on('click','#addItemToInventary', function(e){
        let datos={
            item:$('#itemnumbers').val(),
            quantity:$('#quantity').val(),
            subinventary:$('#subinventary').val(),
            sigle:$('#sigle').val(),
            locator:$('#locator').val(),
        };
       $.post('phpFiles/addInventary.php', datos, function(response){
         // console.log(response);
          if(response==="good"){
            $('#inputIsValidinventary').show();
            FullInventaryGrid();
           }else if(response==="bad"){
            $('#nputIsInvalidinventary').show();
           }else{
            $('#inputIsValidinventary').show(); 
           }

           $('#addinventary').trigger('reset');
        });
         e.preventDefault();
      
      });

      function FullInventaryGrid(){
        $.ajax({
            type:'GET',
            url:'phpFiles/SelectAllInventary.php',
            success:function(html){
              //console.log(html);
              let repons=JSON.parse(html);
              let template='';
              repons.forEach(rep=>{
                template+=`
                 <tr taskid="${rep.iditem}" taskitem="${rep.id}">
                     <td>${rep.item}</td>
                        <td>${rep.itemdesc}</td>
                          <td>${rep.printer}</td>
                          <td>${rep.sub}</td>
                          <td>${rep.sigle}</td>
                          <td>${rep.locator}</td>
                          <td><input type="text"  value="${rep.qty}" id="cant${rep.id}" name="cant${rep.id}"  
                          style="width:80px;background-color:rgb(255, 244, 143);text-align:center;"></td>
                        <td>${rep.status}</td>
                    <td>
                      <div class="table-data-feature">
                          <button class="item" id="viewpicture" data-toggle="modal" data-target="#mediumModal" data-toggle="tooltip" 
                              data-placement="top" title="View Picture">
                              <i class="zmdi zmdi-camera"></i>
                          </button>
                          <button class="item" id="updateinventary" data-toggle="tooltip" data-placement="top" title="Update Quantity">
                              <i class="zmdi zmdi-check"></i>
                          </button>
                      </div>
                    </td>
                  </tr> 
                `
              });
              
              $('#viewinventary').html(template);
          
            }
           });
      }

      $(document).on('keyup','#searchinventary', function(e){
        let datos={
            param:$('#searchinventary').val(),
        };
       $.post('phpFiles/searchSingleInventary.php', datos, function(response){
          //console.log(response);
          let template=''; 
            let repons=JSON.parse(response);
            $('#avis').hide(); 
            repons.forEach(rep=>{
                template+=` 
                <tr taskid="${rep.iditem}" taskitem="${rep.id}">
                <td>${rep.item}</td>
                   <td>${rep.itemdesc}</td>
                     <td>${rep.printer}</td>
                     <td>${rep.sub}</td>
                     <td>${rep.sigle}</td>
                     <td>${rep.locator}</td>
                     <td><input type="text"  value="${rep.qty}" id="cant${rep.id}" name="cant${rep.id}"  style="width:80px;background-color:rgb(255, 244, 143);text-align:center;"></td>
                   <td>${rep.status}</td>
               <td>
                 <div class="table-data-feature">
                     <button class="item" id="viewpicture" data-toggle="modal" data-target="#mediumModal" data-toggle="tooltip" data-placement="top" title="View Picture">
                       <i class="zmdi zmdi-camera"></i>
                     </button>
                     <button class="item" id="updateinventary" data-toggle="tooltip" data-placement="top" title="Update Quantity">
                         <i class="zmdi zmdi-check"></i>
                     </button>
                 </div>
               </td>
             </tr> 
           `
         });
         $('#viewinventary').html(template);
        });
         e.preventDefault();
      
      });
       
      
      $(document).on('click','#updateinventary', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskitem'); let iden="#cant"+id;
       let inputField= $(iden).val(); 
       $.post('phpFiles/UpdateInventary.php?param='+inputField, {id} , function(response){
       // console.log(response);
          if(response==="good"){
            alert("The Quantity as been updated with success.");
          }
          FullInventaryGrid();
        });
         e.preventDefault();
      
      });

      $(document).on('click','#additemforedits', function(e){
        window.location="atelier.html";
        var obj=$('#additemforedit');
        obj.click();
      });

      $(document).on('keyup','#itemfilter', function(e){
        let param=$('#itemfilter').val();
       $.post('phpFiles/searchItemfilter.php', {param}, function(response){
          let repons=JSON.parse(response);
          let template=''; 
          repons.forEach(rep=>{
            template+=`
             <option value="${rep.id}">${rep.item}  ${rep.itemdesc}</option>
            `
          });
          $('#itemnumbers').html(template);
        
        });
      });
    
});