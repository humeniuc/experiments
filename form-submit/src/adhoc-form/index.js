var _submitForm = function(checkbox) {
    var formdata = JSON.parse(checkbox.dataset.formdata);
    var formInputs = formdata.inputs;

    var f = document.createElement('form');
    f.style.display = 'none';
    document.body.appendChild(f);
    f.method = 'POST';
    f.action = formdata.action;

    var o = {
        a: 1,
        b: 2,
        c: [4, 5, 6],
        d: {
            e: 7,
            f: 'g',
            h: [8, 9, 10]
        }
    };

    fd = objectToFormData(o);
    console.log("fd", fd);

    var inputs = [];
    Object.entries(formInputs).forEach(function(pair) {
        var name = pair[0];
        var value = pair[1];
        var input = document.createElement("input");
        input.setAttribute("type", "hidden");
        input.setAttribute("name", name);
        input.setAttribute("value", value);
        f.appendChild(input);
        inputs.push(input);
    });

    if (checkbox.checked) {
        
    }

    // f.submit();
};


var objectToFormData = function(obj, form, namespace) {
    
  var fd = form || new FormData();
  var formKey;
  
  for(var property in obj) {
    if(obj.hasOwnProperty(property)) {
      
      if(namespace) {
        formKey = namespace + '[' + property + ']';
      } else {
        formKey = property;
      }
     
      // if the property is an object, but not a File,
      // use recursivity.
      if(typeof obj[property] === 'object' && !(obj[property] instanceof File)) {
        
        objectToFormData(obj[property], fd, property);
        
      } else {
        
        // if it's a string or a File object
        fd.append(formKey, obj[property]);
          console.log('formKey, obj[property]', formKey, obj[property]);
      }
      
    }
  }
  
  return fd;
    
};

