# thermo


API END Points

View Device Status
Postman
Request - GET - http://localhost/thermo/api/remotets/read.php?id=1 

Update Device Status
Postman 
Request - PUT - http://localhost/thermo/api/remotets/update.php
Headers - Content-Type - aplication/json
Body - RAW
{
    "id": "2,
    "m_id": "3",
    "info": "Device 0004",
    "dtemp": "26",
    "stemp": "29",
    "sstime": "0"
}

