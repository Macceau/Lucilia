$(document).ready(function(e){
    //----------------------------------- Automatic function refresh--------------------
    setInterval(function(){
        Push.Permission.request();
        $('#inputIsValid').hide(); $('#inputIsInvalid').hide(); $('#errorinputIsValid').hide(); $('#errorinputIsInvalid').hide(); 
        $('#inputIsValidinventary').hide();$('#inputIsInvalidinventary').hide();	$('#goodalert').hide();$('#badalert').hide();
      },1000);
     //-------------------------------fin----------------------------------------
     FillHead(); FullItemsGrid(); FullErrorsGrid(); FullInventaryGrid(); 
     $('#inputIsValid').hide();$('#inputIsInvalid').hide();$('#tblerrors').hide();$('#tblitems').hide();FullPrinter();$('#avis').hide();
     let edition=false; $('#errorinputIsValid').hide();$('#errorinputIsInvalid').hide(); let editions=false;FullItem();FullInventaryGrid();
     $('#inputIsValidinventary').hide();$('#inputIsInvalidinventary').hide(); $('#avisexport').hide(); let machineedition=false;
     let edit=false; $('#refreshmachine').hide(); $('#goodalert').hide(); $('#badalert').hide(); $('#badusername').hide();
     $('#goodpassword').hide(); $('#badpassword').hide(); $('#badconfirmation').hide(); FullMachine(); locatoredition=false; FullLocator();
     let subedition=false; FullSub(); let sigleedition=false; FullSigle();
     
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

      $(document).on('click','#ActiveList', function(e){
        $('#refreshmachine').show();
      }); 

      $(document).on('click','#refreshmachine', function(e){
        FullPrinter();
      }); 
    
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
               //console.log(response);
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
        if(!((imagefile==match[0])|| (imagefile==match[1])|| (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4])|| (imagefile==match[5]))){
            alert('Oups! The picture format is incorrect, please use one of this format (JPEG / JPG / PNG).');
            $("#partimage").val('');
            return false;
        }
    });

    $("#image").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["image/jpeg","image/png","image/PNG","image/jpg","image/JPG","image/JPEG"];
      if(!((imagefile==match[0])|| (imagefile==match[1])|| (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4])|| (imagefile==match[5]))){
          alert('Oups! The picture format is incorrect, please use one of this format (JPEG / JPG / PNG).');
          $("#image").val('');
          return false;
      }
  });

  /*  $("#exten").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["MP4","mp4","MOV","mov","WMV","wmv","FLV","flv","avi","AVI"];
      if(!((imagefile==match[0])|| (imagefile==match[1])|| (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4])
      || (imagefile==match[5]) || (imagefile==match[6]) || (imagefile==match[7]) || (imagefile==match[8]) || (imagefile==match[9]))){
          alert('Oups! The video format is incorrect, please use one of this format (MP4 / MOV / WMV / FLV / AVI).');
          $("#exten").val('');
          return false;
      }
  });*/

    $("#property").change(function() {
       let param=$('#property').val();
       if(param==="Items"){
        $('#tblitems').show(); $('#tblerrors').hide(); $('#tblerrors').hide(); $('#search').show();FullItemsGrid();$('#avis').hide(); $('#avisexport').hide();
       }else if(param==="Errors"){
        $('#tblitems').hide(); $('#tblerrors').show(); $('#search').show(); FullErrorsGrid();$('#avis').hide(); $('#avisexport').hide();
       }else{
        $('#tblitems').hide(); $('#tblerrors').hide(); $('#search').show(); $('#avisexport').hide();
       }
      });


      function FullItemsGrid(){
        $.ajax({
            type:'GET',
            url:'phpFiles/SelectAllItems.php',
            success:function(html){
              let repons=JSON.parse(html);
              let template='';
              let template1='';
              //console.log(repons);
              repons.forEach(rep=>{
                template+=`
                <tr  taskid="${rep.id}">
                <td scope="row">${rep.item}</td>
                <td>${rep.itemdesc}</td>
                <td>${rep.price}</td>
                <td>${rep.partdesc}</td>
                <td>${rep.part}</td>
                <td>${rep.printer}</td>
                <td scope="row">
                    <div class="table-data-feature">
                        <button class="btn btn-primary" id="viewpicture" data-bs-toggle="modal" data-bs-target="#mediumModal" data-toggle="tooltip" data-placement="top" title="View Picture">
                            <i class="bi bi-camera"></i>
                        </button>
                        <button class="btn btn-success" id="edititem" data-bs-toggle="modal" data-bs-target="#largeModalll" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger" id="deleteitem" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>
                        <button class="btn btn-info" id="addtoinventary" data-toggle="tooltip" data-placement="top" title="Add Item To Inventary">
                            <i class="bi bi-clipboard"></i>
                        </button>
                    </div>
                </td>
            </tr>
                `
                template1=`
                <span class="badge bg-warning text-dark">${rep.qtyitem}</span>
                `

              });
              $('#showitems').html(template);
              $('#countitem').html(template1);
            }
           });
      }

      $(document).on('click','#viewpicture', function(e){
       let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/SelectSingleItems.php', {id} , function(response){
          const repons=JSON.parse(response);
          let template='';
          //console.log(repons);
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
          $('#refreshmachine').show();
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
          let template=''; let template1='';let template2='';
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
                          <button class="btn btn-primary" id="viewpicture" data-bs-toggle="modal" data-bs-target="#mediumModal" data-toggle="tooltip" data-placement="top" title="View Picture">
                             <i class="bi bi-camera"></i>
                          </button>
                          <button class="btn btn-success" id="edititem" data-bs-toggle="modal" data-bs-target="#largeModalll" data-toggle="tooltip" data-placement="top" title="Edit">
                             <i class="bi bi-pencil"></i>
                          </button>
                          <button class="btn btn-danger" id="deleteitem" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="bi bi-trash"></i>
                          </button>
                          <button class="btn btn-info" id="addtoinventary" data-toggle="tooltip" data-placement="top" title="Add Item To Inventary">
                             <i class="bi bi-clipboard"></i>
                          </button>
                          </div>
                      </td>
                </tr>
                `
               }else if(rep.condition==="error"){
                  template1+=`
                      <tr class="tr-shadow" taskid="${rep.id}" style="text-align:justify;">
                      <td>${rep.problem}</td>
                      <td>${rep.printer}</td>
                      <td>${rep.cause}</td>
                      <td>${rep.corrective}</td>
                      <td>
                      <button class="btn btn-warning" id="play" data-bs-toggle="modal" data-bs-target="#largeModalv" data-toggle="tooltip" data-placement="top" title="Play Video">
                      <i class="bi bi-play"></i>
                       </button>
                       <button class="btn btn-success" id="editerrores" data-bs-toggle="modal" data-bs-target="#largeModals" data-toggle="tooltip" data-placement="top" title="Edit">
                              <i class="bi bi-pencil"></i>
                          </button>
                          <button class="btn btn-danger" id="deleteerrores" data-toggle="tooltip" data-placement="top" title="Delete">
                              <i class="bi bi-trash"></i>
                          </button>
                          </div>
                      </td>
                    </tr>
                  `
               }else {
                template2+=` 
                <tr taskid="${rep.iditem}" taskitem="${rep.id}">
                <td>${rep.item}</td>
                   <td>${rep.itemdesc}</td>
                     <td>${rep.printer}</td>
                     <td>${rep.sub}</td>
                     <td>${rep.sigle}</td>
                     <td>${rep.locator}</td>
                     <td style="text-align:center;"><b>${rep.qty}</b></td>
                    <td>
                      <div class="table-data-feature">
                      <button class="btn btn-primary" id="viewpicture" data-bs-toggle="modal" data-bs-target="#mediumModal" data-toggle="tooltip" 
                      data-placement="top" title="View Picture">
                        <i class="bi bi-camera"></i>
                      </button>
                        <button class="btn btn-success" id="modallarge" data-bs-toggle="modal" data-bs-target="#largeModal" data-toggle="tooltip" 
                          data-placement="top" title="Modify Inventary">
                          <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-secondary" id="showquantity" data-bs-toggle="modal" data-bs-target="#mediumModals" data-toggle="tooltip" 
                        data-placement="top" title="Update Quantity">
                            <i class="bi bi-arrow-repeat"></i>
                        </button>
                      </div>
                    </td>
                  </tr> 
                `
               }
              });
              $('#showitems').html(template);$('#showerrors').html(template1);$('#viewinventary').html(template2);
          }  
        });
         e.preventDefault();
      
      });

      $(document).on('click','#addcreateError', function(e){
        let datos=new FormData($('#adderror')[0]); 
        let url=editions===false ? 'phpFiles/addError.php' : 'phpFiles/editError.php';
        $.ajax({
            type: 'POST',
            url: url,
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
               //console.log(response);
              if(response==="good"){
                $('#errorinputIsValid').show();
               }else if(response==="bad"){
                $('#errorinputIsInvalid').show();
               }else{
                $('#errorinputIsValid').show(); 
               }
               $('#adderror').trigger('reset');
               editions=false;
               FullErrorsGrid();
			   $('#refreshmachine').hide();
            }
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
                <tr class="tr-shadow" taskid="${rep.id}" style="text-align:justify;">
                <td>${rep.problem}</td>
                <td>${rep.printer}</td>
                <td>${rep.cause}</td>
                <td>${rep.corrective}</td>
                <td>
                    <div class="table-data-feature">
                    <button class="btn btn-warning" id="play" data-bs-toggle="modal" data-bs-target="#largeModalv" data-toggle="tooltip" data-placement="top" title="Play Video">
                    <i class="bi bi-play"></i>
                     </button>
                     <button class="btn btn-success" id="editerrores" data-bs-toggle="modal" data-bs-target="#largeModals" data-toggle="tooltip" data-placement="top" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-danger" id="deleteerrores" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="bi bi-trash"></i>
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
        let params=$('#property').val();
        $.post('phpFiles/SelectSingleErrors.php',{param,params},function(response){
          //console.log(response);
          let repons=JSON.parse(response);
          let template='';let templates='';let template1='';
          repons.forEach(rep=>{
            if(rep.lojik===""){
                  template+=`
                  <tr class="tr-shadow" taskid="${rep.id}"style="text-align:justify;" >
                  <td>${rep.problem}</td>
                  <td>${rep.printer}</td>
                  <td>${rep.cause}</td>
                  <td>${rep.corrective}</td>
                  <td>
                      <div class="table-data-feature">
                      <button class="btn btn-warning" id="play" data-toggle="modal" data-target="#largeModalv" data-toggle="tooltip" data-placement="top" title="Play Video">
                      <i class="bi bi-play"></i>
                       </button>
                       <button class="btn btn-success" id="editerrores" data-toggle="modal" data-target="#largeModals" data-toggle="tooltip" data-placement="top" title="Edit">
                              <i class="bi bi-pencil"></i>
                          </button>
                          <button class="btn btn-danger" id="deleteerrores" data-toggle="tooltip" data-placement="top" title="Delete">
                              <i class="bi bi-trash"></i>
                          </button>
                      </div>
                  </td>
                  </tr>
                  `
            }else if(rep.lojik==="val"){
              templates+=`
              <tr class="tr-shadow" taskid="${rep.id}">
                      <td>${rep.item}</td>
                      <td>${rep.itemdesc}</td>
                      <td>${rep.price}</td>
                      <td>${rep.partdesc}</td>
                      <td>${rep.part}</td>
                      <td>${rep.printer}</td>
                      <td>
                          <div class="table-data-feature">
                          <button class="btn btn-primary" id="viewpicture" data-bs-toggle="modal" data-bs-target="#mediumModal" data-toggle="tooltip" data-placement="top" title="View Picture">
                             <i class="bi bi-camera"></i>
                          </button>
                          <button class="btn btn-success" id="edititem" data-bs-toggle="modal" data-bs-target="#largeModalll" data-toggle="tooltip" data-placement="top" title="Edit">
                             <i class="bi bi-pencil"></i>
                          </button>
                          <button class="btn btn-danger" id="deleteitem" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="bi bi-trash"></i>
                          </button>
                          <button class="btn btn-info" id="addtoinventary" data-toggle="tooltip" data-placement="top" title="Add Item To Inventary">
                             <i class="bi bi-clipboard"></i>
                          </button>
                          </div>
                      </td>
                </tr>
              `
            }else {
              template1+=`
              <tr taskid="${rep.iditem}" taskitem="${rep.id}">
                  <td>${rep.item}</td>
                     <td>${rep.itemdesc}</td>
                       <td>${rep.printer}</td>
                       <td>${rep.sub}</td>
                       <td>${rep.sigle}</td>
                       <td>${rep.locator}</td>
                       <td style="text-align:center;"><b>${rep.qty}</b></td>
                 <td>
                   <div class="table-data-feature">
                       <button class="btn btn-primary" id="viewpicture" data-bs-toggle="modal" data-bs-target="#mediumModal" data-toggle="tooltip" 
                           data-placement="top" title="View Picture">
                           <i class="bi bi-camera"></i>
                       </button>
                     <button class="btn btn-success" id="modallarge" data-bs-toggle="modal" data-bs-target="#largeModal" data-toggle="tooltip" 
                       data-placement="top" title="Modify Inventary">
                      <i class="bi bi-pencil"></i>
                    </button>
                  <button class="btn btn-secondary" id="showquantity" data-bs-toggle="modal" data-bs-target="#mediumModals" data-toggle="tooltip" 
                  data-placement="top" title="Update Quantity">
                      <i class="bi bi-arrow-repeat"></i>
                  </button>
                   </div>
                 </td>
               </tr> 
             `
            }
            
          });
          $('#showerrors').html(template);
          $('#showitems').html(templates);
          $('#viewinventary').html(template1);
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
       let template='';
          const repons=JSON.parse(response);
          template=`
            <option value="${repons.code}">${repons.printer}</option>
          `
          $('#idproblem').val(repons.id);
          $('#problem').val(repons.problem);
          $('#cause').val(repons.cause);
          $('#corrective').val(repons.corrective);
          $('#errorprinter').html(template);
          $('#videoexten').val(repons.video);
          editions=true;
          $('#refreshmachine').show();
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
            id:$('#iditems').val(),
        };
        let url=edit===false ? 'phpFiles/addInventary.php' : 'phpFiles/editInventary.php';
       $.post(url, datos, function(response){
         // console.log(response);
          if(response==="good"){
            $('#inputIsValidinventary').show();
            FullInventaryGrid();
           }else if(response==="bad"){
            $('#nputIsInvalidinventary').show();
           }else{
            $('#inputIsValidinventary').show(); 
           }
           edit=true;
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
              let template='';  let template1='';
              repons.forEach(rep=>{
                template+=`
                 <tr taskid="${rep.iditem}" taskitem="${rep.id}">
                     <td>${rep.item}</td>
                        <td>${rep.itemdesc}</td>
                          <td>${rep.printer}</td>
                          <td>${rep.sub}</td>
                          <td>${rep.sigle}</td>
                          <td>${rep.locator}</td>
                          <td style="text-align:center;"><b>${rep.qty}</b></td>
                    <td>
                      <div class="table-data-feature">
                          <button class="btn btn-primary" id="viewpicture" data-bs-toggle="modal" data-bs-target="#mediumModal" data-toggle="tooltip" 
                              data-placement="top" title="View Picture">
                              <i class="bi bi-camera"></i>
                          </button>
                        <button class="btn btn-success" id="modallarge" data-bs-toggle="modal" data-bs-target="#largeModal" data-toggle="tooltip" 
                          data-placement="top" title="Modify Inventary">
                         <i class="bi bi-pencil"></i>
                       </button>
                     <button class="btn btn-secondary" id="showquantity" data-bs-toggle="modal" data-bs-target="#mediumModals" data-toggle="tooltip" 
                     data-placement="top" title="Update Quantity">
                         <i class="bi bi-arrow-repeat"></i>
                     </button>
                      </div>
                    </td>
                  </tr> 
                `
                template1=`<span class="badge bg-warning text-dark">${rep.count}</span>`
              });
              
              $('#viewinventary').html(template);
              $('#countiteminventary').html(template1);
            }
           });
      }

      $(document).on('click','#showquantity', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/SelectSingleInventary.php', {id} , function(response){
        
       let repons=JSON.parse(response);
            $('#itemnum').val(repons.item);
            $('#itemid').val(repons.id);
            $('#itemdes').val(repons.itemdesc);
            $('#actual').val(repons.qty);
            $('#actualqty').val(repons.qty);
        });
         e.preventDefault();
      
      });

      $(document).on('click','#modallarge', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/SelectEditInventary.php', {id} , function(response){
        //console.log(response);
            let repons=JSON.parse(response);
            let template=`<option value="${repons.iditem}">${repons.item}</option>`
            $('#itemnumbers').html(template);
            $('#iditems').val(repons.id);
            $('#partdescs').val(repons.partdesc);
            $('#itemdescs').val(repons.itemdesc);
            $('#quantity').val(repons.qty);
            $('#subinventary').val(repons.sub);
            $('#sigle').val(repons.sigle);
            $('#locator').val(repons.locator);
            edit=true;
			
        });
         e.preventDefault();
      
      });
       
      
      $(document).on('click','#updateinventary', function(e){
        let datos={
          itemid:$('#itemid').val(),
          actualqty:$('#actualqty').val(),
          newqty:$('#newquantity').val(),
          action:$('#action').val(),
       };
       $.post('phpFiles/UpdateInventary.php', datos , function(response){
       // console.log(response);
          if(response==="good"){
            alert("The Quantity as been updated with success.");
          }
          $('#updateinventaryfrm').trigger('reset');
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
          //console.log(repons);
          let template=''; 
          repons.forEach(rep=>{
            template+=`
             <option value="${rep.id}">${rep.item}  ${rep.itemdesc}</option>
            `
          });
          $('#itemnumbers').html(template);
        
        });
      });

      $(document).on('click','#refreshmodal', function(e){
        FullItem();
        $('#addinventary').trigger('reset');
      });

      $(document).on('change','#action', function(e){
        let param=$('#action').val();
        let rezilta;
        if(param===""){
          rezilta="Action";
        }else{
          rezilta=param;
        }
        let template=`<label for="nf-email" class=" form-control-label">${rezilta}</label>`
        $('#showlabel').html(template);
      });

      $(document).on('click','#addtoinventary', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/AddItemToInventary.php', {id} , function(response){
       // console.log(response);
          if(response==="good"){
            alert("Item has been added to inventary table with success.");
          }else{
            alert("Ouppss! Item not add to inventary table.");
          }
          
        });
         e.preventDefault();
      
      });

      $(document).on('click','#exportitems', function(e){
       $.post('phpFiles/download.php', function(html){
          if(html==="good"){
          url="phpFiles/download_item.php";
          window.open(url, '_blank');
         }
        });
         e.preventDefault();
      });

      $(document).on('click','#exporterrors', function(e){
        $.post('phpFiles/downloads.php' , function(html){
          if(html==="well"){
           url="phpFiles/download_error.php";
           window.open(url, '_blank');
          }
         });
          e.preventDefault();
       });

       $(document).on('click','#downloadinv', function(e){
        $.post('phpFiles/downloadinventary.php' , function(html){
          if(html==="well"){
           url="phpFiles/Export.php";
           window.open(url, '_blank');
          }
         });
          e.preventDefault();
       });
    
      $(document).on('click','#play', function(e){
        let element=$(this)[0].parentElement.parentElement.parentElement;
       let id= $(element).attr('taskid');
       $.post('phpFiles/videolink.php', {id} , function(response){
       // console.log(response);
          let repons=JSON.parse(response);
          let template=""; let template1="";
            template=`<video src="${repons.video}" poster="videos/luciliaplayer.jpg" controls width="750" height="421"></video>`
            template1=`<h5>Problem Title:</h5><h5 id="problemname">${repons.problem}</h5>`
          $('#video').html(template);
          $('#problemname').html(template1); 
        });
         e.preventDefault();
      
      });
     
     $(document).on('click','#btnregister', function(e){
        const datos={
          name:$('#name').val(),
          email:$('#email').val(),
          username:$('#username').val(),
          password:$('#password').val(),
        };
       $.post('phpFiles/register.php', datos , function(html){
         console.log(html);
          if(html==="bad"){
            $('#badalert').show();
            $('#goodalert').hide();
          }else if(html==="good"){
            $('#badalert').hide();
            $('#goodalert').show();
          }
          $('#registerform').trigger('reset');
        });
         e.preventDefault();
      });

      function FillHead(){
        let param=$('#paramet').val();
        $.ajax({
            type:'GET',
            url:'phpFiles/FillHead.php?man='+param,
            success:function(html){
              let repons=JSON.parse(html);
              let template=''; let template1=''; let template2=''; let template3=''; let template4='';
             // console.log(repons);
              repons.forEach(rep=>{
                template+=`
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <img src="${rep.image}" alt="Profile" class="rounded-circle">
                <span class="d-none d-md-block dropdown-toggle ps-2">${rep.names}</span>
              </a><!-- End Profile Iamge Icon -->
      
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                  <h6>${rep.names}</h6>
                  <span>${rep.job}</span>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="pages-register.php">
                    <i class="bi bi-person"></i>
                    <span>Register a new User</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
      
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="pages-faq.php">
                    <i class="bi bi-question-circle"></i>
                    <span>Need Help?</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
      
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="index.php">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Sign Out</span>
                  </a>
                </li>
      
              </ul><!-- End Profile Dropdown Items -->
                `
                template1+=`
                <img src="${rep.image}" alt="Profile" class="rounded-circle">
                <h2>${rep.names}</h2>
                <h3>${rep.job}</h3>
                `
                template2+=`
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">${rep.about}</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">${rep.names}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Company</div>
                  <div class="col-lg-9 col-md-8">${rep.company}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Job</div>
                  <div class="col-lg-9 col-md-8">${rep.job}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Country</div>
                  <div class="col-lg-9 col-md-8">${rep.country}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">${rep.address}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">${rep.phone}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">${rep.email}</div>
                </div>

                `
                template3+=`
                <!-- Profile Edit Form -->
                  <form method="post" enctype="multipart/form-data" id="profileeditor">
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="image" type="file" class="form-control" id="image" >
                      </div>
                     </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullname" type="text" class="form-control" id="fullname" value="${rep.names}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">${rep.about}</textarea>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="${rep.company}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="job" value="${rep.job}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="country" value="${rep.country}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="address" value="${rep.address}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="phone" value="${rep.phone}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="${rep.email}">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="btnsaveprofile">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                `
                template4+=`
                    <form method="post" id="changepassword">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newpassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewpassword">
                      </div>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" id="profilechangepassword">Change Password</button>
                    </div>
                  </form>
                `
              });
              $('#fillheads').html(template);
              $('#editprofile').html(template1);
              $('#profile-overview').html(template2);
              $('#profile-edit').html(template3);
              $('#profilepassword').html(template4);
            }
           });
      }
      
      $(document).on('keyup','#username', function(e){
            let param=$('#username').val();
       $.post('phpFiles/validateusername.php', {param}, function(response){
          if(response==="wi"){
            $('#badusername').show();
            $('#password').attr("disabled","disabled");
          }else{
            $('#badusername').hide();
            $('#password').removeAttr("disabled");
          }
        });
         e.preventDefault();
      });

      $(document).on('click','#btnsaveprofile', function(e){
        let datos=new FormData($('#profileeditor')[0]);
        let param=$('#identity').val(); 
        $.ajax({
            type: 'POST',
            url: 'phpFiles/editprofile.php?man='+param,
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            success: function(response){
               //console.log(param+"======="+response);
               FillHead();
            }
      });
      e.preventDefault();
    }); 

    $(document).on('keyup','#password', function(e){
      let param=$('#password').val();
      $.post('phpFiles/validatepassword.php', {param}, function(response){
       // console.log(response);
        if(response==="wi"){
          $('#badpassword').hide();
          $('#badconfirmation').hide();
          $('#goodpassword').hide();
          $('#newpassword').removeAttr("disabled");
          $('#renewpassword').removeAttr("disabled");
        }else{
          $('#badpassword').show();
          $('#goodpassword').hide();
          $('#badconfirmation').hide();
          $('#newpassword').attr("disabled","disabled");
          $('#renewpassword').attr("disabled","disabled");
        }
      });
      e.preventDefault();
    });

    $(document).on('click','#profilechangepassword', function(e){
      const datos={
        current:$('#password').val(),
        newpassword:$('#newpassword').val(),
        confirmation:$('#renewpassword').val(),
      }
      let param=$('#identity').val();
      $.post('phpFiles/updatpassword.php?man='+param, datos, function(response){
       // console.log(response);
        if(response==="confirm"){
          $('#badconfirmation').show();
          $('#goodpassword').hide();
        }else if(response==="good"){
          $('#goodpassword').show();
          $('#badconfirmation').hide();
        }else{
          $('#badconfirmation').show();
          $('#goodpassword').hide();
        }
        $('#changepassword').trigger('reset');
      });
      e.preventDefault();
    });

    $(document).on('click','#InsertMachine', function(e){
      let machine=$('#machinename').val();
      let id=$('#idmachinename').val();
      let url=machineedition===false ? 'phpFiles/createMachine.php' : 'phpFiles/editMachine.php';
      $.post(url,{machine,id},function(response){
            // console.log(response);
             FullMachine();
             FullPrinter();
             $('#newmachine').trigger('reset');
             machineedition=false;
     });
       e.preventDefault();
     }); 

    function FullMachine(){
      $.ajax({
          type:'GET',
          url:'phpFiles/SelectMachine.php',
          success:function(html){
            let repons=JSON.parse(html);
            let template=''; let template1='';
           // console.log(repons);
            repons.forEach(rep=>{
              template+=`
              <tr taskid="${rep.id}">
                <th scope="row">${rep.id}</th>
                <td>${rep.device}</td>
                <td>
                <button type="button" id="editmachines" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                <button type="button" id="deletemachines" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              `
              template1+=`
              <div class="activity-item d-flex">
              <div class="activite-label">${rep.id}</div>
              <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
              <div class="activity-content">${rep.device}</div>
              </div><!-- End activity item-->
            `
            });
            $('#machinelist').html(template);
            $('#activities').html(template1);
          }
         });
     }

     $(document).on('click','#editmachines', function(e){
      let element=$(this)[0].parentElement.parentElement;
      let id= $(element).attr('taskid');
      $.post('phpFiles/deviceEdit.php',{id},function(response){
        let repons=JSON.parse(response);
        //console.log(repons.device);
        $('#machinename').val(repons.device);
        $('#idmachinename').val(repons.id);
        machineedition=true;
      });  
      e.preventDefault();
    });

    $(document).on('click','#deletemachines', function(e){
      if(confirm('Do you really want to delete this information?')){
       let element=$(this)[0].parentElement.parentElement;
       let id= $(element).attr('taskid');
      $.post('phpFiles/deleteDevice.php', {id} , function(response){
          FullMachine();
          FullPrinter();
      });
       
      }
      e.preventDefault();
    });

    $(document).on('click','#InsertLocator', function(e){
      let locator=$('#locatorname').val();
      let id=$('#idlocatorname').val();
      let url=locatoredition===false ? 'phpFiles/createLocator.php' : 'phpFiles/editLocator.php';
      $.post(url,{locator,id},function(response){
            // console.log(response);
             FullLocator();
             $('#newlocator').trigger('reset');
             locatoredition=false;
     });
       e.preventDefault();
     }); 

     function FullLocator(){
      $.ajax({
          type:'GET',
          url:'phpFiles/SelectLocator.php',
          success:function(html){
            let repons=JSON.parse(html);
            let template=''; let template1='';
           // console.log(repons);
            repons.forEach(rep=>{
              template+=`
              <tr taskid="${rep.id}">
                <th scope="row">${rep.id}</th>
                <td>${rep.locator}</td>
                <td>
                <button type="button" id="editlocators" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                <button type="button" id="deletelocators" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              `
              template1+=`
              <option value="${rep.id}">${rep.locator}</option>
              `
            });
            $('#locatorlist').html(template);
            $('#locator').html(template1);
          }
         });
     }
     $(document).on('click','#editlocators', function(e){
      let element=$(this)[0].parentElement.parentElement;
      let id= $(element).attr('taskid');
      $.post('phpFiles/locatorEdit.php',{id},function(response){
        let repons=JSON.parse(response);
        //console.log(repons.device);
        $('#locatorname').val(repons.locator);
        $('#idlocatorname').val(repons.id);
        locatoredition=true;
      });  
      e.preventDefault();
    });

    $(document).on('click','#deletelocators', function(e){
      if(confirm('Do you really want to delete this information?')){
       let element=$(this)[0].parentElement.parentElement;
       let id= $(element).attr('taskid');
      $.post('phpFiles/deleteLocator.php', {id} , function(response){
          FullLocator();
      });
       
      }
      e.preventDefault();
    });

    $(document).on('click','#Insertsub', function(e){
      let sub=$('#subname').val();
      let id=$('#idsubname').val();
      let url=subedition===false ? 'phpFiles/createSub.php' : 'phpFiles/editSub.php';
      $.post(url,{sub,id},function(response){
          //  console.log(response);
             FullSub();
             $('#newsub').trigger('reset');
             subedition=false ;
     });
       e.preventDefault();
     }); 

     function FullSub(){
      $.ajax({
          type:'GET',
          url:'phpFiles/SelectSub.php',
          success:function(html){
            let repons=JSON.parse(html);
            let template=''; let template1='';
           // console.log(repons);
            repons.forEach(rep=>{
              template+=`
              <tr taskid="${rep.id}">
                <th scope="row">${rep.id}</th>
                <td>${rep.sub}</td>
                <td>
                <button type="button" id="editsubs" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                <button type="button" id="deletesubs" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              `
              template1+=`
              <option value="${rep.id}">${rep.sub}</option>
              `
            });
            $('#sublist').html(template);
            $('#subinventary').html(template1);
          }
         });
     }
     $(document).on('click','#editsubs', function(e){
      let element=$(this)[0].parentElement.parentElement;
      let id= $(element).attr('taskid');
      $.post('phpFiles/subEdit.php',{id},function(response){
        let repons=JSON.parse(response);
        //console.log(repons.device);
        $('#subname').val(repons.sub);
        $('#idsubname').val(repons.id);
        subedition=true;
      });  
      e.preventDefault();
    });

    $(document).on('click','#deletesubs', function(e){
      if(confirm('Do you really want to delete this information?')){
       let element=$(this)[0].parentElement.parentElement;
       let id= $(element).attr('taskid');
      $.post('phpFiles/deleteSub.php', {id} , function(response){
          FullSub();
      });
       
      }
      e.preventDefault();
    });

    $(document).on('click','#Insertsigle', function(e){
      let sigle=$('#siglename').val();
      let id=$('#idsiglename').val();
      let url=sigleedition===false ? 'phpFiles/createSigle.php' : 'phpFiles/editSigle.php';
      $.post(url,{sigle,id},function(response){
          //  console.log(response);
             FullSigle();
             $('#newsigle').trigger('reset');
             sigleedition=false;
     });
       e.preventDefault();
     }); 

     function FullSigle(){
      $.ajax({
          type:'GET',
          url:'phpFiles/SelectSigle.php',
          success:function(html){
            let repons=JSON.parse(html);
            let template=''; let template1='';
           // console.log(repons);
            repons.forEach(rep=>{
              template+=`
              <tr taskid="${rep.id}">
                <th scope="row">${rep.id}</th>
                <td>${rep.sigle}</td>
                <td>
                <button type="button" id="editsigles" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                <button type="button" id="deletesigles" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
              `
              template1+=`
              <option value="${rep.id}">${rep.sigle}</option>
              `
            });
            $('#siglelist').html(template);
            $('#sigle').html(template1);
          }
         });
     }
     $(document).on('click','#editsigles', function(e){
      let element=$(this)[0].parentElement.parentElement;
      let id= $(element).attr('taskid');
      $.post('phpFiles/sigleEdit.php',{id},function(response){
        let repons=JSON.parse(response);
        //console.log(repons.device);
        $('#siglename').val(repons.sigle);
        $('#idsiglename').val(repons.id);
        sigleedition=true;
      });  
      e.preventDefault();
    });

    $(document).on('click','#deletesigles', function(e){
      if(confirm('Do you really want to delete this information?')){
       let element=$(this)[0].parentElement.parentElement;
       let id= $(element).attr('taskid');
      $.post('phpFiles/deleteSigle.php', {id} , function(response){
          FullSigle();
      });
       
      }
      e.preventDefault();
    });

});