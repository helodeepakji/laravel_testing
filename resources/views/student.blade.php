<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        
        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        input , select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    
   @if (isset($student))
   <form action="" method="post">
    @csrf
    <input type="text" name="fname" value="{{$student->fname }}"  placeholder="First Name">
    @error('fname')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <input type="text" name="lname" value="{{$student->lname }}"  placeholder="Last Name">
    @error('lname')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <input type="number" name="phone" value="{{$student->phone }}" placeholder="Phone">
    @error('phone')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <input type="email" name="email" value="{{ $student->email  }}" placeholder="Email">
    @error('email')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <select name="gender">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <button type="submit">Submit</button>
</form>
   @else
   <form action="" method="post">
    @csrf
    <input type="text" name="fname" value="{{ old('fname') }}"  placeholder="First Name">
    @error('fname')
        <p style="color:red">{{ $message }}</p>
    @enderror
    <input type="text" name="lname" value="{{ old('lname') }}"  placeholder="Last Name">
    @error('lname')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <input type="number" name="phone" value="{{ old('phone') }}" placeholder="Phone">
    @error('phone')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    @error('email')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <select name="gender">
        <option value="">Select Gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <button type="submit">Submit</button>
</form>
   @endif
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
                <tr>
                    <td>{{$item->fname}}</td>
                    <td>{{$item->lname}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->gender}}</td>
                    <td>
                        <a href="/student/{{$item->id}}">Update</a>
                        <a href="/deletestudent/{{$item->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
           

        </tbody>
    </table>
</body>

</html>