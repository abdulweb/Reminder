<script>

  function preload_vaccine_modal(name,age,id) {
        $('#vaccine_name').attr('value', name);
        $('#vaccine_name').text(name);
        $('#child_age').attr('value', age);
        $('#child_age').text(age);
        $('#vaccineID').attr('value', id);
    }
    
    function preload_HF_modal(name,id) {
        $('#hf_name').attr('value', name);
        $('#hf_name').text(name);
        $('#hfID').attr('value', id);
    }

    function preload_HW_modal(name,hopital,phone,username,id,userID) {
        $('#full_name').attr('value', name);
        $('#full_name').text(name);
        $('#hospital_name').attr('value', hopital);
        $('#hospital_name').text(hopital);
        $('#username').attr('value', username);
        $('#username').text(username);
        $('#phone').attr('value', phone);
        $('#phone').text(phone);
        $('#hwID').attr('value', id);
        $('#userID').attr('value', id);
    }

    // View child vaccine histroy from caregiver section
    function preload_child_vaccine_history_modal(childVaccine) {
        for (var i = 0; i < childVaccine.length; i++) {
          childVaccine[i]
        $('#vaccineName').attr('value', childVaccine[i]);
        $('#vaccineName').text(childVaccine[i]);
        // $('#createdAt').attr('value', hopital);
        // $('#createdAt').text(hopital);
        // $('#hwID').attr('value', id);
        // $('#userID').attr('value', id);
    }
  }
  function preload_add_child_and_vaccine_modal(caregiverID)
  {
    $('$caregiverID').attr('value', caregiverID);
    // $('#caregiverID').text(caregiverID);
    // window.location.href = "viewCaregiver.php?name=" + caregiverID;
  }

 function edit_hf(id)
{
    //alert('hey');
 //var title=document.getElementById("title"+id).innerHTML;
 var name=document.getElementById("name"+id).innerHTML;
 
 document.getElementById("name"+id).innerHTML="<input type='text' class='form_line form-control form_line' autofocus id='name_text"+id+"' value='"+name+"'>";
    
 document.getElementById("editBtn"+id).style.visibility="hidden";
 document.getElementById("saveBtn"+id).style.visibility="visible";
}

function save_sd(id)
{
 var fullname=document.getElementById("fullname_text"+id).value;
 var email=document.getElementById("email_text"+id).value;
 var phone=document.getElementById("phone_text"+id).value;
    
 $.ajax
 ({
  type:'post',
  url:'function.php',
  data:{
   edit_sd:'edit_sd',
   row_id:id,
   fullname:fullname,
   email:email,
   phone:phone,
  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("fullname"+id).innerHTML=fullname;
    
    document.getElementById("editBtn"+id).style.visibility="visible";
    document.getElementById("saveBtn"+id).style.visibility="hidden";
    //alert('Record Updated Successfully');
    swal("Updated!", "Product Record has been Update.", "success");
                setTimeout(function(){// wait for 5 secs(2)
                   location.reload(); // then reload the page.(3)
              }, 1000);
   }
   else{
    alert('response');
   }
  }

 });
}

        </script>