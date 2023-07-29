window.onload = function() {
  const contactForm = document.getElementById('contactForm');
  const searchInput = document.getElementById('searchInput');
  const contactList = document.getElementById('contactList');
  const tableHeader = document.getElementById('tableHeader');

  // Event listener for form submission
  contactForm.addEventListener('submit', function(event) {
    event.preventDefault();
    saveContact();
  });

  // Event listener for search input
  searchInput.addEventListener('input', function() {
    searchContacts();
  });

  // Fetch existing contacts on page load
  fetchContacts();

  // Function to save a contact
  function saveContact() {
    const contactId = document.getElementById('contactId').value;
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const middleName = document.getElementById('middleName').value;
    const address = document.getElementById('address').value;
    const phoneNumber = document.getElementById('phoneNumber').value;
    const email = document.getElementById('email').value;
    const notes = document.getElementById('notes').value;

    // Validate required fields
    if (firstName.trim() === '' || phoneNumber.trim() === '') {
      alert('First name and phone number are required!');
      return;
    }

    // Phone number validation
    const phoneNumberRegex = /^(\+?\d{1,3})?[-\s]?\d{3}[-\s]?\d{3,4}[-\s]?\d{3,4}$/;
    if (!phoneNumberRegex.test(phoneNumber)) {
      alert('Invalid phone number format!');
      return;
    }

    // Create a new contact object
    const contact = {
      id: contactId,
      firstName: firstName,
      lastName: lastName,
      middleName: middleName,
      address: address,
      phoneNumber: phoneNumber,
      email: email,
      notes: notes
    };

    // Send the contact data to the server
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_contact.php', true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Contact saved successfully, fetch the updated contact list
        fetchContacts();
        resetForm();
      }
    };
    xhr.send(JSON.stringify(contact));
  }

  // Function to fetch contacts
  function fetchContacts() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_contacts.php', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        const contacts = JSON.parse(xhr.responseText);
        displayContacts(contacts);
      }
    };
    xhr.send();
  }

 // Function to display contacts
function displayContacts(contacts) {
  // Sort contacts by last name
  contacts.sort((a, b) => a.last_name.localeCompare(b.last_name));

  // Clear the contact list
  contactList.innerHTML = '';

  // Create table body
  const tableBody = document.createElement('tbody');

  // Loop through contacts and create rows
  for (let i = 0; i < contacts.length; i++) {
    const contact = contacts[i];
    const row = document.createElement('tr');
    row.innerHTML = `
      <td style="border-right: 1px solid #dee2e6; padding: 8px;">${contact.last_name}</td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;">${contact.first_name}</td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;">${contact.middle_name}</td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;">${contact.address}</td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;">${contact.phone_number}</td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;">${contact.email}</td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;">${contact.notes}</td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;"><button onclick="editContact(${contact.id})"><a href="#phonebook" class="nav-link scrollto active">Edit</a></button></td>
      <td style="border-right: 1px solid #dee2e6; padding: 8px;"><button onclick="deleteContact(${contact.id})">Delete</button></td>
    `;

    // Add CSS class to apply divider style
    row.classList.add('contact-row');

    tableBody.appendChild(row);
  }

  // Append table header and body to contactList
  contactList.appendChild(tableHeader);
  contactList.appendChild(tableBody);
}


  // Function to edit a contact
  window.editContact = function(contactId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_contact.php?id=' + contactId, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        const contact = JSON.parse(xhr.responseText);
        populateForm(contact);
      }
    };
    xhr.send();
  }

  // Function to delete a contact
  window.deleteContact = function(contactId) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'delete_contact.php?id=' + contactId, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Contact deleted successfully, fetch the updated contact list
        fetchContacts();
        resetForm();
      }
    };
    xhr.send();
  }

  // Function to populate the form with contact data
  function populateForm(contact) {
    document.getElementById('contactId').value = contact.id;
    document.getElementById('firstName').value = contact.first_name;
    document.getElementById('lastName').value = contact.last_name;
    document.getElementById('middleName').value = contact.middle_name;
    document.getElementById('address').value = contact.address;
    document.getElementById('phoneNumber').value = contact.phone_number;
    document.getElementById('email').value = contact.email;
    document.getElementById('notes').value = contact.notes;
  }

  // Function to reset the form
  function resetForm() {
    document.getElementById('contactId').value = '';
    document.getElementById('firstName').value = '';
    document.getElementById('lastName').value = '';
    document.getElementById('middleName').value = '';
    document.getElementById('address').value = '';
    document.getElementById('phoneNumber').value = '';
    document.getElementById('email').value = '';
    document.getElementById('notes').value = '';
  }
};
// Function to search contacts
function searchContacts() {
  const searchTerm = searchInput.value.toLowerCase();
  const contactRows = contactList.getElementsByTagName('tr');

  // Iterate through contact rows, starting from index 1 (excluding table header)
  for (let i = 1; i < contactRows.length; i++) {
    const contactRow = contactRows[i];
    const contactFields = contactRow.getElementsByTagName('td');
    let foundMatch = false;

    // Iterate through contact fields in the current row (excluding edit and delete columns)
    for (let j = 0; j < contactFields.length - 2; j++) {
      const fieldValue = contactFields[j].innerText.toLowerCase();
      if (fieldValue.includes(searchTerm)) {
        foundMatch = true;
        break;
      }
    }

    // Toggle display based on search result
    if (foundMatch) {
      contactRow.style.display = 'table-row';
    } else {
      contactRow.style.display = 'none';
    }
  }
}
