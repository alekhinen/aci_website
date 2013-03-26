function formhash(form, password) {
   // Create a new element input, this will be out hashed password field.
   var p = document.createElement("input");
   // Add the new element to our form.
   form.appendChild(p);
   p.name = "p";
   p.type = "hidden"
   p.value = hex_sha512(password.value);
   // Make sure the plaintext password doesn't get sent.
   password.value = "";
   // Finally submit the form.
   form.submit();
}

// Really shitty workaround to make edit_account work when making a new password
function formhash2(form, password) {
   if (typeof password !== 'undefined') {
      var q = document.createElement("input");
      form.appendChild(q);
      q.name = "q";
      q.type = "hidden";
      q.value = hex_sha512(password.value);
      password.value = "";
   }
}

/*
ORIGINAL FUNCTION


function formhash(form, password) {
   // Create a new element input, this will be out hashed password field.
   var p = document.createElement("input");
   // Add the new element to our form.
   form.appendChild(p);
   p.name = "p";
   p.type = "hidden"
   p.value = hex_sha512(password.value);
   // Make sure the plaintext password doesn't get sent.
   password.value = "";
   // Finally submit the form.
   form.submit();
}
*/