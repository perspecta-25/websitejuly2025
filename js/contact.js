$(document).ready(function () {
  $('#getContact').click(function () {
    const id = $('#contactId').val();

    if (!id) {
      alert("Please enter a contact ID.");
      return;
    }

    $.ajax({
      url: 'get_contact.php',
      method: 'GET',
      data: { id: id },
      dataType: 'json',
      success: function (data) {
        if (data.success) {
          const c = data.contact;
          $('#contactResult').html(`
            <p><strong>ID:</strong> ${c.id}</p>
            <p><strong>Name:</strong> ${c.name}</p>
            <p><strong>Email:</strong> ${c.email}</p>
            <p><strong>Phone:</strong> ${c.phone_number}</p>
            <p><strong>Message:</strong> ${c.message}</p>
          `);
        } else {
          $('#contactResult').html(`<p class="text-danger">${data.error}</p>`);
        }
      },
      error: function () {
        $('#contactResult').html(`<p class="text-danger">Server error.</p>`);
      }
    });
  });
});