//
$('#loginform').submit(function(e) {
    console.log('hello')
    e.preventDefault()
    form = $(this);
    var form_data = new FormData(this);
    form_data.append('login', true)
    btn = form.find("[type='submit']")
    btn.text('Please wait...')
    $.ajax({
      url: 'forms/handler.php',
      method: 'POST',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      beforeSubmit: function () {
      },
      success: function (result) {
        console.log(result)
        try {
          result = JSON.parse(result)
          if (result.type == true) {
            window.location = 'data.php'
          } else {
            btn.text('Save & Submit')
            alert('Error')
          }
        } catch (error) {
          btn.text('Save & Submit')
          alert(error)
        }
      }
    })
  })

 
$('#primaryform').submit(function () {
    form = $(this);
    var form_data = new FormData(this);
    form_data.append('save', true)
    btn = form.find("[type='submit']")
    btn.text('Please wait...')
    $.ajax({
      url: 'forms/handler.php',
      method: 'POST',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      beforeSubmit: function () {
      },
      success: function (result) {
        console.log(result)
        try {
          result = JSON.parse(result)
          if (result.type == true) {
            window.location = 'preview.php?reg=' + result.id
          } else {
            btn.text('Save & Submit')
            alert('Error')
          }
        } catch (error) {
          btn.text('Save & Submit')
          alert(error)
        }
      }
    })
  })

 