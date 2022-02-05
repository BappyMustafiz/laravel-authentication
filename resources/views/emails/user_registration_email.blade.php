<html>
    <head>
        <title>New User Registered</title>
    </head>

    <body>
        <p>First Name: {{ $mailContents->first_name }} </p>
        <p>Last Name: {{ $mailContents->last_name }} </p>
        <p>Email: {{ $mailContents->email }} </p>
        <p>Phone: {{ $mailContents->phone }} </p>
        <p>Address: {{ $mailContents->address }} </p>
    </body>
</html>