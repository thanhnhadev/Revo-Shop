const getcontact= (token) => (
    fetch('http://192.168.45.2/api/contact.php',
    {   
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        },
        body: JSON.stringify({ token })
    })
    .then(res => res.json())
);

module.exports = getcontact;
